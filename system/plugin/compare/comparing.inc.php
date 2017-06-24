<?php
if (!defined('IN_PLUGIN')) {
    exit('Access Denied');
}

if (!$_GET['sku_id']) showmessage('sku_id 是必须参数', '', 0);


if ($_GET['action'] == 'join') {
    // 将商品sku加入对比信息（cookie）

    $sku_ids = json_decode(cookie('skus'), true);
    if (in_array($_GET['sku_id'], $sku_ids)) {
        return show_compare($_GET['sku_id']);
    }
    $sku_ids[] = $_GET['sku_id'];
    cookie('skus', json_encode($sku_ids));
    return show_compare($_GET['sku_id']);
}

if ($_GET['action'] == 'join_in') {
    $sku_ids = json_decode(cookie('skus'), true);
    if (!in_array($_GET['sku_id'], $sku_ids)) {
        $sku_ids[] = $_GET['sku_id'];
        cookie('skus', json_encode($sku_ids));
    }
    $_GET['action'] = 'show';
}

if ($_GET['action'] == 'show') {
    // 展示商品详情页底部的对比信息
    $SEO = seo('商品对比');
    $member = model('member/member','service')->init();
    $cid = get_cid($_GET['sku_id']);
    $list = get_compare_list($_GET['sku_id']);
    $kind_list = get_kind_list($_GET['sku_id']);
//    include template('compare','goods');
    include PLUGIN_PATH . '/compare/template/compare/compare.html';
}

if ($_GET['action'] == 'clear') {
    // 清空对应该商品分类ID的对比信息
    if (!cookie('skus')) showmessage('对比数据已经清空', '', 0);
    clear_compare($_GET['sku_id']);
    return show_compare($_GET['sku_id']);
}

// 获取当前页面商品所属的分类ID
function get_cid($sku_id)
{
    $spuid = model('goods/goods_sku')->where("sku_id = {$sku_id}")->getField('spu_id');
    return model('goods_spu')->where("id = {$spuid}")->getField('catid');
}

// 展示当前页面商品所属的分类ID的所有对比
function show_compare($sku_id)
{
    $num = 0;
    $sku_ids = json_decode(cookie('skus'), true);
    if ($sku_ids) {
        $cid = get_cid($sku_id);
        foreach ($sku_ids as $v) {
            if ($cid != get_cid($v)) continue;
            $item = model('goods_sku')->where("sku_id = {$v}")->find();
            if (!$item['thumb']) {
                $item['thumb'] = model('goods_spu')->where("id = {$item['spu_id']}")->getField('thumb');
            }
            $list[] = $item;
        }
        if ($list) $num = count($list);
    }
    if ($num < 4) {
        $i = 4 - count($list);
        for ($i; $i > 0; $i--) {
            $list[] = null;
        }
    }

    return include PLUGIN_PATH . '/compare/template/compare/list.html';
}

// 清空当前页面商品所属的分类ID的所有对比
function clear_compare($sku_id)
{
    $sku_ids = json_decode(cookie('skus'), true);
    $cid = get_cid($sku_id);
    foreach ($sku_ids as $k => $v) {
        if ($cid == get_cid($v)) {
            unset($sku_ids[$k]);
        }
    }
    cookie('skus', json_encode($sku_ids));
}

// 获取历史浏览记录
function get_histories()
{
    if (!cookie(_history)) return;
    foreach (explode(',', cookie(_history)) as $id) {
        if (!$id || $id == $_GET['sku_id']) continue; // 如果为空或者是当前页面商品则跳过
        $item = model('goods_sku')->where("sku_id = {$id}")->find();
        if (!$item['thumb']) {
            $item['thumb'] = model('goods_spu')->where("id = {$item['spu_id']}")->getField('thumb');
        }
        $histories[] = $item;
    }
    return $histories;
}

// 获取同类商品
function get_kind_list($sku_id)
{
    $kind_list = array();
    $cid = get_cid($sku_id);
    $spu_list = model('goods_spu')->where("catid = {$cid}")->select();
    foreach ($spu_list as $k => $v) {
        $vid = $v['id'];

        $item = model('goods/goods_sku')->where("spu_id = {$vid}")->find();
        if (!$item || $sku_id == $item['sku_id']) continue;
        if (!$item['thumb']) {
            $item['thumb'] = $v['thumb'];
        }
        $kind_list[] = $item;
    }
    return $kind_list;
}

// 获取对比商品列表
function get_compare_list($sku_id)
{
    $num = 0;
    $sku_ids = json_decode(cookie('skus'), true);
    if ($sku_ids) {
        $cid = get_cid($sku_id);
        foreach ($sku_ids as $v) {
            if ($cid != get_cid($v)) continue;
            $item = model('goods_sku')->where("sku_id = {$v}")->find();
            if (!$item['thumb']) {
                $item['thumb'] = model('goods_spu')->where("id = {$item['spu_id']}")->getField('thumb');
            }
            $list[] = $item;
        }
        if ($list) $num = count($list);
    }
    if ($num < 4) {
        $i = 4 - count($list);
        for ($i; $i > 0; $i--) {
            $list[] = null;
        }
    }

    return $list;
}

function catpos($catid, $symbol = ' > ')
{
    $categorys = cache('goods_category');
    $cat_url = $categorys[$catid]['url'] ? $categorys[$catid]['url'] : url('goods/index/lists', array('id' => $catid));
    $pos = '';
    $parentids = model('goods_category', 'service')->get_parent($catid, 0);
    sort($parentids);
    foreach ($parentids as $parentid) {
        $url = $categorys[$parentid]['url'] ? $categorys[$parentid]['url'] : url('goods/index/lists', array('id' => $parentid));
        $pos .= '<a href="' . $url . '">' . $categorys[$parentid]['name'] . '</a>' . '<em>' . $symbol . '</em>';
    }
    $pos .= '<a href="' . $cat_url . '">' . $categorys[$catid]['name'] . '</a>' . '<em>' . $symbol . '</em>' . '<span>商品对比</span>';
    return $pos;
}
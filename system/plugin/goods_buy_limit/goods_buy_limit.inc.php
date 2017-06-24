<?php
defined('IN_ADMIN') or die('Access Denied');

if (!IS_POST) {
    // 限购列表
    if (!$_GET['action']) {
        $data = get_list('buy_limit');
        $limits = $data['list'];
        $page = get_page($data['count']);
        include __DIR__ . '/template/index.php';
    }

    // 添加限购
    if ($_GET['action'] == 'add') {
        include __DIR__ . '/template/edit.php';
    }

    // 删除限购
    if ($_GET['action'] == 'delete' && is_numeric($_GET['bid'])) {
        $result = model('buy_limit')->delete($_GET['bid']);
        if (!$result) showmessage('数据库处理出错，请检查後重试。');
        showmessage('删除成功', url('#'), 1);
    }

    // 限购编辑
    if ($_GET['action'] == 'edit' && is_numeric($_GET['bid'])) {
        $limit = model('buy_limit')->find($_GET['bid']);
        if (!$limit) showmessage('未指定要编辑的限购项。');
        include __DIR__ . '/template/edit.php';
    }

} else {

    // 添加&编辑限购
    if ($_GET['action'] == 'save') {
        $sku = model('goods_sku')->find($_GET['sku_id']);
        $_GET['sku_name'] = $sku['sku_name'];
        $_GET['start_at'] = strtotime($_GET['start_at']);
        $_GET['end_at'] = strtotime($_GET['end_at']);
        $result = model('buy_limit')->update($_GET);
        if (!$result) showmessage('数据库处理出错，请检查後重试。');
        showmessage('保存成功', url('#'), 1);
    }

}

/**
 * 数据列表
 * @param $model_name
 * @param string $map
 * @param int $page
 * @param int $limit
 * @param string $order
 * @return array
 */
function get_list($model_name, $map = '', $page = 1, $limit = 20, $order = 'id DESC')
{
    $limit = (isset($limit) && is_numeric($limit)) ? $limit : 20;
    $list = model($model_name)->where($map)->page($page)->limit($limit)->order($order)->select();
    $count = model($model_name)->where($map)->count();
    return array('count' => $count, 'limit' => $limit, 'list' => $list);
}

/**
 * 组织分页
 * @param $totalrow
 * @param int $pagesize
 * @param int $pagenum
 * @return string
 */
function get_page($totalrow, $pagesize = 10, $pagenum = 5)
{
    $totalPage = ceil($totalrow / $pagesize);
    $rollPage = floor($pagenum / 2);

    $StartPage = $_GET['page'] - $rollPage;
    $EndPage = $_GET['page'] + $rollPage;
    if ($StartPage < 1) $StartPage = 1;
    if ($EndPage < $pagenum) $EndPage = $pagenum;

    if ($EndPage >= $totalPage) {
        $EndPage = $totalPage;
        $StartPage = max(1, $totalPage - $pagenum + 1);
    }
    $string = '<ul class="fr">';
    $string .= '<li>共' . $totalrow . '条数据</li>';
    $string .= '<li class="spacer-gray margin-lr"></li>';
    $string .= '<li>每页显示<input class="input radius-none" type="text" name="limit" value="' . $pagesize . '"/>条</li>';
    $string .= '<li class="spacer-gray margin-left"></li>';

    /* 第一页 */
    if ($_GET['page'] > 1) {
        $string .= '<li class="start"><a href="' . page_url(array('page' => 1)) . '"></a></li>';
        $string .= '<li class="prev"><a href="' . page_url(array('page' => $_GET['page'] - 1)) . '"></a></li>';
    } else {
        $string .= '<li class="default-start"></li>';
        $string .= '<li class="default-prev"></li>';
    }
    for ($page = $StartPage; $page <= $EndPage; $page++) {
        $string .= '<li ' . (($page == $_GET['page']) ? 'class="current"' : '') . '><a href="' . page_url(array('page' => $page)) . '">' . $page . '</a></li>';
    }
    if ($_GET['page'] < $totalPage) {
        $string .= '<li class="next"><a href="' . page_url(array('page' => $_GET['page'] + 1)) . '"></a></li>';
        $string .= '<li class="end"><a href="' . page_url(array('page' => $totalPage)) . '"></a></li>';
    } else {
        $string .= '<li class="default-next"></li>';
        $string .= '<li class="default-end"></li>';
    }
    $string .= '</ul>';
    return $string;
}
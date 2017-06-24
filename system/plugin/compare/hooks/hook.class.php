<?php

class plugin_compare_hook extends plugin
{

    // 商品名称右侧 加入对比按钮 判断是否可以对比
    public function detail_goods_operate()
    {
        $histories = $this->get_histories();
        include PLUGIN_PATH . '/compare/template/compare/comparing.html';
    }

    // 商品详情页底部对比信息 sku间隔判断
    public function goods_detail_bottom()
    {

    }

    private function get_histories()
    {
        foreach (explode(',', cookie(_history)) as $id) {
            if (!$id) continue;
            $item = model('goods_sku')->where("sku_id = {$id}")->find();
            if (!$item['thumb']) {
                $item['thumb'] = model('goods_spu')->where("id = {$item['spu_id']}")->getField('thumb');
            }
            $histories[] = $item;
        }
        return $histories;
    }
}
<?php

class plugin_auto_inc_hook
{
    /**
     * 检测是否自动补充库存
     * @param string $order_sn 订单号
     */
    public function after_pay_success($order_sn){
        $config = cache('auto_inc','','plugin');
        if (empty($config)) return false;
        $line = $config['line'];
        $number = $config['number'];
        $skus = model('order/order_sku')->where(array('order_sn' => $order_sn))->getField('sku_id,sku_name',true);
        foreach ($skus as $key => $value) {
            if (auto_inc($key,$line,$number)) {
                $data = array();
                $data['sku_id'] = $key;
                $data['sku_name'] = $value;
                $data['number'] = $number;
                $data['time'] = time();
                model('inc_log')->update($data);
            }
        }
    }


}

/**
 * 自动补充该商品数量
 * @param int $sku_id 需要补货的商品
 * @param int $line 数量低于line时开始自动补货
 * @param int $number 每次自动补货数量
 */
function auto_inc($sku_id = 0, $line = 0, $number = 0)
{
    if ($sku_id < 0) return false;
    $sku_info = model('goods/goods_sku')->where(array('sku_id' => $sku_id)) ->find();
    if ($line >= $sku_info['number'] && $number > 0) {
        $result = model('goods/goods_sku')->where(array('sku_id' => $sku_id))->setInc('number',(int)$number);
        return $result ? true : false;
    }else{
        return false;
    }
}


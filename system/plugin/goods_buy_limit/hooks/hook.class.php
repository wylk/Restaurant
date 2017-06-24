<?php

class plugin_goods_buy_limit_hook extends plugin
{
    protected $member;

    public function __construct()
    {
        parent::__construct();
        $this->member = model('member/member', 'service')->init();
        if ($this->member['id'] < 1) return false;
    }

    // 获取购物车sku信息
    public function cart_get_sku_info(&$sku_info)
    {
        $map['status'] = 1;
        $map['sku_id'] = $sku_info['sku_id'];
        $limit = model('buy_limit')->where($map)->find();
        if (!$limit) return false;
        $order_map['sku_id'] = $sku_info['sku_id'];
        $order_map['order_sku'] = $this->member['id'];
        $order_map['dateline'] = array('between', array($limit['start_at'], $limit['end_at']));
        $buyed_number = model('order_sku')->where($order_map)->sum('buy_nums') ?: 0;
        if ($buyed_number >= $limit['number']) {
            $sku_info = false;
        } else {
            $sku_info['number'] = $limit['number'] - $buyed_number;
        }
    }

    /**
     * 电脑端详情页限购处理
     */
    public function detail_goods_operate()
    {
        $map['status'] = 1;
        $map['sku_id'] = $_GET['sku_id'];
        $limit = model('buy_limit')->where($map)->find();
        if (!$limit) return false;
        $order_map['sku_id'] = $_GET['sku_id'];
        $order_map['order_sku'] = $this->member['id'];
        $order_map['dateline'] = array('between', array($limit['start_at'], $limit['end_at']));
        $buyed_number = model('order_sku')->where($order_map)->sum('buy_nums') ?: 0;
        if ($buyed_number >= $limit['number']) {
            $html = "<script>
			$(function () {
				$('span.text-lh-large').html('当前商品限购{$limit['number']}件，您已购买{$buyed_number}件。');
				$('a.cart-btn').attr('data-event',null);
				$('a.cart-btn').html('无法购买');
				$('div.item-btn').remove();
            });
		</script>";
        } else {
            $can_buy = $limit['number'] - $buyed_number;
            $html = "<script>
			$(function () {
				$('span.text-lh-large').html('当前商品限购{$limit['number']}件，您已购买{$buyed_number}件。');
				$('input.adjust-input').attr('data-max',{$can_buy});
            });
		</script>";
        }
        return $html;
    }

    /**
     * 移动端商品限购处理
     */
    public function wap_goods_detail_footer()
    {
        $map['status'] = 1;
        $map['sku_id'] = $_GET['sku_id'];
        $limit = model('buy_limit')->where($map)->find();
        if (!$limit) return false;
        $order_map['sku_id'] = $_GET['sku_id'];
        $order_map['order_sku'] = $this->member['id'];
        $order_map['dateline'] = array('between', array($limit['start_at'], $limit['end_at']));
        $buyed_number = model('order_sku')->where($order_map)->sum('buy_nums') ?: 0;
        if ($buyed_number >= $limit['number']) {
            $html = "<script>
                        $(function () {
                            $('h2.padding-tb').html('当前商品限购{$limit['number']}件，您已购买{$buyed_number}件。');
                            $('input.num-input').attr('data-max',5);
                            $('button.mui-btn').html('无法购买');
                            $('button.mui-btn').removeClass('mui-btn');
                        });
                    </script>";
        } else {
            $can_buy = $limit['number'] - $buyed_number;
            $html = "<script>
                        $(function () {
                            $('h2.padding-tb').html('当前商品限购{$limit['number']}件，您已购买{$buyed_number}件。');
                            $('input.num-input').attr('data-max',{$can_buy});
                        });
                    </script>";
        }
        return $html;
    }
}
<?php
/**
 * 		购物车 模型
 *      [Haidao] (C)2013-2099 Dmibox Science and technology co., LTD.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      http://www.haidao.la
 *      tel:400-600-2042
 */
class cart_table extends table {

	protected $_validate = array(
        /* array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]), */
    );

    //自动完成
    protected $_auto = array(
    	// array(完成字段1,完成规则,[完成条件,附加规则]),
        array('system_time','time',1,'function'),   //新增数据时插入系统时间
        array('clientip','get_client_ip', 1, 'function'),
    );
}
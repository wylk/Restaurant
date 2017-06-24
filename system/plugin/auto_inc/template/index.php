﻿<?php include template('header', 'admin'); ?>
<div class="fixed-nav layout">
    <ul>
        <li class="first">自动补货<a id="addHome" title="添加到首页快捷菜单">[+]</a></li>
        <li class="spacer-gray"></li>
    </ul>
    <div class="hr-gray"></div>
</div>
<div class="content padding-big have-fixed-nav">
    <div class="tips margin-tb">
        <div class="tips-info border">
            <h6>温馨提示</h6>
            <a id="show-tip" data-open="true" href="javascript:;">关闭操作提示</a>
        </div>
        <div class="tips-txt padding-small-top layout">
            <p>- 当商品的库存下降到设置的阀值时 自动补货</p>
        </div>
    </div>
    <div class="hr-gray"></div>
    <form action="" method="post">
        <?php echo form::input('text', 'line', $config['line'] ?: 0, '补仓线:', '所有商品当库存下降到补仓线下时就会执行补仓'); ?>

        <?php echo form::input('text', 'number', $config['number'] ?: 0, '补充数量:'); ?>
        <div class="form-group">
            <input type="submit" class="button bg-main" value="提交"/>
            <a class="button margin-left bg-gray" href="">返回</a>
        </div>
    </form>
</div>
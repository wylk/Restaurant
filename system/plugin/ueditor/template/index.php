<?php include template('header', 'admin'); ?>
<div class="fixed-nav layout">
    <ul>
        <li class="first">插件配置</li>
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
            <p>- 选择使用默认编辑器还是百度UEditor编辑器</p>
        </div>
    </div>
    <div class="hr-gray"></div>
    <form class="addfrom" action="" method="post">
        <?php echo form::input('radio','editor',$config['editor'],'编辑器：', '编辑器。', array('items'=>array('default'=>'默认','ueditor'=>'UEditor'),'colspan'=>'2')); ?>

        <div class="form-group">
            <input type="submit" class="button bg-main" value="确定"/>
            <a class="button margin-left bg-gray" href="">返回</a>
        </div>
    </form>
</div>
<div class="fixed-nav layout">
    <ul>
        <li class="first">商品限购<a id="addHome" title="添加到首页快捷菜单">[+]</a></li>
        <li class="spacer-gray"></li>
        <li><a class="labelbox <?php if (!$_GET['action']) echo 'current'; ?>"
               href="<?php echo url('#') ?>">商品限购</a></li>
        <li><a class="labelbox <?php if ($_GET['action'] == 'add') echo 'current'; ?>"
               href="<?php echo url('#') . '&action=add' ?>">添加限购</a></li>
    </ul>
    <div class="hr-gray"></div>
</div>
<?php include template('header', 'admin'); ?>
<?php include template('#common/nav'); ?>
<div class="content padding-big have-fixed-nav">
    <?php include template('#common/tip'); ?>
    <div class="table-work border margin-tb">
        <div class="border border-white tw-wrap">
            <a href="<?php echo url('#'); ?>&action=add"><i class="ico_add"></i>添加</a>
        </div>
    </div>

    <?php if (empty($limits)) : ?>
        <h1 class="text-center">没有查询到更多记录。</h1>
    <?php else: ?>
    <div class="table border resize-table paging-table clearfix">
        <div class="tr">
            <div class="th" data-width="35">商品名称</div>
            <div class="th" data-width="35">设置时间</div>
            <div class="th" data-width="10">限购数量</div>
            <div class="th" data-width="10">启用状态</div>
            <div class="th" data-width="10">操作</div>

        </div>
        <?php foreach ($limits as $k => $v) : ?>
            <div class="tr">
                <div class="td td-con"><?php echo $v['sku_name']; ?></div>
                <div class="td"><?php echo date('Y-m-d H:i', $v['start_at']), ' 至 ', date('Y-m-d H:i', $v['end_at']); ?></div>
                <div class="td"><?php echo $v['number']; ?></div>
                <div class="td"><?php echo $v['status'] ? '开启' : '关闭'; ?></div>
                <div class="td">
                    <a href="<?php echo url('#'), '&action=edit&bid=', $v['id']; ?>">编辑</a>　
                    <a data-confirm="确认删除吗？" href="<?php echo url('#'), '&action=delete&bid=', $v['id']; ?>">删除</a>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="paging padding-tb">
            <?php echo $page; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<script>
    window.onload = function () {
        $(".table").resizableColumns();
        $(".paging-table").fixedPaging();
    }
</script>
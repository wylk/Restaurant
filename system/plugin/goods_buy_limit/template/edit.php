<?php include template('header', 'admin'); ?>
<?php include template('#common/nav'); ?>
<div class="content padding-big have-fixed-nav">
    <?php include template('#common/tip'); ?>
    <form action="<?php echo url('#'), '&action=save'; ?>" method="post">

        <div class="form-group buy_limit">
            <span class="label">商品：</span>
            <div class="box ">
                <input class="goods-class-text input input-readonly"
                       value="<?php echo $limit['sku_name']; ?>" readonly="readonly" type="text"
                       data-title="" data-pic="" data-price="" data-spec="" data-number="" data-id="0" data-sku="true"/>
                <input type="hidden" name="sku_id" value="<?php echo $limit['sku_id'] ?>" data-type="id">
                <input class="goods-class-btn" type="button" value="选择"/>
            </div>
        </div>
        <?php echo form::input('calendar', 'start_at', date('Y-m-d H:s', $limit['start_at'] ?: time()), '开始时间：', '此时间之前购买该商品将不被纳入限制统计。'); ?>
        <?php echo form::input('calendar', 'end_at', date('Y-m-d H:s', $limit['end_at'] ?: time() + 86400), '结束时间：', ''); ?>
        <?php echo form::input('text', 'number', $limit['number'] ?: 1, '限购数量：'); ?>
        <?php echo form::input('radio', 'status', $limit['status'], '状态：', '', array('items' => array(1 => '开启', 0 => '关闭'))); ?>

        <div class="form-group">
            <?php echo form::input('hidden', 'id', $limit['id'] ?: null); ?>
            <input type="submit" class="button bg-main" value="保存"/>
            <a class="button margin-left bg-gray" href="">返回</a>
        </div>
    </form>
</div>
<script type="text/javascript">
    // 选择商品
    $(".buy_limit .goods-class-btn").live('click', function () {
        var params = {
            id: $("input[data-sku]").attr('data-id'),
            title: $("input[data-sku]").attr('data-title'),
            pic: $("input[data-sku]").attr('data-pic'),
            spec: $("input[data-sku]").attr('data-spec'),
            price: $("input[data-sku]").attr('data-price'),
            number: $("input[data-sku]").attr('data-number')
        }
        top.dialog({
            url: "<?php echo url('goods/sku/select');?>&multiple=0",
            title: '选择商品',
            width: 980,
            selected: params,
            onclose: function () {
                $("input[data-type='id']").attr("value", this.returnValue.id);
                $("input[data-sku]").attr("data-id", this.returnValue.id);
                $("input[data-sku]").attr("data-title", this.returnValue.title).attr("value", this.returnValue.title);
                $("input[data-sku]").attr("data-pic", this.returnValue.pic);
                $("input[data-sku]").attr("data-spec", this.returnValue.spec);
                $("input[data-sku]").attr("data-price", this.returnValue.price);
                $("input[data-sku]").attr("data-number", this.returnValue.number);
            }
        })
            .showModal();
    });
</script>
<?php include PLUGIN_PATH.PLUGIN_ID.'/template/shop/public/header.php';?>
    <!-- main container -->
    <div class="content">

        <!-- settings changer -->
        <div id="pad-wrapper" class="users-list">
            <div class="row header">
                <h3>订单列表</h3>
                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">
                    <form method="post">
                    <input type="text" class="col-md-5 search" placeholder="输入订单号" name="goods_name" value="<?php echo $data2['goods_name']?>">
                    <input type="submit" value="搜索" style="
                        position: relative;
                        top: 10px;
                        left: 0px;" id="search">
                    </form>
                </div>
            </div>

            <!-- Users table -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover" style="text-align: center">
                        <thead >
                            <tr>
                                <th class="col-md-1 sortable">
                                    订单号
                                </th>


                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>用户名
                                </th>
                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>桌号
                                </th>

                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>商品数量
                                </th>
                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>订单金额
                                </th>
                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>订单状态
                                </th>

                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>座位类型
                                </th>

                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>备注
                                </th>
                                 <th class="col-md-1 sortable ">
                                    <span class="line"></span>后厨状态
                                </th>

                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>创建时间
                                </th>
                                <th class="col-md-2 sortable ">
                                    <span class="line"></span>操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                     <?php

                     if(!empty($data))
                     {

                        foreach ($data as $key => $v):


                      ?>
                        <!-- row -->
                        <tr>
                            <td>
                                <?php echo $v['order_no']?>
                            </td>
                            <td>
                                <?php echo $v['uid']?>
                            </td>
                            <td>
                                <?php echo $v['title']?>
                            </td>
                            <td>
                               <?php echo $v['goods_num']?>
                            </td>

                             <td>
                                <?php echo $v['total'];?>
                            </td>

                             <td>
                                <?php
                                if($v['status']==1)
                                {

                                    echo '未付款';

                                }elseif($v['status']==2)
                                {
                                    echo '确认付款';
                                }elseif($v['status']==3)
                                {
                                    echo '付款成功';
                                }
                                ?>
                            </td>
                            <td>
                              <?php echo $v['seat_type']?>
                            </td>

                            <td>
                                <?php echo $v['remark'];?>
                            <td>
                                <?php
                                if($v['print_status']==0)
                                {

                                    echo '未打印';

                                }elseif($v['print_status']==1)
                                {
                                    echo '已打印';
                                }elseif($v['print_status']==2)
                                {
                                    echo '已接单';
                                }elseif($v['print_status']==3)
                                {
                                    echo '已出单';
                                }elseif($v['print_status']==4)
                                {
                                    echo '已清台';
                                }
                                ?>
                            </td>

                            <td>

                               <?php echo date('Y-m-d H:i:s',$v['addtime'])?>
                            </td>


                            <td>
                              <a href="/index.php?m=plugin&p=shop&cn=index&id=food:sit:do_order_edit&order_id=<?php echo $v['id']?>">点击查看详细</a>
                            </td>
                        </tr>
                        <!-- row -->
                       <?php endforeach;}else{?>
                        暂无数据
                        <?php };?>
                        </tbody>
                    </table>
                </div>
            </div>
          <?php echo $pagebar?>
            <!-- end users table -->
        </div>
    </div>
    <!-- end main container -->


    <!-- scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo FOOD_PATH;?>js/bootstrap.min.js"></script>
    <script src="<?php echo FOOD_PATH;?>js/theme.js"></script>
</body>
</html>
<script type="text/javascript">
    $(function(){
       $('[id=del]').click(function(){
        if(confirm('是否确定删除?')==false)
        {
            return false;
        }
           var id = $(this).data('id');
           $.get('./index.php?m=plugin&p=shop&cn=index&id=food:sit:do_goods_del',{del_id:id},function(re){
            console.log(re);
               if (re.error == 0) {
                    alert(re.msg);
                     window.location.reload();
               }else{
                    alert(re.msg);
               }
           },'json');
       });
    });
</script>

<?php include PLUGIN_PATH.PLUGIN_ID.'/template/shop/public/header.php';?>
    <!-- main container -->
    <div class="content">

        <!-- settings changer -->
        <div id="pad-wrapper" class="users-list">
            <div class="row header">
                <h3>商品列表</h3>
                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">
                    <form method="post">
                    <input type="text" class="col-md-5 search" placeholder="输入商品名称" name="goods_name" value="<?php echo $data2['goods_name']?>">
                    <input type="submit" value="搜索" style="
                        position: relative;
                        top: 10px;
                        left: 0px;" id="search">
                    </form>
                    <a href="index.php?m=plugin&p=shop&cn=index&id=food:sit:do_goods_add" class="btn-flat success pull-right">
                        <span>&#43;</span>
                       添加商品
                    </a>
                </div>
            </div>

            <!-- Users table -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover" style="text-align: center">
                        <thead >
                            <tr>
                                <th class="col-md-1 sortable">
                                    编号
                                </th>


                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>商品图片
                                </th>
                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>商品价格
                                </th>

                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>总销量
                                </th>
                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>每日库存
                                </th>
                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>今日销量
                                </th>

                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>商品描述
                                </th>

                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>是否上架
                                </th>
                                 <th class="col-md-1 sortable ">
                                    <span class="line"></span>是否推荐
                                </th>

                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>添加时间
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
                                <?php echo $v['id']?>
                            </td>

                            <td>
                                <img src="<?php echo $v['goods_img']?>" style="width:35px;height:35px;">
                                <p><?php echo $v['goods_name'];?></p>
                            </td>
                            <td>
                                <?php echo $v['goods_price'];?>
                                <a class="btn btn-success">会员<?php echo $v['goods_member_price']?></a>
                            </td>

                             <td>
                                <?php echo $v['goods_sales'];?>
                            </td>

                             <td>
                                <?php echo $v['goods_per_stock'];?>
                            </td>
                            <td>
                                <?php echo $v['goods_today_sales'];?>
                            </td>

                            <td>
                                <?php echo $v['goods_desc'];?>
                                <a class="btn btn-primary"><?php echo $v['goods_taste']?></a>

                            <td>
                                <?php
                                if($v['is_onsale']==1)
                                {

                                    echo '是';

                                }else
                                {
                                    echo '否';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if($v['is_recommend']==1)
                                {

                                    echo '是';

                                }else
                                {
                                    echo '否';
                                }
                                ?>
                            </td>

                            <td>

                               <?php echo date('Y-m-d H:i:s',$v['addtime'])?>
                            </td>


                            <td>
                              <a href="javascript:;" id="del"  data-id="<?php echo $v['id']?>">删除</a>
                              |
                              <a href="/index.php?m=plugin&p=shop&cn=index&id=food:sit:do_goods_edit&cid=<?php echo $v['id']?>" onclick="if(confirm('是否确定编辑？')==false)return false;">编辑</a>
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

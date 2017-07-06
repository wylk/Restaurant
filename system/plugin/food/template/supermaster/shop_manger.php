
<?php include(PLUGIN_PATH . PLUGIN_ID . '/template/supermaster/header.php');?>
    <!-- main container -->
    <div class="content" style="margin-left:0px;">

        <!-- settings changer -->

        <div id="pad-wrapper" class="users-list">
            <div class="row header">
                <h3>公司管理</h3>
                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">
                    <input type="text" class="col-md-5 search" placeholder="请输入公司名称">
                </div>
            </div>

            <!-- Users table -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-1 sortable">
                                    编号
                                </th>
                                <th class="col-md-1 sortable">
                                    <span class="line"></span>公司名称
                                </th>
                                <th class="col-md-1 sortable">
                                    <span class="line"></span>公司地址
                                </th>
                                <th class="col-md-1 sortable">
                                    <span class="line"></span>法人姓名
                                </th>
                                <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>营业执照号
                                </th>
                                <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>营业执照
                                </th>
                                <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>身份证号
                                </th>
                                 <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>身份证正面
                                </th>
                                 <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>身份证反面
                                </th>
                                 <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>手机号码
                                </th>
                                 <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>电子邮箱
                                </th>
                                 <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>创建时间
                                </th>
                                 <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>操作
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <?php if(!empty($data)){
                            foreach($data as $v):
                            ?>
                        <tr class="first">
                            <td>
                               <?php  echo $v['id'];?>
                            </td>
                            <td>
                                <?php  echo $v['company_name'];?>
                            </td>
                            <td>
                               <?php  echo $v['company_address'];?>
                            </td>
                            <td class="align-left">
                               <?php  echo $v['company_person'];?>
                            </td>
                             <td>
                               <?php  echo $v['licence'];?>
                            </td>
                             <td>
                             <a rel="example_group" href="<?php echo $v['licence_path']?>">
                               <img src="<?php echo $v['licence_path']?>" style="width:35px;width:35px;">
                               </a>
                            </td>
                             <td>
                               <?php  echo $v['cart_number'];?>
                            </td>

                             <td>
                              <a rel="example_group" href="<?php echo $v['frontal_view']?>">
                               <img src="<?php echo $v['frontal_view']?>" style="width:35px;width:35px;">
                               </a>
                            </td>
                             <td>
                             <a rel="example_group" href="<?php echo $v['back_view']?>">
                             <img src="<?php echo $v['back_view']?>" style="width:35px;width:35px;">
                            </a>
                            </td>
                             <td>
                               <?php  echo $v['phone'];?>
                            </td>
                             <td>
                               <?php  echo $v['email'];?>
                            </td>
                             <td>
                               <?php  echo date('Y-m-d H:i:s',$v['addtime']);?>
                            </td>

                             <td class="align-left">
                               <a href="?m=admin&c=app&a=module&mod=food&type=shop_check&status=0&id=<?php echo $v['id']?>"><button class="btn btn-danger" onclick="if(confirm('是否确定驳回？')==false)return false;">驳回</button></a>
                               <a href="?m=admin&c=app&a=module&mod=food&type=shop_check&status=1&id=<?php echo $v['id']?>"><button class="btn btn-success" onclick="if(confirm('是否确定通过？')==false)return false;">通过</button></a>
                            </td>

                        </tr>
                        <?php endforeach;}else{?>
                            暂无数据
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
           <td colspan="12"><?php echo $pagebar;?></td>
            <!-- end users table -->
        </div>
    </div>
    <!-- end main container -->


    <!-- scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script href="<?php echo FOOD_PATH?>js/bootstrap.min.js"></script>
    <script href="<?php echo FOOD_PATH?>js/theme.js"></script>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {


      $("a[rel=example_group]").fancybox({
        'transitionIn'    : 'none',
        'transitionOut'   : 'none',
        'titlePosition'   : 'over',
        'titleFormat'   : function(title, currentArray, currentIndex, currentOpts) {
          return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
      });
    });
</script>
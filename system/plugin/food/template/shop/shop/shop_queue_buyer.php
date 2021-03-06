
    <!-- navbar -->
<?php include PLUGIN_PATH.PLUGIN_ID.'/template/shop/public/header.php';?>
    <!-- end navbar -->

    <!-- sidebar -->
<!-- <?php include PLUGIN_PATH.PLUGIN_ID.'/template/shop/public/left_menu.php';?> -->
    <!-- end sidebar -->
  <style type="text/css">

 .sortable{
     text-align: center;
 }
  </style>
  <style>
        .header {
            line-height: 28px;
            margin-bottom: 16px;
            margin-top: 18px;
            padding-bottom: 4px;
            border-bottom: 1px solid #CCC
        }
        .block-gray{
            background-color: #555555;
            color: white;
        }
        .block-red{
            background-color: #ef4437;
            color: white;
        }
        .block-primary{
            background-color: #428bca;
            color: white;
        }
        .block-success{
            background-color: #5cb85c;
            color: white;
        }
        .block-orange{
            background-color: orange;
            color: white;
        }
        #guest-queue-index-body .queue_setting, #queue-setting-index-body .queue_setting {
            display: block;
            float: left;
            height: 100px;
            width: 31.3%;
            margin-right: 2%;
            margin-bottom: 20px;
            text-align: center
        }
        #queue-setting-index-body .queue_setting {
            width: 150px;
            height: 150px;
            border-radius: 20%;
            margin-right: 20px
        }
        #guest-queue-index-body .queue_setting .name, #queue-setting-index-body .queue_setting .name{
            display: table-cell;
            font-size: 13px;
            font-weight: bold;
            line-height: 30px;
            vertical-align: middle;
            height: 60px
        }
        #queue-setting-index-body .queue_setting .name {
            height: 90px;
        }
        .table-display{
            display: table;
            width: 100%;
        }
    </style>


	<!-- main container -->
   <div class="content">
        
        <!-- settings changer -->  
        <div id="pad-wrapper" class="users-list">
            <div class="row header">
                <h3>排队列表</h3>
                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">
                <!--    <input type="text" class="col-md-5 search" placeholder="输入姓名查询">
                    
                     custom popup filter -->
                    <!-- styles are located in css/elements.css -->
                    <!-- script that enables this dropdown is located in js/theme.js 
                    <a href="index.php?m=plugin&p=shop&cn=index&id=food:sit:do_employee_add" class="btn-flat success pull-right">
                        <span>&#43;</span>
                       添加员工
                    </a>-->
                </div>
            </div>

            <!-- Users table -->
            <div class="row">
                <div class="col-md-12">
                   <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="active">
                                        <a href="?m=plugin&p=shop&cn=index&id=food:sit:do_shop_queue_buyer">
                                            客人队列
                                        </a>
                                    </li>
                                    <li >
                                        <a href="?m=plugin&p=shop&cn=index&id=food:sit:do_shop_queue">
                                            队列设置
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            排号详情设置
                                        </a>
                                    </li>
                                    <li>
                                       <a  href="?m=plugin&p=shop&cn=index&id=food:sit:do_shop_queue_add">
                                            新建 队列设置
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header">
                                <!-- <h3>
                                    队列设置 列表
                                </h3> -->
                            </div>
                            <!-- <div class="form-group">
                                <a class="btn btn-primary btn-sm" href="./index.php?c=site&a=entry&op=post&storeid=2&do=queuesetting&m=weisrc_dish">
                                    新建 队列设置
                                </a>
                            </div> -->
                            <div id="queue-setting-index-body">
                            <?php foreach ($datas as  $v) {?>
                                <a <?php if($v['status'] == 1){echo 'class="block-success queue_setting"';}else{echo 'class="block-gray queue_setting"';}?> href="./index.php?m=plugin&p=shop&cn=index&id=food:sit:do_shop_queue_edit&edit_id=<?php echo $v['id'];?>">
                                    <div class="table-display">
                                        <div class="name">
                                           当前排队人数：<?php if($v['num']){echo $v['num'];}else{ echo '0';};?> 人
                                        </div>
                                    </div>
                                    <div class="table-display">
                                        <div class="queue-enabled">
                                        <?php echo $v['title'];?>
                                        </div>
                                    </div>
                                </a>
                                <? }?>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>                
            </div>
            <!-- <ul class="pagination pull-right">
                <li><a href="#">&#8249;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&#8250;</a></li>
                <a href="javascript:;" id="test"> test</a>
                <button class="btn btn-default daterange daterange-time active">33</button>
            </ul> -->
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
      $('#test').click(function(){
       swal("友情提示！", "操作成功","success");
      });
       $('[id=del]').click(function(){
           var id = $(this).data('id');
         if (confirm('你确定要删除吗？')) {
           $.get('./index.php?m=plugin&p=shop&cn=index&id=food:sit:do_empolyee_del',{del_id:id},function(re){
            console.log(re);
               if (re.error == 0) {
                    alert(re.msg);
                    window.location.reload();
               }else{
                    alert(re.msg);
               }
           },'json');
       }else{
        return false;
       }
       });
    });
</script>
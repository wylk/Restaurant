
<!DOCTYPE html>
<html>
<head>
	<title>门店管理</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="<?php echo FOOD_PATH?>css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="<?php echo FOOD_PATH?>css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet">

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo FOOD_PATH?>css/compiled/layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo FOOD_PATH?>css/compiled/elements.css">
    <link rel="stylesheet" type="text/css" href="<?php echo FOOD_PATH?>css/compiled/icons.css">

    <!-- libraries -->
    <link href="<?php echo FOOD_PATH?>css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="<?php echo FOOD_PATH?>css/compiled/user-list.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>



<?php include PLUGIN_PATH.PLUGIN_ID.'/template/admin/public/header.php';?>
    <!-- end navbar -->

    <!-- sidebar -->
<?php include PLUGIN_PATH.PLUGIN_ID.'/template/admin/public/left.php';?>


	<!-- main container -->
    <div class="content">

        <!-- settings changer -->

        <div id="pad-wrapper" class="users-list">
            <div class="row header">
                <h3>门店管理</h3>

                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">
                    <input type="text" class="col-md-5 search" placeholder="请输入门店名称">



                    <a href="?m=plugin&p=admin&cn=index1&id=food:sit:create_shop" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        创建门店
                    </a>
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
                                    <span class="line"></span>门店名称
                                </th>
                                <th class="col-md-1 sortable">
                                    <span class="line"></span>门店类型
                                </th>
                                 <th class="col-md-1 sortable">
                                    <span class="line"></span>门店状态
                                </th>
                                <th class="col-md-1 sortable">
                                    <span class="line"></span>门店公告
                                </th>
                                <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>人均消费
                                </th>
                                 <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>门店地址
                                </th>
                                <th class="col-md-2 sortable align-left">
                                    <span class="line"></span>门店简介
                                </th>
                                <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>创建时间
                                </th>
                                 <th class="col-md-2 sortable align-left">
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
                               <?php echo $v['id'];?>
                            </td>
                            <td>
                                <?php echo $v['shop_name'];?>
                            </td>
                            <td>
                                <?php echo $v['typename']?>
                            </td>
                            <td class="align-left">
                               <?php if($v['shop_status']==1)
                                echo '开启';
                               else
                                echo '关闭';
                               ?>
                            </td>
                             <td class="align-left">
                                <?php echo $v['shop_notice'];?>
                            </td>
                             <td class="align-left">
                               <?php echo $v['cost_per']?>
                            </td>
                             <td class="align-left">
                               <?php echo $v['shop_address']?>
                            </td>
                             <td class="align-left">
                               <?php echo $v['shop_introduction']?>
                            </td>
                             <td class="align-left">
                               <?php echo date('Y-m-d H:i:s',$v['add_time'])?>
                            </td>
                             <td class="align-left">

                               <a href="?m=plugin&p=admin&cn=index1&id=food:sit:shop_edit&bid=<?php echo $v['id']?>"><button class="btn btn-success" onclick="if(confirm('是否确认修改？')==false)return false;">修改</button></a>
                                <a href="?m=plugin&p=admin&cn=index1&id=food:sit:shop_del&bid=<?php echo $v['id']?>"><button class="btn btn-danger" onclick="if(confirm('是否确认删除？')==false)return false;">删除</button></a>
                            </td>

                        </tr>
                        <?php endforeach;}else{?>
                            暂无数据
                        <?php };?>
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

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
                                <th class="col-md-2 sortable">
                                    <span class="line"></span>门店名称
                                </th>
                                <th class="col-md-2 sortable">
                                    <span class="line"></span>门店类型
                                </th>
                                <th class="col-md-2 sortable">
                                    <span class="line"></span>订餐类型
                                </th>
                                <th class="col-md-2 sortable align-left">
                                    <span class="line"></span>商品管理
                                </th>
                                 <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>门店状态
                                </th>
                                 <th class="col-md-2 sortable align-left">
                                    <span class="line"></span>操作
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <tr class="first">
                            <td>
                                1
                            </td>
                            <td>
                               五一乐卡
                            </td>
                            <td>
                                江湖菜系
                            </td>
                            <td class="align-left">
                                到店，外卖
                            </td>
                             <td class="align-left">
                                <button class="btn btn-primary">商店</button>
                                <button class="btn btn-danger">分类</button>
                            </td>
                             <td class="align-left">
                               <button class="btn btn-success">开启</button>
                            </td>
                             <td class="align-left">
                               <button class="btn btn-danger">删除</button>
                               <button class="btn btn-success">修改</button>
                            </td>

                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
            <ul class="pagination pull-right">
                <li><a href="#">&#8249;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&#8250;</a></li>
            </ul>
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
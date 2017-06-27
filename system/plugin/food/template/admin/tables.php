<!DOCTYPE html>
<html>
<head>
	<title>订单中心</title>

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
    <link rel="stylesheet" href="<?php echo FOOD_PATH?>css/compiled/tables.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


</head>
<body>

<?php include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/public/header.php';?>
<?php include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/public/left.php';?>


	<!-- main container -->
    <div class="content">


        <div id="pad-wrapper">


            <!-- end products table -->

            <!-- orders table -->
            <div class="table-wrapper orders-table section">
                <div class="row head">
                    <div class="col-md-12">
                        <h4>订单列表</h4>
                    </div>
                </div>

                <div class="row filter-block">
                    <div class="pull-right">
                        <!-- <div class="btn-group pull-right">
                            <button class="glow left large">All</button>
                            <button class="glow middle large">Pending</button>
                            <button class="glow right large">Completed</button>
                        </div> -->
                        <input type="text" class="search order-search" placeholder="输入订单号" />
                    </div>
                </div>

                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th class="col-md-1">
                                    编号
                                </th>
                                <th class="col-md-2">
                                <span class="line"></span>
                                    订单号
                                </th>
                                <th class="col-md-1">
                                    <span class="line"></span>
                                    订单总额
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span>
                                    联系信息
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span>
                                    类型
                                </th>
                                <th class="col-md-1">
                                    <span class="line"></span>
                                    状态
                                </th>
                                <th class="col-md-1">
                                    <span class="line"></span>
                                    支付状态
                                </th>
                                 <th class="col-md-2">
                                    <span class="line"></span>
                                    下单时间
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->
                            <tr class="first">
                                <td>
                                    <a href="#">1</a>
                                </td>
                                <td>
                                    2017090812312111111
                                </td>
                                <td>
                                    <a href="#">￥1000</a>
                                </td>
                                <td>
                                   北京市海淀区苏州街银丰大厦3楼
                                </td>
                                <td>
                                    预订
                                </td>
                                <td>
                                   <span class="label label-success">Completed</span>
                                </td>
                                <td>
                                   <span class="label label-success">Completed</span>
                                </td>
                                <td>
                                   2017年09月08号
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end orders table -->



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
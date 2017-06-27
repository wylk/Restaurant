<!DOCTYPE html>
<html>
<head>
    <title>创建店长账号</title>

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
                        <h4>店长列表</h4>
                    </div>
                </div>

                <div class="row filter-block">
                    <div class="pull-right">
                        <!-- <div class="btn-group pull-right">
                            <button class="glow left large">All</button>
                            <button class="glow middle large">Pending</button>
                            <button class="glow right large">Completed</button>
                        </div> -->
                        <input type="text" class="search order-search" placeholder="输入店长姓名" />
                        <a href="?m=plugin&p=admin&cn=index1&id=food:sit:create_employee" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        创建店长账号
                    </a>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th class="col-md-2">
                                    编号
                                </th>
                                <th class="col-md-2">
                                <span class="line"></span>
                                    店长姓名
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span>
                                    所属门店
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span>
                                    角色
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span>
                                    状态
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span>
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->
                            <tr class="first">
                               <td>1</td>
                               <td>人人6</td>
                               <td>五一乐卡</td>
                               <td>店长</td>
                               <td><button class="btn btn-success">启用</button></td>
                               <td><button class="btn btn-primary">修改</button><button class="btn btn-danger">删除</button></td>
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
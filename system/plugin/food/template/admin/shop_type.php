<!DOCTYPE html>
<html>
<head>
    <title>门店类型</title>

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
                        <h4>门店类型</h4>
                    </div>
                </div>

                <div class="row filter-block">
                    <div class="pull-right">
                       <?php var_dump($data);?>
                        <input type="text" class="search order-search" placeholder="输入门店类型名称" />
                        <a href="?m=plugin&p=admin&cn=index1&id=food:sit:create_shop_type" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        创建门店类型
                    </a>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th class="col-md-3">
                                    编号
                                </th>
                                <th class="col-md-3">
                                <span class="line"></span>
                                    图标
                                </th>
                                <th class="col-md-3">
                                    <span class="line"></span>
                                    名称
                                </th>
                                <th class="col-md-3">
                                    <span class="line"></span>
                                    操作
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->
                            <tr class="first">
                               <td>1</td>
                               <td><img src="1.jpg" alt=""></td>
                               <td>川菜馆</td>
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
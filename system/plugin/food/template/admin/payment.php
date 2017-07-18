<!DOCTYPE html>
<html>
<head>
    <title>支付配置列表</title>

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
                        <h4>支付配置列表</h4>
                    </div>
                </div>

                <div class="row filter-block">
                    <div class="pull-right">
                        <!-- <div class="btn-group pull-right">
                            <button class="glow left large">All</button>
                            <button class="glow middle large">Pending</button>
                            <button class="glow right large">Completed</button>
                        </div> -->

                        <a href="?m=plugin&p=admin&cn=index1&id=food:sit:add_payment" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        添加支付配置
                    </a>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th class="col-md-1">
                                    编号
                                </th>
                                <th class="col-md-1">
                                <span class="line"></span>
                                    appid
                                </th>
                                <th class="col-md-1">
                                    <span class="line"></span>
                                    appsecret
                                </th>
                                <th class="col-md-1">
                                    <span class="line"></span>
                                    商户号
                                </th>
                                 <th class="col-md-1">
                                    <span class="line"></span>
                                    创建时间
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span>
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($data)){
                                foreach($data as $v):

                                ?>
                            <tr class="first">
                                <td><?php echo $v['id']?></td>
                                <td><?php echo $v['appid']?></td>
                                <td><?php echo $v['appsecret']?></td>
                                <td><?php echo $v['mch_id']?></td>
                                <td><?php echo date('Y-m-d H:i:s',$v['addtime'])?></td>

                               <td>
                               <a href="?m=plugin&p=admin&cn=index1&id=food:sit:edit_payment&pid=<?php echo $v['id']?>"><button class="btn btn-primary" onclick="if(confirm('是否确认修改？')==false)return false;">修改</button></a>
                               <a href="?m=plugin&p=admin&cn=index1&id=food:sit:del_payment&pid=<?php echo $v['id']?>"><button class="btn btn-danger" onclick="if(confirm('是否确认删除？')==false)return false;">删除</button></a>
                               </td>
                            </tr>
                            <?php endforeach;}else{?>
                                暂无数据
                                <?php };?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->

    <!-- scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo FOOD_PATH?>js/bootstrap.min.js"></script>
    <script src="<?php echo FOOD_PATH?>js/theme.js"></script>
</body>
</html>
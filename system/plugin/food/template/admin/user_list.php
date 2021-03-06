
<!DOCTYPE html>
<html>
<head>
    <title>商家后台管理</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="<?php echo FOOD_PATH?>css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo FOOD_PATH?>css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="<?php echo FOOD_PATH?>css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo FOOD_PATH?>css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo FOOD_PATH?>css/compiled/layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo FOOD_PATH?>css/compiled/elements.css">
    <link rel="stylesheet" type="text/css" href="<?php echo FOOD_PATH?>css/compiled/icons.css">

    <!-- this page specific styles -->
    <link rel="stylesheet" href="<?php echo FOOD_PATH?>css/compiled/index.css" type="text/css" media="screen" />


</head>
<body>
<?php include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/public/header.php';?>
<?php include_once PLUGIN_PATH.PLUGIN_ID.'/template/admin/public/left.php';?>

	<!-- main container -->
    <div class="content">

        <!-- settings changer -->

        <div id="pad-wrapper" class="users-list">
            <div class="row header">
                <h3>门店管理</h3>

                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">
                    <form action="?m=plugin&p=admin&cn=index1&id=food:sit:user_list" method="post">
                    <input type="text" class="col-md-5 search" placeholder="请输入门店名称" name="shop_name" value="<?php echo $data1['shop_name']?>">
                     <input type="submit" value="搜索" style="margin-top: 12px;">


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
                                <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>门店简介
                                </th>
                                <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>创建时间
                                </th>
                                 <th class="col-md-2 sortable align-left">
                                    <span class="line"></span>操作
                                </th>
                                 <th class="col-md-1 sortable align-left">
                                    <span class="line"></span>管理
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
                             <td class="align-right">

                               <a href="?m=plugin&p=admin&cn=index1&id=food:sit:shop_edit&bid=<?php echo $v['id']?>" class="btn btn-success" onclick="if(confirm('是否确认修改？')==false)return false;">修改</a>
                                <a href="?m=plugin&p=admin&cn=index1&id=food:sit:shop_del&bid=<?php echo $v['id']?>"><button class="btn btn-danger" onclick="if(confirm('是否确认删除？')==false)return false;">删除</button></a>

                            </td>
                            <td><a href="?m=plugin&p=shop&cn=index&id=food:sit:doindex&store_id=<?php echo $v['id']?>" class="btn btn-success">进入店铺</a></td>

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
    <script src="<?php echo FOOD_PATH?>js/bootstrap.min.js"></script>
    <script src="<?php echo FOOD_PATH?>js/theme.js"></script>

    <!-- flot charts -->



</body>
</html>
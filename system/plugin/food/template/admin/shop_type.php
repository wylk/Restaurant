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
    <link rel="stylesheet" href="http://js.alixixi.com/demo/584/style/jquery.fancybox-1.3.1.css" type="text/css" />


    <!-- open sans font -->



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
                        <form action="" method="post">
                        <input type="text" class="search order-search" name="typename" placeholder="输入门店类型名称" style="    margin: 0 588px 0 0;
    position: relative;
    top: 26px;
    left: 0px" value="<?php echo $data2['typename']?>" />
                        <input type="submit" value="搜索" style="position: relative;
    top: 26px;
    left: -591px;">
                        </form>
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
                            <th class="col-md-2">
                                    编号
                                </th>
                                <th class="col-md-2">
                                <span class="line"></span>
                                    名称
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span>
                                    图标
                                </th>
                                 <th class="col-md-3">
                                    <span class="line"></span>
                                    创建时间
                                </th>
                                <th class="col-md-3">
                                    <span class="line"></span>
                                    操作
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->
                            <?php if(!empty($data)){
                                foreach($data as $v):
                                ?>
                            <tr class="first">
                               <td><?php echo $v['id']?></td>

                               <td><?php echo $v['typename']?></td>

                               <td>
                               <a rel="example_group" href="<?php echo $v['type_img']?>">
                               <img src="<?php echo $v['type_img']?>" alt="" style="width:50px;height:50px;">
                               </a>
                               </td>
                               <td><?php echo date('Y-m-d H:i:s',$v['create_time'])?></td>
                               <td>
                               <a href="?m=plugin&p=admin&cn=index1&id=food:sit:shop_type_edit&sid=<?php echo $v['id'];?>"><button class="btn btn-primary" onclick="if(confirm('是否确定修改？')==false)return false;">修改</button></a>
                               <a href="?m=plugin&p=admin&cn=index1&id=food:sit:shop_type_del&sid=<?php echo $v['id'];?>"><button class="btn btn-danger" onclick="if(confirm('是否确定删除？')==false) return false;">删除</button></a></td>
                            </tr>
                            <?php endforeach;}else{?>
                                暂无数据
                            <?php };?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end orders table -->

  <td colspan="12"><?php echo $pagebar;?></td>

            <!-- end users table -->
        </div>
    </div>
    <!-- end main container -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
    <!-- scripts -->

    <script src="<?php echo FOOD_PATH?>js/theme.js"></script>
    <script type="text/javascript" src="http://js.alixixi.com/demo/584/js/jquery.fancybox-1.3.1.js"></script>
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
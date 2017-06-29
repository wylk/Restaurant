
<!DOCTYPE html>
<html>
<head>
    <title>创建门店类型</title>

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
    <link rel="stylesheet" type="text/css" href="<?php echo FOOD_PATH?>css/lib/font-awesome.css">

    <!-- this page specific styles -->
    <link rel="stylesheet" href="<?php echo FOOD_PATH?>css/compiled/new-user.css" type="text/css" media="screen" />
    <link href="<?php echo FOOD_PATH?>css/bootstrap/bootstrapValidator.min.css" rel="stylesheet">

    <script src="<?php echo FOOD_PATH?>js/jquery-1.8.3.js"></script>
    <script src="http://www.gouguoyin.cn/template/default/js/jquery.pin.js"></script>

    <script src="<?php echo FOOD_PATH?>js/jquery.uploadView.js"></script>

</head>
<body>

    <?php include PLUGIN_PATH.PLUGIN_ID.'/template/admin/public/header.php';?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include PLUGIN_PATH.PLUGIN_ID.'/template/admin/public/left.php';?>


    <!-- main container -->
    <div class="content">


        <div id="pad-wrapper" class="new-user">
            <div class="row header">
                <div class="col-md-12">
                    <h3>创建门店类型</h3>
                </div>
            </div>

            <div class="row form-wrapper">
                <!-- left column -->
                <div class="col-md-9 with-sidebar">
                    <div class="container">
                        <form class="new_user_form" id="defaultForm" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <div class="col-md-12 field-box">
                                <label for="typename">门店类型名称:</label>
                                <input class="form-control" id="typename" type="text" name="typename"/>
                            </div>
                            </div>
                            <div class='js_uploadBox'>
                            <div class="form-group">
                             <div class="col-md-12 field-box">
                                <label for="type_img" class='js_uploadText'>门店类型图标:</label>
                                <input type="file" id="type_img" name="type_img" class="js_upFile">
                            </div>
                             <div class="js_showBox" ><img class="js_logoBox" src="" width="100px" ></div>
                            </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="typename">门店类型名称</label>
                                <div class="col-lg-12">
                                <input type="text" class="form-control" id="typename" name="typename" placeholder="门店类型名称">
                                </div>
                            </div>
                              <div class="form-group">
                                <label for="type_img">门店类型图标</label>
                                <div class="col-lg-12">
                                <input type="file" id="type_img" name="type_img">
                                </div>

                              </div> -->
                            <div class="col-md-11 field-box actions">
                                <input type="submit" id="validateBtn" class="btn-glow primary" value="确定创建">
                                <span>or</span>
                                <input type="reset" value="取消" class="reset" id="resetBtn">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- side right column -->
                <div class="col-md-3 form-sidebar pull-right">
                    <div class="btn-group toggle-inputs hidden-tablet">
                        <button class="glow left active" data-input="normal">NORMAL INPUTS</button>
                        <button class="glow right" data-input="inline">INLINE INPUTS</button>
                    </div>
                    <div class="alert alert-info hidden-tablet">
                        <i class="icon-lightbulb pull-left"></i>
                        Click above to see difference between inline and normal inputs on a form
                    </div>
                    <h6>Sidebar text for instructions</h6>
                    <p>Add multiple users at once</p>
                    <p>Choose one of the following file types:</p>
                    <ul>
                        <li><a href="#">Upload a vCard file</a></li>
                        <li><a href="#">Import from a CSV file</a></li>
                        <li><a href="#">Import from an Excel file</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->


    <!-- scripts -->



    <script type="text/javascript">

        $(".js_upFile").uploadView({
            uploadBox: '.js_uploadBox',//设置上传框容器
            showBox : '.js_showBox',//设置显示预览图片的容器
            width : 100, //预览图片的宽度，单位px
            height : 100, //预览图片的高度，单位px
            allowType: ["gif", "jpeg", "jpg", "bmp", "png"], //允许上传图片的类型
            maxSize :2, //允许上传图片的最大尺寸，单位M
            success:function(e){
                $(".js_uploadText").text('更改图片');
                alert('图片上传成功');
            }
        });

    </script>

    <script type="text/javascript">
        $(function () {

            // toggle form between inline and normal inputs
            var $buttons = $(".toggle-inputs button");
            var $form = $("form.new_user_form");

            $buttons.click(function () {
                var mode = $(this).data("input");
                $buttons.removeClass("active");
                $(this).addClass("active");

                if (mode === "inline") {
                    $form.addClass("inline-input");
                } else {
                    $form.removeClass("inline-input");
                }
            });
        });
    </script>
</body>
</html>
<script>
    $(document).ready(function(){
      $('#validateBtn').click(function(){
        var a1=$("input[name='typename']").val();
        var a2=$("input[name='type_img']").val();
        if(a1=='')
        {
            alert('门店类型不能为空');
            return false;
        }
        if(a2=='')
        {
            alert('请上传门店图标');
            return false;
        }
    });
});
</script>
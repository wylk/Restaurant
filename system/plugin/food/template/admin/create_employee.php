
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
    <link rel="stylesheet" type="text/css" href="<?php echo FOOD_PATH?>css/lib/font-awesome.css">

    <!-- this page specific styles -->
    <link rel="stylesheet" href="<?php echo FOOD_PATH?>css/compiled/new-user.css" type="text/css" media="screen" />

    <script src="https://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

    <?php include PLUGIN_PATH.PLUGIN_ID.'/template/admin/public/header.php';?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php include PLUGIN_PATH.PLUGIN_ID.'/template/admin/public/left.php';?>


    <!-- main container -->
    <div class="content">

        <!-- settings changer -->
        <!-- <div class="skins-nav">
            <a href="#" class="skin first_nav selected">
                <span class="icon"></span><span class="text">Default</span>
            </a>
            <a href="#" class="skin second_nav" data-file="css/compiled/skins/dark.css">
                <span class="icon"></span><span class="text">Dark skin</span>
            </a>
        </div> -->

        <div id="pad-wrapper" class="new-user">
            <div class="row header">
                <div class="col-md-12">
                    <h3>创建店长账号</h3>
                </div>
            </div>

            <div class="row form-wrapper">
                <!-- left column -->
                <div class="col-md-9 with-sidebar">
                    <div class="container">
                        <form class="new_user_form">
                            <div class="col-md-12 field-box">
                                <label>登录账号:</label>
                                <input class="form-control" type="email" />
                            </div>
                            <div class="col-md-12 field-box">
                                <label>登录密码:</label>
                                <input class="form-control" type="password" />
                            </div>
                            <div class="col-md-12 field-box">
                                <label>确认密码:</label>
                                <input class="form-control" type="password" />
                            </div>
                             <div class="col-md-12 field-box">
                                <label>所属门店:</label>
                         <div class="btn-group">
                          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            所属门店 <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </div>
                            </div>
                             <div class="col-md-12 field-box">
                                <label>真实姓名:</label>
                                <input class="form-control" type="email" />
                            </div>
                            <div class="col-md-12 field-box">
                                <label>手机号码:</label>
                                <input class="form-control" type="email" />
                            </div>
                            <div class="col-md-12 field-box">
                                <label>验证码:</label>
                                <input class="form-control" type="email" />
                            </div>
                            <div class="col-md-12 field-box">
                                <label>电子邮箱:</label>
                                <input class="form-control" type="email" />
                            </div>
                            <div class="col-md-12 field-box">
                                <label>操作权限:</label>

                                <label>
                                  <input type="checkbox">订单管理
                                </label>
                                <label>
                                  <input type="checkbox">接收订单通知
                                </label>
                                 <label>
                                  <input type="checkbox">服务员通知
                                </label>
                                 <label>
                                  <input type="checkbox">排队通知
                                </label>
                                 <label>
                                  <input type="checkbox">每日统计通知
                                </label>

                            </div>
                            <div class="col-md-12 field-box">
                                <label>状态:</label>
                                 <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>启用
                                  </label>
                                  <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>禁用
                                  </label>

                            </div>
                             <div class="col-md-12 field-box">
                                <label>备注:</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>

                            <div class="col-md-11 field-box actions">
                                <input type="button" class="btn-glow primary" value="确定创建">
                                <span>or</span>
                                <input type="reset" value="取消" class="reset">
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
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script href="<?php echo FOOD_PATH?>js/bootstrap.min.js"></script>
    <script href="<?php echo FOOD_PATH?>js/theme.js"></script>

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
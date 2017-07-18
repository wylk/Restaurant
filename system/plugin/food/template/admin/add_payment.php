
<!DOCTYPE html>
<html>
<head>
    <title>添加支付配置</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="<?php echo FOOD_PATH?>css/bootstrap/bootstrap.css" rel="stylesheet">


    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo FOOD_PATH?>css/compiled/layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo FOOD_PATH?>css/compiled/elements.css">
    <link rel="stylesheet" type="text/css" href="<?php echo FOOD_PATH?>css/compiled/icons.css">

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="<?php echo FOOD_PATH?>css/lib/font-awesome.css">

    <!-- this page specific styles -->
    <link rel="stylesheet" href="<?php echo FOOD_PATH?>css/compiled/new-user.css" type="text/css" media="screen" />

    <script src="https://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>


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
                    <h3>添加支付配置</h3>
                </div>
            </div>

            <div class="row form-wrapper">
                <!-- left column -->
                <div class="col-md-9 with-sidebar">
                    <div class="container">

                            <div class="col-md-12 field-box">
                                <label>appid:</label>
                                <input class="form-control" type="text" name="appid" placeholder="appid" />
                            </div>
                           <!--   <div class="form-group">
                                <label for="exampleInputEmail1">登录账号:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email">
                              </div> -->

                            <div class="col-md-12 field-box">
                                <label>支付秘钥:</label>
                                <input class="form-control" type="text" name="appsecret" placeholder="appsecret"/>
                            </div>
                            <div class="col-md-12 field-box">
                                <label>支付商户号:</label>
                                <input class="form-control" type="text" name="mch_id" placeholder="输入支付的商户号mch_id"/>
                            </div>


                            <div class="col-md-11 field-box actions">
                                <input type="submit" class="btn-glow primary" value="确定添加">
                                <span>or</span>
                                <input type="reset" value="取消" class="reset">
                            </div>

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
    <script src="<?php echo FOOD_PATH?>js/bootstrap.min.js"></script>
    <script src="<?php echo FOOD_PATH?>js/theme.js"></script>

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
   $(function(){
    $(':submit').click(function(){
        var a1=$("input[name='appid']").val();
        var a2=$("input[name='appsecret']").val();
        var a3=$("input[name='mch_id']").val();
        if(a1=='')
        {
            alert('支付appid不能为空');
            return false;
        }
        if(a2=='')
        {
            alert('支付秘钥不能为空');
            return false;
        }
        if(a3=='')
        {
            alert('支付商户号不能为空');
            return false;
        }

        var postData={appid:a1};
        postData.appsecret=a2;
        postData.mch_id=a3;
        console.log(postData);
        $.post('?m=plugin&p=admin&cn=index1&id=food:sit:add_payment',postData,function(re){
            if(re.error==0)
            {
                alert(re.msg);
                window.location.href="?m=plugin&p=admin&cn=index1&id=food:sit:payment";
            }else
            {
                alert(re.msg);
            }
        },'json');
    });
   });
</script>
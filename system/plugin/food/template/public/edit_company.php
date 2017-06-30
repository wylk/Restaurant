<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑公司信息</title>

    <link href="<?php echo FOOD_PATH?>css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="<?php echo FOOD_PATH?>css/bootstrap/bootstrapValidator.min.css" rel="stylesheet">

    <script src="<?php echo FOOD_PATH?>js/jquery-1.10.2.min.js"></script>

    <script src="<?php echo FOOD_PATH?>js/bootstrap.min.js"></script>
    <script src="<?php echo FOOD_PATH?>js/bootstrapValidator.min.js"></script>
    <script src="http://www.gouguoyin.cn/template/default/js/jquery.pin.js"></script>

    <script src="<?php echo FOOD_PATH?>js/jquery.uploadView.js"></script>
</head>
<body>
<!-- <h3 style="text-align:center;"></h3> -->
<div class="container">
    <div class="row">
    <section>
    <div class="col-lg-8 col-lg-offset-2">
    <div class="page-header">
    <h2>请编辑公司信息</h2>
</div>
    <form id="defaultForm" method="post" class="form-horizontal" action="?m=plugin&p=public&cn=index&id=food:sit:edit_company" enctype="multipart/form-data">
 <input type="hidden" class="form-control" id="company_name" name="cid" placeholder="公司名称" value="<?php echo $data1['id']?>">
  <div class="form-group">
    <label for="company_name">公司名称</label>
    <div class="col-lg-12">
    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="公司名称" value="<?php echo $data1['company_name']?>">
    </div>
  </div>
   <div class="form-group">
    <label for="company_address">公司地址</label>
     <div class="col-lg-12">
    <input type="text" class="form-control" id="company_address" name="company_address" placeholder="公司地址" value="<?php echo $data1['company_address']?>">
    </div>
  </div>
   <div class="form-group">
    <label for="company_person">法人姓名</label>
     <div class="col-lg-12">
    <input type="text" class="form-control" id="company_person" name="company_person" placeholder="法人姓名" value="<?php echo $data1['company_person']?>">
    </div>
  </div>
   <div class="form-group">
    <label for="licence">营业执照号码</label>
    <div class="col-lg-12">
    <input type="text" class="form-control" id="licence" name="licence" placeholder="营业执照号码" value="<?php echo $data1['licence']?>">
    </div>
  </div>
   <div class='js_uploadBox'>
   <div class="form-group">
    <label for="licence_path" class='js_uploadText'>营业执照</label>
     <div class="col-lg-12">
    <input type="file" id="licence_path" name="licence_path" value="<?php echo $data1['licence_path']?>" class="js_upFile">
    </div>
    <div class="js_showBox" ><img class="js_logoBox" src="<?php echo $data1['licence_path']?>" width="100px" ></div>
  </div>
  </div>
  <div class="form-group">
    <label for="cart_number" >身份证号码</label>
    <div class="col-lg-12">
    <input type="text" class="form-control" id="cart_number" name="cart_number" placeholder="身份证号码" value="<?php echo $data1['cart_number']?>" >
    </div>

  </div>
  <div class='js_uploadBox'>
  <div class="form-group">
    <label for="frontal_view" class='js_uploadText'>身份证正面照</label>
    <div class="col-lg-12">
    <input type="file" id="frontal_view" name="frontal_view" value="<?php echo $data1['frontal_view']?>" class="js_upFile">
    </div>
    <div class="js_showBox" ><img class="js_logoBox" src="<?php echo $data1['licence_path']?>" width="100px" ></div>
  </div>
</div>
<div class='js_uploadBox'>
  <div class="form-group">
    <label for="back_view" class='js_uploadText'>身份证反面照</label>
    <div class="col-lg-12">
    <input type="file" id="back_view" name="back_view" value="<?php echo $data1['back_view']?>" class="js_upFile">
    </div>
     <div class="js_showBox" ><img class="js_logoBox" src="<?php echo $data1['licence_path']?>" width="100px" ></div>
  </div>
  </div>
<div class="form-group">
    <label for="phone">手机号码</label>
    <div class="col-lg-12">
    <input type="text" class="form-control" id="phone" name="phone" placeholder="手机号码" value="<?php echo $data1['phone']?>">
    <p class="help-block">手机号码是作为商家登录的账号，请填写真实有效的手机号码。</p>
    </div>
  </div>
  <div class="form-group">
    <label for="password">登录密码</label>
    <div class="col-lg-12">
    <input type="password" class="form-control" id="password" name="password" placeholder="登录密码" value="<?php echo $data1['password']?>">
    </div>
    </div>
    <div class="form-group">
    <label for="repass">确认密码</label>
    <div class="col-lg-12">
    <input type="password" class="form-control" id="repass" name="repass" placeholder="确认密码" value="<?php echo $data1['password']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="email">电子邮箱</label>
    <div class="col-lg-12">
    <input type="email" class="form-control" id="email" name="email" placeholder="电子邮箱" value="<?php echo $data1['email']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="code">验证码</label>
    <div class="col-lg-12">
    <input type="text" class="form-control" id="code" name="code" placeholder="验证码">
    </div>
  </div>
  <button type="submit" class="btn btn-default">确定提交</button>
  <button type="button" class="btn btn-info" id="resetBtn">重置表单</button>
</form>
<br><br><br><br><br><br>
</div>
</section>
</div>
</div>
</body>
</html>
<script>
    $(function(){
        $(':submit')
    });
</script>
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
<script>
$(document).ready(function(){
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields:{
            company_name:{
                message: 'The username is not valid',
                validators:{
                    notEmpty:{
                        message:'公司名称不能为空'
                    },
                    stringLength:{
                        min:4,
                        max:30,
                        message:'公司名称在4-30个字符之间'
                    },
                    threshold:4,

                    regexp:{
                        regexp:/^([A-Za-z]|[\u4E00-\u9FA5]|[\u4e00-\u9fa5a-zA-Z])+$/,
                        message:'公司名称只能是英文或中文或中英文组合'
                    }
                }
            },
            company_address:{
                message:'the company_address is not valid',
                validators:{
                    notEmpty:{
                        message:'公司地址不能为空'
                    }
                }
            },
            company_person:{
                message:'the company_person is not valid',
                validators:{
                    notEmpty:{
                        message:'法人姓名不能为空'
                    },
                    regexp:{
                        regexp:/^([A-Za-z]|[\u4E00-\u9FA5])+$/,
                        message:'法人姓名只能是中文或英文'
                    }
                }
            },
            licence:{
                message:'the licence is not valid',
                validators:{
                    notEmpty:{
                        message:'营业执照号码不能为空'
                    }
                }
            },

            cart_number:{
                message:'the cart_number is not valid',
                validators:{
                    notEmpty:{
                        message:'身份证号码不能为空'
                    },
                    regexp:{
                        regexp:/^(\d{15}$|^\d{18}$|^\d{17}(\d|X|x))$/,
                        message:'身份证格式不正确'
                    }
                }
            },

            phone:{
                message:'the phone is not valid',
                validators:{
                    notEmpty:{
                        message:'手机号码不能为空'
                    },
                    stringLength:{
                        min:11,
                        max:11,
                        message:'请输入11位手机号码'
                    },
                    regexp:{
                        regexp:/^1[3,4,5,7,8]\d{9}$/,
                        message:'手机号码格式不正确'
                    }
                }
            },
            password:{
                message:'the password is not valid',
                validators:{
                    notEmpty:{
                        message:'登录密码不能为空'
                    },
                    stringLength:{
                        min:6,
                        max:32,
                        message:'请输入6-32位登录密码'
                    }
                }
            },
            repass:{
                message:'the repass is not valid',
                validators:{
                    notEmpty:{
                        message:'确认密码不能为空'
                    },
                    identical:{
                        field:'password',
                        message:'两次密码输入不一致'
                    }
                }
            },
            email:{
                message:'the email is not valid',
                validators:{
                    notEmpty:{
                        message:'电子邮箱不能为空'
                    },
                    emailAddress:{
                        message:'电子邮箱格式不正确'
                    }
                }
            },
            code:{
                message:'the code is not valid',
                validators:{
                    notEmpty:{
                        message:'验证码不能为空'
                    }
                }
            }
        }
    });
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');

    });
    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
</script>
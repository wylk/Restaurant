<?php include PLUGIN_PATH.PLUGIN_ID.'/template/shop/public/header.php';?>
    <!-- end navbar -->

    <!-- main container -->
    <div class="content">

        <!-- settings changer -->
        <div class="skins-nav">
            <a href="#" class="skin first_nav selected">
                <span class="icon"></span><span class="text">Default</span>
            </a>
            <a href="#" class="skin second_nav" data-file="css/compiled/skins/dark.css">
                <span class="icon"></span><span class="text">Dark skin</span>
            </a>
        </div>

        <div id="pad-wrapper" class="new-user">
            <div class="row header">
                <div class="col-md-12">
                    <h3>商品分类</h3>
                </div>
            </div>

            <div class="row form-wrapper">
                <!-- left column -->
                <div class="col-md-9 with-sidebar">
                    <div class="container">
                    <input class="form-control" type="hidden" name="cid" value="<?php echo $data1['id']?>"/>
                        <!-- <form class="new_user_form"> -->
                            <div class="col-md-12 field-box">
                                <label>分类名称:</label>
                                <input class="form-control" type="text" name="cat_name" value="<?php echo $data1['cat_name']?>"/>
                            </div>

                            <div class="col-md-12 field-box">
                                <label>所属分类:</label>
                                <div class="ui-select span5">
                                    <select name="pid" id="se">
                                    <option value="0">顶级分类</option>
                                    <?php if(!empty($data2)){
                                        foreach($data2 as $v):
                                            if($v['id']==$data1['pid'])
                                            {
                                                $selected='selected="selected"';
                                            }else
                                            {
                                                $selected='';
                                            }
                                        ?>

                                        <option value="<?php echo $v['id']?>" <?php echo $selected;?>><?php echo $v['cat_name']?></option>

                                        <?php endforeach;}else{?>
                                             <option value="0">暂无数据</option>
                                        <?php };?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 field-box">
                                <label>分类状态:</label>
                                <?php if($data1['status']==1):?>
                                <label>
                                <input type="radio" name="status" id="optionsRadios1" value="1" checked>开启
                                  </label>
                                  <label>
                                    <input type="radio" name="status" id="optionsRadios1" value="0">关闭
                                  </label>
                                <?php else:?>
                                    <label>
                                <input type="radio" name="status" id="optionsRadios1" value="1" >开启
                                  </label>
                                  <label>
                                    <input type="radio" name="status" id="optionsRadios1" value="0" checked>关闭
                                  </label>
                              <?php endif;?>
                            </div>

                            <div class="col-md-12 field-box textarea">
                                <label>分类描述:</label>
                                <textarea class="col-md-9" name="cat_desc" id="aa"><?php echo $data1['cat_desc']?></textarea>
                                <span class="charactersleft">分类描述不少于2个字</span>
                            </div>
                            <div class="col-md-12 field-box">
                                <label>排序:</label>
                                <input class="col-md-9 form-control" name="sort" type="text" placeholder="数字越大越靠前" value="<?php echo $data1['sort']?>"/>

                            </div>
                            <div class="col-md-11 field-box actions">
                                <input type="submit" class="btn-glow primary" value="确定修改">
                                <span>or</span>
                                <input type="reset" value="取消" class="reset">
                            </div>
                        <!-- </form> -->
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
            var a1=$("input[name='cat_name']").val();
            var a2=$("#se").val();
            var a3=$("input:radio:checked").val();
            // alert(a4);
            // return false;
            var a4=$("#aa").val();
            var a5=$("input[name='sort']").val();
            var a6=$("input[name='cid']").val();
            if(a1=='')
            {
                alert('分类名称不能为空');
                return false;
            }
            if(a4=='')
            {
                alert('分类描述不能为空');
                return false;
            }
            if(a5=='')
            {
                alert('分类排序不能为空');
                return false;
            }
            var postData={cat_name:a1};
            postData.pid=a2;
            postData.status=a3;
            postData.cat_desc=a4;
            postData.sort=a5;
            postData.cid=a6;
            console.log(postData);
            $.post('?m=plugin&p=shop&cn=index&id=food:sit:do_cat_edit',postData,function(re){
                if(re.error==0)
                {
                    alert(re.msg);
                    window.location.reload();
                }else
                {
                    alert(re.msg);
                }
            },'json');
        });
    });
</script>
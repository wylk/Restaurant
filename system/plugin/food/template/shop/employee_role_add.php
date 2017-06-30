
    <!-- navbar -->
<?php include PLUGIN_PATH.PLUGIN_ID.'/template/shop/public/header.php';?>
    <!-- end navbar -->

    <!-- sidebar -->
<!-- <?php include PLUGIN_PATH.PLUGIN_ID.'/template/shop/public/left_menu.php';?> -->
    <!-- end sidebar -->
  <style type="text/css">

 .sortable{
     text-align: center;
 }

  .ul1{
   list-style:none;
  }
  .ul1 li {
     border: 1px solid #dae3e9;
     width:70%;
     float: left;
     min-height:40px;
    line-height: 40px
  }
  </style>

	<!-- main container -->
   <div class="content">
        
        <!-- settings changer -->  
        <div id="pad-wrapper" class="users-list">
            <div class="row header">
                <h3>添加角色</h3>
            </div>

            <!-- Users table -->
            <div class="row" style="border:1px solid #dae3e9; min-height: 500px" >
                <div class="col-md-12">
                   <div class="col-md-12 field-box" style="margin-top:30px">
                                <label>角色名</label>
                                <input class="form-control" type="text" / style="width: 46%">
                    </div>
                   <p style="clear:both;"></p>
                    <div  style="border:1px solid #dae3e9; min-height: 500px; margin: 19px 19px;padding-top:20px">
                    <ul class="ul1">
                        <?php foreach ($auth1 as $k => $value) {?>
                        
                            <li style="width:20%;text-align: center;font-size: 16px;">
                               <input name="auth_pid" type="checkbox" value="<?php $value['id'];?>" /><?php echo $value['auth_name'];?>
                            </li>
                             
                            <li>
                                <?php foreach ($auth2 as $v) {?> 
                                    <?php if($value['id'] == $v['auth_pid']){?> 
                                        <span style="margin-left: 30px"><input name="auth_id" type="checkbox" value="<?php $v['id'];?>" /><?php echo $v['auth_name']?></span>
                                    <?php }?>
                                <?php }?> 
                            </li>
                             <?php if(($k+1)%2==0){ echo '</ul><ul class="ul1" style="clear:both">';}?>
                        
                         <?php }?>
                    </ul>
                    <div style="clear:both "><a href="javascript:;" class="btn btn-default" style="margin-top:20px;margin-right: 90px;float: right;">添加</a></div>
                    </div>
                </div>                
            </div>
            
            <!-- end users table -->
        </div>
    </div>
    <!-- end main container -->


	<!-- scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo FOOD_PATH;?>js/bootstrap.min.js"></script>
    <script src="<?php echo FOOD_PATH;?>js/theme.js"></script>
</body>
</html>

<script type="text/javascript">
    $(function(){
       $('[id=del]').click(function(){
           var id = $(this).data('id');
         
           $.get('./index.php?m=plugin&p=shop&cn=index&id=food:sit:do_empolyee_role_del',{del_id:id},function(re){
            console.log(re);
               if (re.error == 0) {
                    alert(re.msg);
                    window.location.reload();
               }else{
                    alert(re.msg);
               }
           },'json');
       });
    });
</script>
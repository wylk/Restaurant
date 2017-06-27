<style type="text/css">
	.content{
      width:90%;
      margin:0px auto ;
	}
	.contents{
      width:100%;
      margin:80px auto 0px;
	}	
  .role_list{
      border:1px solid #f1f1f1;
      width:100%;  
      height:400px;
      margin:0px;
  }
</style>

<?php include(PLUGIN_PATH . PLUGIN_ID . '/template/supermaster/publictop.php');?>
<div style="min-height: 600px;clear: both;margin-top: 40px;" >
<div class="contents">
  <div class="content">
  <!-- 标题 -->
    <table class="table">
  <caption><h4>权限列表 |  <a href="./index.php?m=admin&c=app&a=module&mod=food&type=doaddrole">添加权限模板</a></h4></caption>
   <thead>
      <tr>
         <th>序号</th>
         <th>权限模板</th>
         <th>pid</th>
         <th>控制器</th>
         <th>方法</th>
         <th>url</th>
         <th>操作</th>
      </tr>
   </thead>
   <tbody>
   <?php foreach ($authInfos as $key => $v) {?>
      <tr>
         <td><?php echo $v['id']?></td>
         <td><?php echo $v['name'].$v['auth_name']?></td>
         <td><?php echo $v['auth_pid']?></td>
         <td><?php echo $v['auth_a'];?></td>
         <td><?php echo $v['auth_c'];?></td>
         <td><?php echo substr($v['auth_url'],0,6)?></td>
         <td>
        <a href="javascript:;" id="delect" data-id="<?php echo $v['id']?>" > 删除</a>
         |
         <a href="/index.php?m=admin&c=app&a=module&mod=food&type=do_up_role&roleid=<?php echo $v['id'];?>">编辑</a>
         </td>
        
      </tr>
      <?php }?>
   </tbody>
</table>
  <!-- 列表end -->

  </div>
</div>
</div>
</body>
</html>
<script type="text/javascript">
	
	$(function(){
    $('[id=delect]').click(function(){
    
         var id = parseInt($(this).data('id'));
         if (confirm('你确定删除吗..')) {
        $.get('/index.php?m=admin&c=app&a=module&mod=food&type=do_del_role',{id:id},function(re){
          if (re.error == 0) {
            alert(re.msg);
            window.location.reload();
          }else{
            alert(re.msg);
          }

        },'json');
       }else{
         return false;
       }
      });
	}); 
</script>

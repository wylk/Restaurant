<?php include PLUGIN_PATH.PLUGIN_ID.'/template/shop/public/header.php';?>
    <!-- main container -->
    <div class="content">

        <!-- settings changer -->
        <div id="pad-wrapper" class="users-list">
            <div class="row header">
                <h3>分类列表</h3>
                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">
                <form method="post">
                    <input type="text" class="col-md-5 search" name="cat_name" placeholder="输入分类名称" value="<?php echo $data3['cat_name']?>">
                    <input type="submit" value="搜索" style="
                        position: relative;
                        top: 10px;
                        left: 0px;">
                </form>
                    <a href="index.php?m=plugin&p=shop&cn=index&id=food:sit:cat_add" class="btn-flat success pull-right">
                        <span>&#43;</span>
                       添加分类
                    </a>
                </div>
            </div>

            <!-- Users table -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover" style="text-align: center">
                        <thead >
                            <tr>
                                <th class="col-md-1 sortable">
                                    编号
                                </th>
                                <th class="col-md-2 sortable">
                                    <span class="line"></span>分类名称
                                </th>
                                <th class="col-md-2 sortable">
                                    <span class="line"></span>所属分类
                                </th>
                                <th class="col-md-2 sortable ">
                                    <span class="line"></span>分类描述
                                </th>
                                <th class="col-md-2 sortable ">
                                    <span class="line"></span>创建时间
                                </th>
                                <th class="col-md-1 sortable ">
                                    <span class="line"></span>状态
                                </th>
                                <th class="col-md-2 sortable ">
                                    <span class="line"></span>操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                       <!--  <?php var_dump($data4);?> -->
                     <?php

                     if(!empty($data4))
                     {

                        foreach ($data4 as $key => $v):


                      ?>
                        <!-- row -->
                        <tr>
                            <td>
                                <?php echo $v['id']?>
                            </td>
                            <td>
                                <?php echo $v['name'].$v['cat_name']?>
                            </td>
                            <td>
                            <?php
                            foreach($data1 as $v1)
                            {
                                if($v['pid']==$v1['id'])
                                {
                                    echo $v1['cat_name'];

                                }elseif($v['pid']==0)
                                {

                                    echo '顶级分类';
                                    break;
                                }
                            }

                            ?>

                            </td>
                            <td>
                               <?php echo $v['cat_desc']?>
                            </td>
                            <td >
                               <?php echo date('Y-m-d H:i:s',$v['addtime'])?>
                            </td>
                            <td>
                              <?php if($v['status'] == 0){ echo '关闭';}else{ echo '开启';} ?>
                            </td>
                            <td>
                              <a href="javascript:;" id="del"  data-id="<?php echo $v['id']?>">删除</a>
                              |
                              <a href="/index.php?m=plugin&p=shop&cn=index&id=food:sit:do_cat_edit&cid=<?php echo $v['id']?>" onclick="if(confirm('是否确定编辑？')==false)return false;">编辑</a>
                            </td>
                        </tr>
                        <!-- row -->
                       <?php endforeach;}else{?>
                        暂无数据
                        <?php };?>
                        </tbody>
                    </table>
                </div>
            </div>
           <?php echo $pagebar;?>
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
        if(confirm('是否确定删除?')==false)
        {
            return false;
        }
           var id = $(this).data('id');
           $.get('./index.php?m=plugin&p=shop&cn=index&id=food:sit:do_cat_del',{del_id:id},function(re){
            console.log(re);
               if (re.error == 0) {
                    alert(re.msg);
                    // window.location.reload();
               }else{
                    alert(re.msg);
               }
           },'json');
       });
    });
</script>
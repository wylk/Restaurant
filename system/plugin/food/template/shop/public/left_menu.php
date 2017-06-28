 <div id="sidebar-nav">
        <ul id="dashboard-menu">
        <li>                
                <a href="/index.php?m=plugin&p=shop&cn=index&id=food:sit:doindex">
                    <i class="icon-home"></i>
                    <span>首页</span>
                </a>
        </li>
        <?php foreach ($authInfoA as $key => $value) {?>
        
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-picture"></i>
                    <span><?php echo $value['auth_name'];?></span>
                    <i class="icon-chevron-down"></i>
                </a>
                
                <!-- <ul class="submenu"> -->
                <ul  <?php if(strpos($c,$value['auth_c']) == true){ echo 'class="active submenu"';}else{echo 'class="submenu"';}?>>

                <?php foreach ($authInfoB as $key => $v) {?>
                   <?php if ($value['id'] == $v['auth_pid']): ?>
                       <li><a href="/index.php?m=plugin&p=shop&cn=<?php echo $v['auth_a'];?>&id=food:sit:<?php echo $v['auth_c'];?>"  <?php if($v['auth_c'] == $c) echo 'class="active"'?>><?php echo $v['auth_name'];?></a></li>
                   <?php endif ?>
                    
                <?php }?> 
                </ul>
               
            </li>

            <?php }?>
        </ul>
    </div>

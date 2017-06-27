 <div id="sidebar-nav">
        <ul id="dashboard-menu">
        <?php foreach ($authInfoA as $key => $value) {?>
        
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-picture"></i>
                    <span><?php echo $value['auth_name'];?></span>
                    <i class="icon-chevron-down"></i>
                </a>
                
                <ul class="submenu">

                <?php foreach ($authInfoB as $key => $v) {?>
                   <?php if ($value['id'] == $v['auth_pid']): ?>
                       <li><a href="/index.php?m=plugin&p=shop&cn=<?php echo $v['auth_a'];?>&id=food:sit:<?php echo $v['auth_c'];?>"><?php echo $v['auth_name'];?></a></li>
                   <?php endif ?>
                    
                <?php }?> 
                </ul>
               
            </li>

            <?php }?>
        </ul>
    </div>

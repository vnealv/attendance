<div id="left">
    

    <!-- #menu -->
    <ul id="menu" class="bg-blue dker">
        <li class="nav-header">Menu</li>
        <li class="nav-divider"></li>
        <li class="<?php echo ($this->uri->segment(2) == "dashboard" ? 'active' : '') ?>">
            <a href="<?php echo base_url("home/dashboard") ?>">
                <i class="fa fa-dashboard"></i><span class="link-title">&nbsp;Dashboard</span> 
            </a> 
        </li>

        <li class="<?php echo ($this->uri->segment(2) == "view" ? 'active' : '') ?>">
            <a href="<?php echo base_url("home/view") ?>">
                <i class="fa fa-table"></i><span class="link-title">&nbsp;View</span> 
            </a> 
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="fa fa-building"></i>
                <span class="link-title">Admin Panel</span> 
                <span class="fa arrow"></span> 
            </a> 
            <ul>
                <li> <a href="<?php echo base_url("home/panel") ?>"><i class="fa fa-angle-right"></i> View Employees</a>  </li>
                <li> <a href="<?php echo base_url("home/form") ?>"><i class="fa fa-angle-right"></i> Add Employee</a>  </li>
                
            </ul>
        </li>
        
    </ul><!-- /#menu -->

    <div class="media user-media bg-dark dker">
        <div class="user-media-toggleHover">
            <span class="fa fa-user"></span> 
        </div>
        <div class="user-wrapper bg-dark">
            <div class="media-body">
                <!-- User Info -->
                <h5 class="media-heading"><?php echo $user; ?></h5>
                <ul class="list-unstyled user-info">
                    
                    <li>Today's date :
                        <br>
                        <small>
                            <i class="fa fa-calendar"></i>&nbsp;<?php echo date("D, d F Y"); ?></small> 
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div><!-- /#left -->
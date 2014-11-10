<div class="header navbar navbar-inverse "> 
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="header-seperation"> 
            <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">	
                <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu" class=""> <div class="iconset top-menu-toggle-white"></div> </a> </li>		 
            </ul>
            <!-- BEGIN LOGO -->	
            <a href="index.php"><img src="assets/img/modern.png" width="130" height="100" class="logo" style="margin-top: auto;" /></a>
            <!-- END LOGO --> 
            <ul class="nav pull-right notifcation-center">	
                <li class="dropdown" id="header_task_bar"> <a href="disp_result.php" class="dropdown-toggle active" data-toggle=""> <div  class="iconset  icon-thumbs-up-alt"></div> </a> </li>
                <li class="dropdown" id="portrait-chat-toggler" style="display:none"> <a href="#sidr" class="chat-menu-toggle"> <div class="iconset top-chat-white "></div> </a> </li>        
            </ul>
        </div>
        <!-- END RESPONSIVE MENU TOGGLER --> 
        <div class="header-quick-nav"> 
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="pull-left"> 
                <ul class="nav quick-section">
                    <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle"><div class="iconset top-menu-toggle-dark"></div> </a> </li>        
                    <li class="quicklinks"> <span class="h-seperate"></span></li>
                    <li class="quicklinks"> <a href="#" class=""><div class="iconset top-reload"></div> </a> </li> 
                </ul>
                <ul class="nav quick-section">
                    <li>
                        <p class="text-info" style="font-size: 18px;" >Department of <?php echo $s_dept ?></p>
                    </li>
                    <li class="quicklinks"> <span class="h-seperate"></span></li>
                    <li>
                        <p class="text-info" style="font-size: 18px;" ><span style="color: #005555;"><?php echo $Ex_id; ?></span></p>
                    </li>
                    <li class="quicklinks"> <span class="h-seperate"></span></li>
                    <li>
                        <p class="text-info" style=" font-size: 18px;" ><span style="color: #FF0000;"><?php echo $msys; ?></span></p>
                    </li>
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
            <!-- BEGIN CHAT TOGGLER -->
            <div class="pull-right"> 
                
                <ul class="nav quick-section ">
                    <li>
                        <p class="text-info" style="font-size: 20px;" ><span style="color: #15504c;"><?php echo $RollNo; ?></span></p>
                    </li>
                    <li class="quicklinks"> <span class="h-seperate"></span></li>
                    <li class="quicklinks"> 
                        <a data-toggle="dropdown" class="dropdown-toggle  pull-right" href="#">						
                            <div class="iconset top-settings-dark "></div> 	
                        </a>
                    </li> 
                </ul>
            </div>
            <!-- END CHAT TOGGLER -->
        </div> 
        <!-- END TOP NAVIGATION MENU --> 

    </div>
    <!-- END TOP NAVIGATION BAR --> 
</div>

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
                <li class="dropdown" id="header_task_bar"> <a href="index.php" class="dropdown-toggle active" data-toggle=""> <div class="iconset top-home"></div> </a> </li>
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
                    <li class="quicklinks"> <a href="" class=""><i style="color: #2aa198;" class=" icon-download" onclick="window.open('http://localhost:81/OnlineApti/WebServices/Que_Exp.php')"></i> </a> </li> 
                </ul>
                <ul class="nav quick-section">
                    <h4><p class="text-info" >Department of <?php echo $dept ?></p></h4>
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
            <!-- BEGIN CHAT TOGGLER -->
            <div class="pull-right"> 
                <div class="chat-toggler">	
                    <div class="user-details"> 
                        <div class="username">
                            <h4 style="color: #06512F;"><span class="semi-bold"><?php echo $Admin_Name; ?></span></h4>									
                        </div>						
                    </div> 
                </div>
                <ul class="nav quick-section ">
                    <li class="quicklinks"> 
                        <a data-toggle="dropdown" class="dropdown-toggle  pull-right" href="#">						
                            <div class="iconset top-settings-dark "></div> 	
                        </a>
                        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="dropdownMenu">
                            <li><a href="index.php"> My Account</a>
                            </li>
                            <li><a href="calender.html">My Schedules</a>
                            </li>

                            <li class="divider"></li>                
                            <li><a href="logout.php"><i class="icon-off"></i>&nbsp;&nbsp;Log Out</a></li>
                        </ul>
                    </li> 
                </ul>
            </div>
            <!-- END CHAT TOGGLER -->
        </div> 
        <!-- END TOP NAVIGATION MENU --> 

    </div>
    <!-- END TOP NAVIGATION BAR --> 
</div>
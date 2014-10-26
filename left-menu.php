<div class="page-sidebar" id="main-menu"> 
    <!-- BEGIN MINI-PROFILE -->
    <div class="user-info-wrapper">	
        <div class="profile">
            <img src="./assets/img/clg-logo.jpg"  width="100" height="120" />
        </div>
        <div class="user-info">
            <div class="greeting">Welcome</div>
            <div class="username"><?php echo $Admin_Name; ?></div>
            <div class="status">Status<a href="#"><div class="status-icon green"></div>Online</a></div>
        </div>
    </div>
    <!-- END MINI-PROFILE -->

    <!-- BEGIN MINI-WIGETS -->

    <!-- END MINI-WIGETS -->

    <!-- BEGIN SIDEBAR MENU -->	
    <p class="menu-title">BROWSE <span class="pull-right"><a href="javascript:;"><i class="icon-refresh"></i></a></span></p>
    <ul>	
        <li class="start  <?php
        if ($Menu_Select == 0) {
            echo "active";
        }
        ?>"> <a href="index.php"> <i class="icon-custom-home"></i> <span class="title">Home</span> <span class="selected"></span></a> </li>
        <li <?php
        if ($Menu_Select == 1 || $Menu_Select == 2) {
            echo ' class = "active"';
        }
        ?> > <a href="javascript:;"> <i class="icon-cogs"></i> <span class="title">Set Questions</span> <span class="arrow "></span> </a>
            <ul class="sub-menu">
                <li <?php
                if ($Menu_Select == 1) {
                    echo 'class = "active"';
                }
                ?>> <a href="view-election.php">Questions&nbsp;&nbsp;01 - 10</a> </li>
                <li <?php
                if ($Menu_Select == 2) {
                    echo 'class = "active"';
                }
                ?>> <a href="add-election.php"> Questions&nbsp;&nbsp;11 - 20 </a> </li>
                <li <?php
                if ($Menu_Select == 3) {
                    echo 'class = "active"';
                }
                ?>> <a href="add-election.php"> Questions&nbsp;&nbsp;21 - 30 </a> </li>

            </ul>
        </li>
        <li <?php
        if ($Menu_Select == 3 || $Menu_Select == 5 || $Menu_Select == 6) {
            echo 'class="active"';
        }
        ?>> 
            <a href="javascript:;"> 
                <i class="icon-user">

                </i> 
                <span class="title">
                    Admin Information
                </span> 
                <span class="arrow ">

                </span> 
            </a>
            <ul class="sub-menu">
                <li <?php
                if ($Menu_Select == 3) {
                    echo 'class="active"';
                }
                ?>> <a href="add_campaign.php">  Add Campaign </a> </li>
                <li <?php
                if ($Menu_Select == 5) {
                    echo 'class="active"';
                }
                ?>> <a href="view-campaign.php">  See My Campaign </a> </li>
                <li <?php
                if ($Menu_Select == 6) {
                    echo 'class="active"';
                }
                ?>> <a href="Campaign_problems.php"> Add Problems For Campaign </a> </li>

            </ul>
        </li>
        <li <?php
        if ($Menu_Select == 8 || $Menu_Select == 9) {
            echo 'class = "active"';
        }
        ?>> <a href="javascript:;"> <i class="icon-mobile-phone"></i> <span class="title">My Devices</span> <span class="arrow "></span> </a>
            <ul class="sub-menu">
                <li <?php
                if ($Menu_Select == 8) {
                    echo 'class = "active"';
                }
                ?>> <a href="add-device.php"> Add Devices </a> </li>
                <li <?php
                if ($Menu_Select == 9) {
                    echo 'class = "active"';
                }
                ?>> <a href="devices-list.php">Devices List</a> </li>
            </ul>
        </li>
<!--        <li  <?php
//        if ($Menu_Select == 15) {
//            echo 'class = "active"';
//        }
        ?>> <a href="javascript:;"> <i class="icon-map-marker"></i> <span class="title">My Area</span> <span class="arrow "></span> </a>
            <ul class="sub-menu">
                <li> <a href="form_elements.html"> Add Area </a> </li>
                <li <?php
//                if ($Menu_Select == 15) {
//                    echo 'class = "active"';
//                }
                ?>> <a href="review-area.php">Review  Area</a> </li>
                <li> <a href="form_validations.html">Get Data For Area track</a> </li>
                <li> <a href="form_validations.html">Track Devices</a> </li>
            </ul>
        </li>-->

    </ul>
    <div class="side-bar-widgets">
        <p class="menu-title">FOLDER <span class="pull-right"><a href="#" class="create-folder"><i class="icon-plus"></i></a></span></p>
        <ul class="folders" id="folders">
            <li><a href="#"><div class="status-icon green"></div> Latest Campaign </a> </li>
            <li><a href="#"><div class="status-icon red"></div> Top Problem In My Area </a> </li>
            <li><a href="#"><div class="status-icon blue"></div> Track My Devices </a> </li>
            <li id="folder-input" class="folder-input" style="display:none"><input type="text" placeholder="Name of folder" class="no-boarder folder-name" name="" id="folder-name" /></li>
        </ul>
        <p class="menu-title">PROJECTS </p>
        <div class="status-widget">
            <div class="status-widget-wrapper">
                <div class="title">Freelancer<a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
                <p>Redesign home page</p>
            </div>
        </div>
        <div class="status-widget">
            <div class="status-widget-wrapper">
                <div class="title">envato<a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
                <p>Statistical report</p>
            </div>
        </div>
    </div>

    <a href="#" class="scrollup">Scroll</a>
    <div class="clearfix"></div>
    <!-- END SIDEBAR MENU --> 
</div>
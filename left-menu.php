<div class="page-sidebar" id="main-menu"> 
    <!-- BEGIN MINI-PROFILE -->
    <div class="user-info-wrapper">	
        <div class="profile">
            <img src="./assets/img/clg-logo.jpg"  class="logo" width="100" height="120" />
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
        <li class="start  <?php
        if ($Menu_Select == 1) {
            echo "active";
        }
        ?>"> <a href="Admin_op.php"> <i class="icon-user"></i> <span class="title">Admin Operations</span> <span class="selected"></span></a> </li>
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
                ?>> <a href="set_paper_1.php">Questions&nbsp;&nbsp;01 - 10</a> </li>
                <li <?php
                if ($Menu_Select == 2) {
                    echo 'class = "active"';
                }
                ?>> <a href="set_paper_2.php"> Questions&nbsp;&nbsp;11 - 20 </a> </li>
                <li <?php
                if ($Menu_Select == 3) {
                    echo 'class = "active"';
                }
                ?>> <a href="set_paper_3.php"> Questions&nbsp;&nbsp;21 - 30 </a> </li>

            </ul>
        </li>
        <li <?php
        if ($Menu_Select == 3 || $Menu_Select == 5 || $Menu_Select == 6) {
            echo 'class="active"';
        }
        ?>> 
            <a href="javascript:;"> 
                <i class="icon-pencil"></i><span class="title">Student Information</span><span class="arrow "></span> 
            </a>
            <ul class="sub-menu">
                <li <?php
                if ($Menu_Select == 3) {
                    echo 'class="active"';
                }
                ?>> <a href="Student_op.php">Add / Remove</a> </li>
                <li <?php
                if ($Menu_Select == 5) {
                    echo 'class="active"';
                }
                ?>> <a href="stud_marks.php">Student Marks</a> </li>
                

            </ul>
        </li>
        <li class="start  <?php
        if ($Menu_Select == 0) {
            echo "active";
        }
        ?>"> <a href="feedback.php"> <i class=" icon-thumbs-up-alt"></i> <span class="title">Feedback&nbsp;&nbsp;</span><i class="icon-thumbs-down-alt"></i></a> </li>
    </ul>
    <div class="side-bar-widgets">
        
    </div>

    <a href="#" class="scrollup">Scroll</a>
    <div class="clearfix"></div>
    <!-- END SIDEBAR MENU --> 
</div>
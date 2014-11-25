<div class="header navbar navbar-inverse "> 
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="header-seperation"> 
            <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">	
                <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu" class=""> <div class="iconset top-menu-toggle-white"></div> </a> </li>		 
            </ul>
            <!-- BEGIN LOGO -->	
            <!-- END LOGO --> 
            <ul class="nav pull-right notifcation-center">	
                <li class="dropdown" id="header_task_bar"> <a href="index.php" class="dropdown-toggle active" data-toggle="tooltip" title="Home" data-placement="bottom"> <div class="icon-custom-home"></div> </a> </li>
                <li class="dropdown" id="header_task_bar"><a href="WebServices/Que_Exp.php" class="dropdown-toggle active tip" data-toggle="tooltip" title="Download pdf" data-placement="bottom"><div class="icon-custom-downloads"></div></a></li>
                <li class="dropdown" id="header_task_bar"> <a href="logout.php" class="dropdown-toggle active" data-toggle="tooltip" title="logout" data-placement="bottom"> <div class="icon-off"></div> </a> </li>
                       
            </ul>
        </div>
        <!-- END RESPONSIVE MENU TOGGLER --> 
        <div class="header-quick-nav"> 
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="pull-left"> 
                <ul class="nav quick-section">
                    <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle"><div class="iconset top-menu-toggle-dark"></div> </a> </li>        
                    <li class="quicklinks"> <span class="h-seperate"></span></li>
                    <li><p class="text-info" style="font-size: 18px;" >Department of <?php echo $dept ?></p></li>
                </ul>

            </div>
            <!-- END TOP NAVIGATION MENU -->
            <!-- BEGIN CHAT TOGGLER -->
            <div class="pull-right"> 

                <ul class="nav quick-section ">
                    <li><p class="text-info" style="font-size: 18px;" ><span style="color: #15504c;"><?php echo $Admin_Name; ?></span></p></li>
                    <li class="quicklinks"> <span class="h-seperate"></span></li>
                    <li class="quicklinks"> 
                        <a data-toggle="dropdown" class="dropdown-toggle  pull-right" href="#">						
                            <div class="iconset top-settings-dark "></div> 	
                        </a>
                        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="dropdownMenu">

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
    <script type="text/javascript">
        function get_Doc() {

            
            //console.log('click');
            get_Document()
            //e.preventDefault();
            //return false;
            // Check Info to Update ..

            function  get_Document() {

                //jQuery(".Answer_" + x + " .loader img").fadeIn(100);
                //jQuery('.Answer_' + x + ' .result').removeAttr('style');
                jQuery.post('/WebServices/Que_Exp.php',
                        {
                        },
                function(rez) {

                    if (rez.success == 1) {
                        //jQuery('.Answer_' + x + ' .result').addClass('sc_infobox_style_success').html('Answer is saved !');
                        //jQuery(".Question_" + x + " .loader img").fadeOut(200);
                        //setTimeout('window.location.reload();', 500);

                    } else {

                        //jQuery('.Answer_' + x + ' .result').addClass('sc_infobox_style_error').html('Updation Failed !');
                    }
                   // jQuery('.Answer_' + x + ' .result').fadeIn(500);
                    //setTimeout("jQuery('.Answer_'" + x + "' .result').fadeOut()", 500);

                    //            console.log("session destroys");
                    //            location.reload();
                    //            
                    //            

                }, 'json');



        }
    }
    </script>
</div>
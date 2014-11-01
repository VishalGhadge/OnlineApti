<?php
require './util.php';

//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['sess_Admin_Id']) || (trim($_SESSION['sess_Name']) == '')) {
    
} else {
    ?>

    <script type="text/javascript">
        location = "http://localhost:81/OnlineApti/signIn.php";
    </script>
    <?php
}
?>
<!DOCTYPE html> 
<html>
    <head>
        <title><?php echo $Website_Title; ?></title>
        <link rel="shortcut icon" href="favicon.ico" type="<?php echo $Website_Favicon; ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="<?php echo $Website_Meta_Description; ?>" name="description" />
        <meta content="<?php echo $Website_Meta_Keyword; ?>" name="keyword" />
        <meta content="<?php echo $Website_Meta_Author; ?>" name="author" />
        
        <link href="assets/plugins/boostrap-slider/css/slider.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/css/demo.css" />
        <link rel="stylesheet" href="assets/css/sky-forms.css" />
        <link rel="stylesheet" href="assets/css/sky-forms-black.css" />
        <link rel="stylesheet" href="assets/css/form_validate.css" />


        <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="assets/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/ios-switch/ios7-switch.css" rel="stylesheet" type="text/css" media="screen" charset="utf-8" />
        <link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen" />
        <!-- END PLUGIN CSS -->

        <!-- BEGIN CORE CSS FRAMEWORK -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" />
        <!-- END CORE CSS FRAMEWORK -->

        <!-- BEGIN CSS TEMPLATE -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />
        <!-- END CSS TEMPLATE -->

        


        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

    <body class="bg" style="background-color: #FFFFFF">
        <div class="span12" style="margin-left: 12%;">
            <div class="row-fluid">
                <div class="span6" style="margin-top: 15%;">
                    <div class="student_login">
                        <form action="" id="sky-form" class="sky-form" >
                            <header style="text-align: center;">
                                <h4 style ="color: #0099cc" class="semi-bold" >Student</h4>
                                <h5  class="" >Online Aptitude Test</h5>
                            </header>

                            <fieldset>					
                                <section>
                                    <div class="row">
                                        <label class="label col col-4">Username</label>
                                        <div class="col col-8">
                                            <label class="input">
                                                <i class="icon-append icon-user"></i>
                                                <input type="text" name="RollNo" id="RollNo"/>
                                            </label>
                                        </div>
                                    </div>
                                </section>

                                <section>
                                    <div class="row">
                                        <label class="label col col-4">Password</label>
                                        <div class="col col-8">
                                            <label class="input">
                                                <i class="icon-append icon-lock"></i>
                                                <input type="password" name="Expass" id="Expass" />
                                            </label>
                                            <div class="note"><a href="#">Forgot password?</a></div>
                                        </div>
                                    </div>
                                </section>

                            </fieldset>
                            <div class="result sc_infobox " style="display: none;"></div>
                            <footer>
                                <div id="st_enter" class="button" >Login</div>
                                <!-- <a href="register.php" class="button button-secondary">Register</a> -->
                            </footer>
                        </form>	
                    </div>
                </div>

                <div class="span6" style="margin-top: 15%;">
                    <div class="admin_login">
                        <form action="" id="sky-form" class="sky-form" >
                            <header style="text-align: center;">
                                <h4 style ="color: #991717" class="semi-bold" >Administrator</h4>
                                <h5  class="" >Online Aptitude Test</h5>
                            </header>

                            <fieldset>					
                                <section>
                                    <div class="row">
                                        <label class="label col col-4">Username</label>
                                        <div class="col col-8">
                                            <label class="input">
                                                <i class="icon-append icon-user"></i>
                                                <input type="text" name="Username" id="Username"/>
                                            </label>
                                        </div>
                                    </div>
                                </section>

                                <section>
                                    <div class="row">
                                        <label class="label col col-4">Password</label>
                                        <div class="col col-8">
                                            <label class="input">
                                                <i class="icon-append icon-lock"></i>
                                                <input type="password" name="Password" id="Password" />
                                            </label>
                                            <div class="note"><a href="#">Forgot password?</a></div>
                                        </div>
                                    </div>
                                </section>

                            </fieldset>
                            <div class="result sc_infobox " style="display: none;"></div>
                            <footer>
                                <div class="loader"><img src="assets/img/loader.GIF" style="display: none;"></div>

                                <div id="enter" class="button" >Login</div>
                                <!-- <a href="register.php" class="button button-secondary">Register</a> -->
                            </footer>
                        </form>	
                    </div>
                </div>


            </div>
        </div>
        
         <!-- BEGIN PAGE LEVEL JS --> 
    <script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>

    <!-- END CORE JS FRAMEWORK -->
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-inputmask/jquery.inputmask.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-autonumeric/autoNumeric.js" type="text/javascript"></script>
    <script src="assets/plugins/ios-switch/ios7-switch.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <script src="assets/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="assets/js/form_elements.js" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/js/core.js" type="text/javascript"></script>
    <script src="assets/js/demo.js" type="text/javascript"></script>

    <script src="assets/js/lib.js" type="text/javascript"></script>
    </body>
</html>
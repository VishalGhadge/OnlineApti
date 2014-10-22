<?php
require './util.php';

//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['sess_Admin_Id']) && (trim($_SESSION['sess_Name']) == '')) {
    ?>

    <script type="text/javascript">
        location = "http://localhost:81/OnlineApti/sign-in.php";
    </script>
    <?php
} else {

    $Admin_Name = $_SESSION['sess_Name'];
    $Admin_Id = $_SESSION['sess_Admin_Id'];
    $dept = $_SESSION['Dept'];

    //include './get-home-page-overview-data.php';
}
?>



<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <title><?php echo $Website_Title; ?></title>
    <link rel="shortcut icon" href="favicon.ico" type="<?php echo $Website_Favicon; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="<?php echo $Website_Meta_Description; ?>" name="description" />
    <meta content="<?php echo $Website_Meta_Keyword; ?>" name="keyword" />
    <meta content="<?php echo $Website_Meta_Author; ?>" name="author" />

    <!-- BEGIN PLUGIN CSS -->
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

    <link href="assets/plugins/boostrap-slider/css/slider.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/css/sky-forms.css" />
    <link rel="stylesheet" href="assets/css/sky-forms-black.css" />
    <link rel="stylesheet" href="assets/css/form_validate.css" />
    <!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="">
    <!-- BEGIN HEADER -->
    <?php require './header.php'; ?> 
    <!-- END HEADER --> 
    <!-- BEGIN CONTAINER -->
    <div class="page-container row-fluid"> 
        <!-- BEGIN SIDEBAR -->
        <div class="footer-widget">		
            <div class="progress transparent progress-success progress-small no-radius no-margin">
                <div data-percentage="79%" class="bar animate-progress-bar"></div>		
            </div>
            <div class="pull-right">
                <div class="details-status">
                    <span data-animation-duration="560" data-value="86" class="animate-number"></span>%
                </div>	
                <a href="sign-in.php"><i class="icon-off"></i></a></div>
        </div>
        <!-- END SIDEBAR --> 
        <!-- BEGIN PAGE CONTAINER-->
        <div class="page-content"> 
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div id="portlet-config" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button"></button>
                    <h3>Widget Settings</h3>
                </div>
                <div class="modal-body"> Widget settings form goes here </div>
            </div>
            <div class="clearfix"></div>
            <div class="content">  
                <div class="page-title">	
                    <h3>Admin </h3>		
                </div>
                <div id="container">

                    <div class="row-fluid">
                        <div class="span6">
                            <div class="grid simple">
                                <div class="grid-title no-border">
                                    <h4 style="color: #0090D9;">Add <span class="semi-bold" style="color: #0aa699">&nbsp;New Admin</span></h4>
                                    <div class="tools"> <a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a> <a class="remove" href="javascript:;"></a> </div>
                                </div>

                                <div class="grid-body no-border">
                                    <div class="add_admins">
                                        <form action="" id="admin-form">
                                            <div>
                                                <div class="row-fluid">
                                                    <div class="span4">
                                                        <h5><span class="semi-bold">Admin Name :</span></h5>
                                                    </div>
                                                    <div class="span7">
                                                        <input type="text" style="width:93%" name="a_name" id="a_name" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="row-fluid">
                                                    <div class="span4">
                                                        <h5><span class="semi-bold">Temporary Pass :</span></h5>
                                                    </div>
                                                    <div class="span7">
                                                        <input type="password" style="width:93%" name="password" id="password" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="margin-top: 5px;">
                                                <div class="row-fluid">
                                                    <div class="span4">
                                                        <h5><span class="semi-bold">Select Department :</span></h5>
                                                    </div>
                                                    <div class="span7">
                                                        <select id="source" style="width:100%" tabindex="-1" class="select2-offscreen" name="field">
                                                            <optgroup label="Science Field">
                                                                <option id="sel_1" value="1">Computer_Sci</option>
                                                            </optgroup>
                                                            <optgroup label="Math Field">
                                                                <option id="sel_2" value="2" >Mathematics</option>
                                                            </optgroup>
                                                        </select>
                                                        <script type="text/javascript">
                                                            document.getElementById('sel_2').valueOf('selected');
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="result sc_infobox " style="display: none;"></div>
                                            <footer>
                                                <div class="row-fluid">
                                                    <div class="span4">
                                                        <div class="loader"><img src="assets/img/loader.GIF" style="display: none;"></div>
                                                    </div>
                                                    <div class="span7">
                                                        <button type="button" id="add_admin" class="btn btn-success btn-cons" style="margin-right: ">Add</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="span6">
                            <div class="grid simple">
                                <div class="grid-title no-border">
                                    <h4 style="color: #852b99;">Change <span class="semi-bold" style="color: #0aa699">&nbsp;Your Password</span></h4>
                                    <div class="tools"> <a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a> <a class="remove" href="javascript:;"></a> </div>
                                </div>

                                <div class="grid-body no-border">
                                    <div class="chng_pass">
                                        <form action="" id="admin-form">
                                            <div>
                                                <div class="row-fluid">
                                                    <div class="span4">
                                                        <h5><span class="semi-bold">Old Password :</span></h5>
                                                    </div>
                                                    <div class="span7">
                                                        <input type="password" style="width:93%" name="o_pass" id="o_pass" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="row-fluid">
                                                    <div class="span4">
                                                        <h5><span class="semi-bold">New Password :</span></h5>
                                                    </div>
                                                    <div class="span7">
                                                        <input type="password" style="width:93%" name="n_pass" id="n_pass" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="row-fluid">
                                                    <div class="span4">
                                                        <h5><span class="semi-bold">Enter Again :</span></h5>
                                                    </div>
                                                    <div class="span7">
                                                        <input type="password" style="width:93%" name="c_pass" id="c_pass" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="result sc_infobox " style="display: none;"></div>
                                            <footer>
                                                <div class="row-fluid">
                                                    <div class="span4">
                                                        <div class="loader"><img src="assets/img/loader.GIF" style="display: none;"></div>
                                                    </div>
                                                    <div class="span7">
                                                        <button type="button" id="ch_pass" class="btn btn-success btn-cons" style="margin-right: ">Change</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>		
                </div>
            </div> 
        </div>  
        <!-- END PAGE --> 
    </div>
    <!-- BEGIN CHAT --> 

    <!-- END CHAT --> 
    <!-- END CONTAINER --> 

    <!-- BEGIN CORE JS FRAMEWORK--> 

    <!-- END CORE JS FRAMEWORK --> 
    <!--[if lt IE 9]>
            <script src="assets/plugins/excanvas.js"></script>
            <script src="assets/plugins/respond.js"></script>	
            <![endif]--> 

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
    <!-- END CORE TEMPLATE JS -->
</div></body>

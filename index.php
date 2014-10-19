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
    <link href="assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="assets/plugins/jquery-morris-chart/css/morris.css" type="text/css" media="screen" charset="utf-8" />
    <link href="assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen" />
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
                        <div class="span7">
                            <div class="grid simple">
                                <div class="grid-title no-border">
                                    <h4>Add <span class="semi-bold">New Admin</span></h4>
                                    <div class="tools"> <a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a> <a class="remove" href="javascript:;"></a> </div>
                                </div>
                                <div class="grid-body no-border">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <br>
                                            <div class="row-fluid">
                                                <div class="span5">
                                                    <h5>Select Department :</h5>
                                                </div>
                                                <div class="span7">
                                                <select id="source" style="width:100%" tabindex="-1" class="select2-offscreen">
                                                    <optgroup label="Science Field">
                                                        <option value="1">Computer_Sci
                                                        </option>
                                                    </optgroup>
                                                    <optgroup label="Math Field">
                                                        <option value="2">Mathematics
                                                        </option></optgroup>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
<!-- END CORE JS FRAMEWORK --> 
<!--[if lt IE 9]>
        <script src="assets/plugins/excanvas.js"></script>
        <script src="assets/plugins/respond.js"></script>	
        <![endif]--> 

<!-- BEGIN PAGE LEVEL JS --> 
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>  
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="assets/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script> 
<script src="assets/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
<script src="assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
<script src="assets/plugins/jquery-morris-chart/js/morris.min.js"></script>
<script src="assets/plugins/jquery-easy-pie-chart/js/jquery.easypiechart.min.js"></script>
<script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script> 	
<script src="assets/plugins/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script> 	
<script src="assets/plugins/jquery-jvectormap/js/jquery-jvectormap-us-lcc-en.js" type="text/javascript"></script> 	
<script src="assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>
<script src="assets/plugins/jquery-flot/jquery.flot.min.js"></script>
<script src="assets/plugins/jquery-flot/jquery.flot.animator.min.js"></script>
<script src="assets/plugins/skycons/skycons.js"></script>

<!-- END PAGE LEVEL PLUGINS --> 	
<!-- PAGE JS -->
<script src="assets/plugins/jquery-autonumeric/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/ios-switch/ios7-switch.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-inputmask/jquery.inputmask.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-autonumeric/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<script src="assets/js/form_elements.js" type="text/javascript"></script>
<script src="assets/js/dashboard.js" type="text/javascript"></script> 
<!-- BEGIN CORE TEMPLATE JS --> 
<script src="assets/js/core.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS -->
</div></body>

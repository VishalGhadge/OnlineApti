<?php
require './util.php';

//Start session
session_start();
error_reporting(E_ERROR | E_PARSE);
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['sess_Admin_Id']) && (trim($_SESSION['sess_Name']) == '')) {
    ?>

    <script type="text/javascript">
        location = "http://localhost:81/OnlineApti/signIn.php";
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

    <link href="assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
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
                <a href="logout.php"><i class="icon-off"></i></a></div>
        </div>
        <!-- END SIDEBAR --> 
        <?php require './left-menu.php'; ?>
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
                                                        <input type="text" style="width:93%" name="a_name" id="a_name" placeholder="Vishal Ghadge" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="row-fluid">
                                                    <div class="span4">
                                                        <h5><span class="semi-bold">Create Password :</span></h5>
                                                    </div>
                                                    <div class="span7">
                                                        <input type="password" style="width:93%" name="a_password" id="a_password" placeholder="Enter new Password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="row-fluid">
                                                    <div class="span4">
                                                        <h5><span class="semi-bold">Confirm Password :</span></h5>
                                                    </div>
                                                    <div class="span7">
                                                        <input type="password" style="width:93%" name="c_password" id="c_password" placeholder="Confirm password" />
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
                                                                <?php require './WebServices/get_Dept.php'; ?>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="result sc_infobox " style="display: none;"></div>
                                            </br>
                                            <footer>
                                                <div class="row-fluid">
                                                    <button type="button" id="add_admin" class="btn btn-success btn-cons" style="margin-left: 70%">Add</button>
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
                                    <h4 style="color: #852b99;">Add New <span class="semi-bold" style="color: #0aa699">&nbsp;Department</span></h4>
                                    <div class="tools"> <a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a> <a class="remove" href="javascript:;"></a> </div>
                                </div>

                                <div class="grid-body no-border">
                                    <div class="add_department">
                                        <form action="" id="dept-form">
                                            <div>
                                                <div class="row-fluid">
                                                    <div class="span4">
                                                        <h5><span class="semi-bold">Department Name :</span></h5>
                                                    </div>
                                                    <div class="span7">
                                                        <input type="text" style="width:93%" name="de_name" id="de_name" onkeyup="this.value = this.value.replace(/[^a-z_]/g, '');" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="result sc_infobox " style="display: none;"></div>
                                            <footer>
                                                <div class="row-fluid">
                                                    <button type="button" id="ad" name="ad" class="btn btn-success btn-cons" style="margin-left: 70%;">Add</button>
                                                </div>
                                            </footer>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="grid simple">
                                <div class="grid-title no-border">
                                    <h4 style="color: #852b99;">Add <span class="semi-bold" style="color: #0aa699">&nbsp;Students</span></h4>
                                    <div class="tools"> <a class="collapse" href="javascript:;"></a> <a class="config" data-toggle="modal" href="#grid-config"></a> <a class="reload" href="javascript:;"></a> <a class="remove" href="javascript:;"></a> </div>
                                </div>

                                <div class="grid-body no-border">
                                    <div class="add_students">
                                        <form action="" id="std_form">
                                            <div>
                                                <div class="control-group">
                                                    <div class="controls-row">
                                                        <div class="span2">
                                                            <h5><span class="semi-bold">from :</span></h5>
                                                        </div>
                                                        <input type="text" class="span2" data-v-max="999999" data-v-min="0" name="rn_from" id="rn_from" >
                                                        <div class="span1" style="margin-left: 8%">
                                                            <h5><span class="semi-bold">To :</span></h5>
                                                        </div>
                                                        <input type="text" class="span2" data-v-max="999999" data-v-min="0" name="rn_to" id="rn_to" >
                                                        <div class="span2">
                                                            <button type="button" id="std" name="std" class="btn btn-success btn-cons"  style="margin-left: 70%;">Add</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="result sc_infobox " style="display: none;"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- creating Exam ! -->
                        <div class="row-fluid">
                            <div class="row-fluid">
                                <div class="remove_adm">
                                    <div class="span12">
                                        <div class="grid simple ">
                                            <div class="grid-title">
                                                <h4 style="color: #f65314;">Exam <span class="semi-bold">Schedule</span></h4>

                                                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                                            </div>
                                            <div class="grid-body ">
                                                <table class="table table-condensed" id="example">

                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="add_exm">
                                                                    <div id="accordion2" class="accordion">
                                                                        <div class="accordion-group">
                                                                            <div class="accordion-heading"> 
                                                                                <a href="#collapseOne<?php echo $ad; ?>" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
                                                                                    <span class="semi-bold" style="color: #00a1f1;">Add New Exam</span>
                                                                                    <i class="icon-plus"></i> 
                                                                                </a> 
                                                                            </div>
                                                                            <form actio="" id="fexm_<?php echo $ad; ?>">
                                                                                <div class="accordion-body collapse" id="collapseOne<?php echo $ad; ?>" style="height: 0px;">
                                                                                    <div class="accordion-inner"> 
                                                                                        <div class="row-fluid">
                                                                                            <div class="row-fluid span6">
                                                                                                <div class="span4">
                                                                                                    <h5><span class="semi-bold">Password :</span></h5>
                                                                                                </div>
                                                                                                <div class="span7">
                                                                                                    <input type="text" style="width:93%" name="e_pass" id="e_pass" placeholder="Exam Password" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row-fluid span6">
                                                                                                <div class="span4">
                                                                                                    <h5><span class="semi-bold">Date&nbsp;(mm:dd:yy) :</span></h5>
                                                                                                </div>
                                                                                                <div class="row-fluid">
                                                                                                    <div class="input-append success date">
                                                                                                        <input type="text" class="span12" id="e_date" name="e_date" placeholder="Exam Date" >
                                                                                                        <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span> </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row-fluid" style="margin-top: 1%;">
                                                                                            <div class="row-fluid span6">
                                                                                                <div class="span4">
                                                                                                    <h5><span class="semi-bold">Time :</span></h5>
                                                                                                </div>
                                                                                                <div class="span7">
                                                                                                    <div class="controls">
                                                                                                        <div class="input-append bootstrap-timepicker-component">
                                                                                                            <input type="text" class="timepicker-default span12" id="e_time" name="e_time" >
                                                                                                            <span class="add-on"><span class="arrow"></span><i class="icon-time"></i></span> </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row-fluid span6">
                                                                                                <div class="span4">
                                                                                                    <h5><span class="semi-bold">Marking System :</span></h5>
                                                                                                </div>
                                                                                                <div class="span6">
                                                                                                    <div class="radio radio-success">
                                                                                                        <input id="positive" type="radio" name="mrk_sys" value="1" checked="checked">
                                                                                                        <label for="positive">+ve</label>
                                                                                                        <input id="negative" type="radio" name="mrk_sys" value="0">
                                                                                                        <label for="negative">-ve</label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row-fluid" style="margin-top: 1%;">
                                                                                            <div class="row-fluid span6">
                                                                                                <div class="span4">
                                                                                                    <h5><span class="semi-bold">Done :</span></h5>
                                                                                                </div>
                                                                                                <div class="span7">
                                                                                                    <button type="button" id="add_ex" class="btn btn-info btn-cons" ><i class="icon-paste"></i> Edit</button>
                                                                                                    <div class="result sc_infobox " style="display: none;"></div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php require './WebServices/get_Exam.php'; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Admin Info -->
                        <div class="row-fluid">
                            <?php require './WebServices/get_Admin.php'; ?>
                        </div>
                    </div>

                </div> 
            </div>  
            <!-- END PAGE -->
        </div>


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
        <script src="assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery-datatable/extra/js/TableTools.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
        <script type="text/javascript" src="assets/plugins/datatables-responsive/js/lodash.min.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="assets/js/datatables.js" type="text/javascript"></script>
               <!-- <script src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script> -->
        <script src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js" type="text/javascript"></script>
        <script src="assets/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="assets/js/form_elements.js" type="text/javascript"></script>
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/js/core.js" type="text/javascript"></script>
        <script src="assets/js/demo.js" type="text/javascript"></script>
        <script src="assets/js/lib.js" type="text/javascript"></script>

        <script type="text/javascript">
                                                            $('.input-append.date').datepicker({
                                                                autoclose: true,
                                                                todayHighlight: true,
                                                                format: 'yyyy-mm-dd'
                                                            });
        </script>

        <!-- END CORE TEMPLATE JS -->
    </div></body>

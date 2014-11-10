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
        <?php require './left-menu.php'; ?>
        <div class="footer-widget">		
            <div class="progress transparent progress-success progress-small no-radius no-margin">
                <div data-percentage="100%" class="bar animate-progress-bar"></div>		
            </div>
            <div class="pull-right">
                <div class="details-status">
                    <span data-animation-duration="560" data-value="100" class="animate-number"></span>%
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
                    <div class="row-fluid">
                        <div class="span4">
                            <a href="set_paper_2.php">
                                <i style="color: #2aa198;" class="icon-chevron-sign-left" ></i>
                            </a>
                        </div>
                        <div class="span4 text-center" >
                            <h3 class="semi-bold"  style="color: #004c4c" >21&nbsp;-&nbsp;30&nbsp;</h3>
                        </div>
                        <div class="span4">
                            <a>
                                <i style="margin-left: 90%;" class="icon-chevron-sign-right disabled"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="container">
                <?php include './WebServices/get_Question_3.php'; ?>
            </div>
            <div class="content">  
                <div class="page-title">
                    <div class="row-fluid">
                        <div class="span4">
                            <a href="set_paper_2.php">
                                <i style="color: #2aa198;" class="icon-chevron-sign-left" ></i>
                            </a>
                        </div>
                        <div class="span4 text-center" >
                            <h3 class="semi-bold"  style="color: #004c4c" >21&nbsp;-&nbsp;30&nbsp;</h3>
                        </div>
                        <div class="span4">
                            <a>
                                <i style="margin-left: 90%;" class="icon-chevron-sign-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>



            <!-- END CORE TEMPLATE JS -->

            <script type="text/javascript">
                function getIndex(x) {

                    var error_msg_box = null;

                    console.log('click');
                    Check_Question();
                    e.preventDefault();
                    return false;
                    // Check Info to Update ..
                    function Check_Question() {
                        var error = formValidate(jQuery(".Question_" + x + " form"), {
                            error_message_show: true,
                            error_message_time: 5000,
                            error_message_class: "sc_infobox sc_infobox_style_error",
                            error_fields_class: "error_fields_class",
                            exit_after_first_error: true,
                            rules: [
                                {
                                    field: "q" + x,
                                    min_length: {value: 1, message: "Plz Enter Question...!"},
                                    // max_length: {value: 60, message: "Plz Enter short User Name.."}
                                },
                                {
                                    field: "a_" + x,
                                    min_length: {value: 1, message: "You must Enter Any Value.."},
                                    //max_length: {value: 10, message: "choose proper date"}
                                }
                                ,
                                {
                                    field: "b_" + x,
                                    min_length: {value: 1, message: "You must Enter Any Value.."},
                                    //max_length: {value: 10, message: "choose proper date"}
                                }
                            ]
                        });

                        if (!error) {
                            //            document.forms['registration_form'].submit();

                            Update_Question();
                        }
                    }
                    function  Update_Question() {

                        //jQuery(".Question_" + x + " .loader img").fadeIn(100);
                        jQuery('.Question_' + x + ' .result').removeAttr('style');
                        jQuery.post('WebServices/Updt_Ques.php',
                                {
                                    qno: x,
                                    Que: jQuery('#q' + x).val(),
                                    op_a: jQuery('#a_' + x).val(),
                                    op_b: jQuery('#b_' + x).val(),
                                    op_c: jQuery('#c_' + x).val(),
                                    op_d: jQuery('#d_' + x).val(),
                                    ch: jQuery('#choice_' + x).val(),
                                    Exp: jQuery('#Ex' + x).val()
                                },
                        function(rez) {


                            //            var rez = JSON.parse(response);
                            /*jQuery('.Question_' + x + ' .result')
                             .toggleClass('sc_infobox_style_error', false)
                             .toggleClass('sc_infobox_style_success', false);*/

                            if (rez.success == 1) {
                                jQuery('.Question_' + x + ' .result').addClass('sc_infobox_style_success').html('Question Updated Successfully !');
                                //jQuery(".Question_" + x + " .loader img").fadeOut(200);
                                setTimeout('window.location.reload();', 500);

                            } else {

                                jQuery('.Question_' + x + ' .result').addClass('sc_infobox_style_error').html('Updation Failed !');
                            }
                            jQuery('.Question_' + x + ' .result').fadeIn(500);
                            setTimeout("jQuery('.Question_'" + x + "' .result').fadeOut()", 6000);

                            //            console.log("session destroys");
                            //            location.reload();
                            //            
                            //            

                        }, 'json');



                    }

                    function formValidate(form, opt) {
                        "use strict";
                        var error_msg = '';
                        form.find(":input").each(function() {
                            if (error_msg !== '' && opt.exit_after_first_error) {
                                return;
                            }
                            for (var i = 0; i < opt.rules.length; i++) {
                                if (jQuery(this).attr("name") === opt.rules[i].field) {
                                    var val = jQuery(this).val();
                                    var error = false;
                                    if (typeof (opt.rules[i].min_length) === 'object') {
                                        if (opt.rules[i].min_length.value > 0 && val.length < opt.rules[i].min_length.value) {
                                            if (error_msg === '') {
                                                jQuery(this).get(0).focus();
                                            }
                                            error_msg += '<p class="error_item">' + (typeof (opt.rules[i].min_length.message) !== 'undefined' ? opt.rules[i].min_length.message : opt.error_message_text) + '</p>';
                                            error = true;
                                        }
                                    }
                                    if ((!error || !opt.exit_after_first_error) && typeof (opt.rules[i].max_length) === 'object') {
                                        if (opt.rules[i].max_length.value > 0 && val.length > opt.rules[i].max_length.value) {
                                            if (error_msg === '') {
                                                jQuery(this).get(0).focus();
                                            }
                                            error_msg += '<p class="error_item">' + (typeof (opt.rules[i].max_length.message) !== 'undefined' ? opt.rules[i].max_length.message : opt.error_message_text) + '</p>';
                                            error = true;
                                        }
                                    }
                                    if ((!error || !opt.exit_after_first_error) && typeof (opt.rules[i].mask) === 'object') {
                                        if (opt.rules[i].mask.value !== '') {
                                            var regexp = new RegExp(opt.rules[i].mask.value);
                                            if (!regexp.test(val)) {
                                                if (error_msg === '') {
                                                    jQuery(this).get(0).focus();
                                                }
                                                error_msg += '<p class="error_item">' + (typeof (opt.rules[i].mask.message) !== 'undefined' ? opt.rules[i].mask.message : opt.error_message_text) + '</p>';
                                                error = true;
                                            }
                                        }
                                    }
                                    if ((!error || !opt.exit_after_first_error) && typeof (opt.rules[i].equal_to) === 'object') {
                                        if (opt.rules[i].equal_to.value !== '' && val !== jQuery(jQuery(this).get(0).form[opt.rules[i].equal_to.value]).val()) {
                                            if (error_msg === '') {
                                                jQuery(this).get(0).focus();
                                            }
                                            error_msg += '<p class="error_item">' + (typeof (opt.rules[i].equal_to.message) !== 'undefined' ? opt.rules[i].equal_to.message : opt.error_message_text) + '</p>';
                                            error = true;
                                        }
                                    }
                                    if (opt.error_fields_class !== '') {
                                        jQuery(this).toggleClass(opt.error_fields_class, error);
                                    }
                                }
                            }
                        });


                        if (error_msg !== '' && opt.error_message_show) {
                            error_msg_box = form.find(".result");
                            if (error_msg_box.length === 0) {
                                form.append('<div class="result"></div>');
                                error_msg_box = form.find(".result");
                            }
                            if (opt.error_message_class) {
                                error_msg_box.toggleClass(opt.error_message_class, true);
                            }
                            error_msg_box.html(error_msg).fadeIn();
                            setTimeout(function() {
                                error_msg_box.fadeOut();
                            }, opt.error_message_time);
                        }
                        return error_msg !== '';
                    }

                }
            </script>

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

            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="assets/js/core.js" type="text/javascript"></script>
            <script src="assets/js/demo.js" type="text/javascript"></script>

            <script src="assets/js/lib.js" type="text/javascript"></script>

        </div></body>

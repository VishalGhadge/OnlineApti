<?php
require './util.php';

//Start session
session_start();
error_reporting(E_ERROR | E_PARSE);
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['sess_RollNo']) && (trim($_SESSION['Ex_id']) == '')) {
    ?>

    <script type="text/javascript">
        location = "http://localhost:81/OnlineApti/signIn.php";
    </script>
    <?php
} else {

    $RollNo = $_SESSION['sess_RollNo'];
    $Ex_id = $_SESSION['Ex_id'];
    $s_dept = $_SESSION['S_Dept'];

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
    <?php require './S_header.php'; ?> 
    <?php require './WebServices/get_Result.php'; ?> 
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

        <!-- BEGIN PAGE CONTAINER-->
        <div class="page-content"> 
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div id="portlet-config" class="modal hide">

            </div>
            <div class="clearfix"></div>
            <div class="content">  
                <div class="page-title">	

                </div>
                <div id="container">


                    <div class="span12">
                        <div class="grid simple horizontal orange">
                            <div class="grid-title ">
                                <h4>Your Marks</h4>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                                    <a href="javascript:;" class="reload"></a>
                                </div>
                            </div>
                            <div class="grid-body">
                                <div>
                                    <h2 class="center-text" style="color: #FFA500;">Your Total<span class="semi-bold" style="color: #00ced1;"> Marks</span></h2>
                                    <?php
                                    if ($mark >= 20) {
                                        ?>
                                        <h1 class="center-text semi-bold" style="color: #00C060; margin-top: 2%;"><?php echo $mark; ?>&nbsp;<span style="color: #000000;" >/&nbsp;<?php echo --$x; ?></span></h1>
                                        <h3 class="center-text semi-bold" style="color: #0edbec; margin-top: 2%">congratulations !!</h3>
                                        <?php
                                    } else if ($mark > 0) {
                                        ?>
                                        <h1 class="center-text semi-bold" style="color: #03c6ff; margin-top: 2%;"><?php echo $mark; ?>&nbsp;<span style="color: #000000;" >/&nbsp;<?php echo --$x; ?></span></h1>
                                        <h3 class="center-text semi-bold" style="margin-top: 2%">Good&nbsp Luck&nbsp Next&nbsp time !!</h3>
                                        <?php
                                    } else {
                                        ?>
                                        <h1 class="center-text semi-bold" style="color: #f61818; margin-top: 2%;"><?php echo $mark; ?>&nbsp;<span style="color: #000000;" >/&nbsp;<?php echo --$x; ?></span></h1>
                                        <h6 class="center-text semi-bold" style="color: #800080; margin-top: 2%">Don't&nbsp Worry&nbsp It&nbsp happen's !</h6>
                                        <h3 class="center-text semi-bold" style="color: #008000; margin-top: 2%">Good&nbsp Luck&nbsp Next&nbsp time !</h3>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>   
                    </div>

                    <div class="span12">
                        <div class="grid simple horizontal orange">
                            <div class="grid-title ">
                                <h4>Plz write feedback </h4>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                                    <a href="javascript:;" class="reload"></a>
                                </div>
                            </div>
                            <div class="grid-body">
                                <div class="fb">
                                    <form action="">
                                        <div class="row-fluid">
                                            <textarea id="fback" name="fback" class="span11" placeholder="Write here..." rows="5"></textarea>
                                        </div>

                                    </form>
                                    <button type="button" id="fb_submit" name="fb_submit" class="btn btn-primary btn-cons" onclick="get_stdInfo(<?php echo $RollNo; ?>, '<?php echo $s_dept; ?>')"><i class="icon-ok"></i>&nbsp;Submit</button>
                                    <div class="result sc_infobox success" style="display: none;"></div>
                                </div>
                            </div>
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



        <!-- END CORE TEMPLATE JS -->
    </div></body>

<script type="text/javascript">
                                        function get_stdInfo(rno, dept) {

                                            var error_msg_box = null;

                                            //console.log('click');
                                            validate_fback();
                                            //e.preventDefault();
                                            //return false;
                                            // Check Info to Update ..
                                            function validate_fback() {
                                                var error = formValidate(jQuery(".fb form"), {
                                                    error_message_show: true,
                                                    error_message_time: 2000,
                                                    error_message_class: "sc_infobox sc_infobox_style_error",
                                                    error_fields_class: "error_fields_class",
                                                    exit_after_first_error: true,
                                                    rules: [
                                                        {
                                                            field: "fback",
                                                            min_length: {value: 1, message: "Plz write something !!"},
                                                            //max_length: {value: 20, message: "The Name is too laong"},
                                                            //mask: {value: "/^[a-z]+$/", message: "Number, Caps, symbols, Space not allowed"},
                                                        }
                                                    ]
                                                });
                                                if (!error) {
//            document.forms['registration_form'].submit();
                                                    save_fback();
                                                }
                                            }

                                            function  save_fback() {

                                                //jQuery(".loader img").fadeIn(100);

                                                jQuery('.fb .result').removeAttr('style');
                                                jQuery.post('WebServices/add_fback.php',
                                                        {
                                                            fback: jQuery('#fback').val(),
                                                            rno: rno,
                                                            dept: dept,
                                                        },
                                                        function(rez) {


//            var rez = JSON.parse(response);
                                                            jQuery('.fb .result').toggleClass('sc_infobox_style_error', false).toggleClass('sc_infobox_style_success', false);

                                                            if (rez.success == 1) {
                                                                jQuery('.fb .result').addClass('sc_infobox_style_success').html(rez.message);

                                                                setTimeout('window.location.reload();', 500);
//                       
                                                            } else if (rez.success == -1) {
                                                                jQuery('.fb .result').addClass('sc_infobox_style_error').html(rez.message);

                                                            } else {
                                                                jQuery('.fb .result').addClass('sc_infobox_style_error').html(rez.message);
                                                            }
                                                            jQuery('.fb .result').fadeIn(500);
                                                            jQuery('.fb .result').fadeOut(1000)

//            console.log("session destroys");
//            location.reload();
//            
//            
                                                            //jQuery(".loader img").fadeOut(200);
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

<?php
session_destroy();
?>

<?php {

//load and connect to MySQL database stuff
    require("config.inc.php");

    $Admin_Id = $_SESSION['sess_Admin_Id'];
    $dept = $_SESSION['Dept'];
    //gets user's info based off of a username.
    $query = "select `d_name`,`id`,`E_pass`,`E_Date`,`E_time`,`mrk_Sys` from `department`,`exam` "
            . "where `d_name` = '$dept' and `department`.`d_id` = `exam`.`d_id`";

    $query_params = array(
    );


//execute query
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
    } catch (PDOException $ex) {
        $response["success"] = 0;
        $response["message"] = "Database Error!";
        $response["details"] = $ex;

        echo $ex;
        die(json_encode($response));
    }

// Finally, we can retrieve all of the found rows into an array using fetchAll 
    $rows = $stmt->fetchAll();



    if ($rows) {

        $response["posts"] = array();

        $ad = 1;

        foreach ($rows as $row) {

            $post = array();
            ?>

            <tr>
                <td>
                    <div class="exm_<?php echo $ad; ?>">
                        <div id="accordion2" class="accordion">
                            <div class="accordion-group">
                                <div class="accordion-heading"> 
                                    <a href="#collapseOne<?php echo $ad; ?>" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
                                        <span class="semi-bold" style="color: #00a1f1;"><?php echo $row['id'] . str_repeat('&nbsp', 5) . $row['d_name'] . str_repeat('&nbsp', 5) . date("d-m-Y", strtotime($row['E_Date'])) . str_repeat('&nbsp', 5) . date("g:i  A", strtotime($row['E_time'])); ?></span>
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
                                                        <input type="text" style="width:93%" name="e_pass_<?php echo $ad; ?>" id="e_pass_<?php echo $ad; ?>" value="<?php echo $row['E_pass']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="row-fluid span6">
                                                    <div class="span4">
                                                        <h5><span class="semi-bold">Date&nbsp;(mm:dd:yy) :</span></h5>
                                                    </div>
                                                    <div class="row-fluid">
                                                        <div class="input-append success date">
                                                            <input type="text" class="span12" id="e_date_<?php echo $ad; ?>" name="e_date_<?php echo $ad; ?>" value="<?php echo $row['E_Date']; ?>" >
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
                                                                <input type="text" class="timepicker-default span12" id="e_time_<?php echo $ad; ?>" name="e_time_<?php echo $ad; ?>" value="<?php echo date("g:i A", strtotime($row['E_time'])); ?>" >
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
                                                            <?php
                                                            if ($row['mrk_Sys'] == 1) {
                                                                ?>
                                                                <input id="positive_<?php echo $ad; ?>" type="radio" name="mrk_sys_<?php echo $ad; ?>" value="1" checked="checked">
                                                                <label for="positive_<?php echo $ad; ?>">+ve</label>
                                                                <input id="negative_<?php echo $ad; ?>" type="radio" name="mrk_sys_<?php echo $ad; ?>" value="0">
                                                                <label for="negative_<?php echo $ad; ?>">-ve</label>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <input id="positive_<?php echo $ad; ?>" type="radio" name="mrk_sys_<?php echo $ad; ?>" value="1" >
                                                                <label for="positive_<?php echo $ad; ?>">+ve</label>
                                                                <input id="negative_<?php echo $ad; ?>" type="radio" name="mrk_sys_<?php echo $ad; ?>" value="0" checked="checked">
                                                                <label for="negative_<?php echo $ad; ?>">-ve</label>
                                                                <?php
                                                            }
                                                            ?>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-fluid" style="margin-top: 1%;">
                                                <div class="row-fluid span6">
                                                    <div class="span4">
                                                        <h5><span class="semi-bold">Edit Exam :</span></h5>
                                                    </div>
                                                    <div class="span7">
                                                        <button type="button" class="btn btn-info btn-cons" onclick="get_Exam_id('<?php echo $row['id']; ?>', <?php echo $ad; ?>)" ><i class="icon-paste"></i> Edit</button>
                                                        <button type="button" class="btn btn-info btn-cons" onclick="allow_stud('<?php echo $row['id']; ?>', <?php echo $ad; ?>)" ><i class="icon-paste"></i> Allow Students</button>
                                                    </div>
                                                </div>
                                                <div class="row-fluid span6">
                                                    <div class="span4">
                                                        <h5><span class="semi-bold">Remove Exam :</span></h5>
                                                    </div>
                                                    <div class="span7">
                                                        <button type="button" class="btn btn-danger-dark btn-cons">Remove Exam</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="result sc_infobox " style="display: none;"></div>
                    </div>
                </td>
            </tr>

            <?php
            //update our repsonse JSON data
            array_push($response["posts"], $post);

            $ad++;
        }
    
        
    }

    # close the connection
    $db = null;
}
?>

<script type="text/javascript">
    function get_Exam_id(x, y) {

        var error_msg_box = null;
        var selectedVal = "";
        var selected = $("input[name=mrk_sys_" + y + "]:checked");
        //alert(selected.val());

        console.log('click');

        edit_exam();
        //.e.preventDefault();
        return false;
        // Check Info to Update ..
        function  edit_exam() {

            //jQuery(".Question_" + x + " .loader img").fadeIn(100);

            jQuery('.exm_' + y + ' .result').removeAttr('style');
            jQuery.post('WebServices/Updt_Exam.php',
                    {
                        e_id: x,
                        e_pass: jQuery('#e_pass_' + y).val(),
                        e_date: jQuery('#e_date_' + y).val(),
                        e_time: jQuery('#e_time_' + y).val(),
                        mrk_sys: selected.val()
                    },
            function(rez) {


                //            var rez = JSON.parse(response);
                /*jQuery('.Question_' + x + ' .result')
                 .toggleClass('sc_infobox_style_error', false)
                 .toggleClass('sc_infobox_style_success', false);*/

                if (rez.success == 1) {
                    jQuery('.exm_' + y + ' .result').addClass('sc_infobox_style_success').html('Admin removed !!');
                    //jQuery(".Question_" + x + " .loader img").fadeOut(200);
                    setTimeout('window.location.reload();', 600);

                } else {

                    jQuery('.exm_' + y + ' .result').addClass('sc_infobox_style_error').html('Can not remove !');
                }
                jQuery('.exm_' + y + ' .result').fadeIn(500);
                //setTimeout("jQuery('.exm_'" + y + "' .result').fadeOut()", 6000);

                //            console.log("session destroys");
                //            location.reload();
                //            
                //            

            }, 'json');



        }
    }
    
    function allow_stud(x, y) {

        console.log('click');
        //alert(x);
        ready_stud();
        //.e.preventDefault();
        return false;
        // Check Info to Update ..
        function  ready_stud() {

            //jQuery(".Question_" + x + " .loader img").fadeIn(100);

            jQuery('.exm_' + y + ' .result').removeAttr('style');
            jQuery.post('WebServices/allow_stud.php',
                    {
                        e_id: x,
                    },
            function(rez) {

                if (rez.success == 1) {
                    jQuery('.exm_' + y + ' .result').addClass('sc_infobox_style_success').html(rez.message);
                    setTimeout('window.location.reload();', 600);

                } else {

                    jQuery('.exm_' + y + ' .result').addClass('sc_infobox_style_error').html(rez.message);
                   
                }
                jQuery('.exm_' + y + ' .result').fadeOut(2000);
               
                //            console.log("session destroys");
                //            location.reload();
                //            
                //            

            }, 'json');



        }
    }
    
    
    
</script>
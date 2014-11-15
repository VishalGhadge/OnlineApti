<?php {

//load and connect to MySQL database stuff
    require("config.inc.php");

    $Admin_Id = $_SESSION['sess_Admin_Id'];
    $dept = $_SESSION['Dept'];

    //gets user's info based off of a username.
    $query = "select `rno`,`fb` from `feedback` "
            . "where `dept` = '$dept'";

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
                                        <span class="semi-bold" style="color: #00a1f1;"><?php echo $row['rno'] . str_repeat('&nbsp', 5) . $dept; ?></span>
                                        <i class="icon-plus"></i> 
                                    </a> 
                                </div>
                                <div class="accordion-body collapse" id="collapseOne<?php echo $ad; ?>" style="height: 0px;">
                                    <div class="accordion-inner"> 
                                        <div class="row-fluid">
                                            <h5><span class="semi-bold"><textarea readonly="true" style="font-size: 12pt; line-height: 100%; color: #004444"  id="q" name="q" rows="5" class="span11"><?php echo $row['fb']; ?></textarea></span></h5>
                                        </div>
                                    </div>
                                </div>
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
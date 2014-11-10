<?php {

//load and connect to MySQL database stuff
    require("config.inc.php");

    $Admin_Id = $_SESSION['sess_Admin_Id'];
    $dept = $_SESSION['Dept'];
    //gets user's info based off of a username.

    $query = "select `student`.`rno` from `student` "
            . "where `student`.`d_id` = (select `department`.`d_id` from department where `d_name` = '$dept');";


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
    ?>
    <div class="remove_adm">
        <div class="span6">
            <div class="grid simple ">
                <div class="grid-title">
                    <h4 style="color: #f65314;">Add New <span class="semi-bold">Students</span></h4>

                    <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body">
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
                <div class="rmv_std">
                    <form action="">
                        <div class="grid-body ">
                            <table cellpadding="0" cellspacing="0" border="0" class="table " id="example3" width="100%">
                                <thead>
                                    <tr>
                                        <th class="center">Roll No</th>
                                        <th class="center">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if ($rows) {

                                        $response["posts"] = array();
                                        ?>



                                        <?php
                                        $ad = 1;
                                        foreach ($rows as $row) {

                                            $post = array();
                                            ?>

                                            <tr>
                                                <td class="center"><?php echo $row['rno']; ?></td>
                                                <td class="center"><button type="button" id="rmv_admin" class="btn btn-danger btn-cons" onclick="remove_Std(<?php echo $row['rno']; ?>)">Remove</button></td>
                                            </tr>
                                            <?php
                                            //update our repsonse JSON data
                                            array_push($response["posts"], $post);

                                            $ad++;
                                        }
                                        ?>

                                    </tbody>
                                </table>
                                <div class="result sc_infobox " style="display: none;"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

    # close the connection
    $db = null;
}
?>

<script type="text/javascript">
    function remove_Std(x) {

        var error_msg_box = null;
        rmv_student();
        return false;
        // Check Info to Update ..
        function  rmv_student() {

            //jQuery(".Question_" + x + " .loader img").fadeIn(100);
            jQuery('.rmv_std .result').removeAttr('style');
            jQuery.post('WebServices/remove_stud.php',
                    {
                        rno: x

                    },
            function(rez) {

                if (rez.success == 1) {
                   jQuery('remove_adm .result').addClass('sc_infobox_style_success').html(rez.message);
                    setTimeout('window.location.reload();', 500);

                } else {

                    jQuery('.remove_adm .result').addClass('sc_infobox_style_error').html(rez.message);
                }
                jQuery('.remove_adm .result').fadeIn(500);
                jQuery('.remove_adm .result').fadeOut(2000);
                           

            }, 'json');



        }
    }
</script>
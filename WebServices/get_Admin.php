<?php {

//load and connect to MySQL database stuff
    require("config.inc.php");
    
    $Admin_Id = $_SESSION['sess_Admin_Id'];
    $dept = $_SESSION['Dept'];
    //gets user's info based off of a username.
    $query = "select `Name`,`A_id`,`adminship`,`d_name` from `admin`,`department` where `admin`.`d_id` = `department`.`d_id`;";

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
        ?>
        <div class="remove_adm">
            <div class="span12">
                <div class="grid simple ">
                    <div class="grid-title">
                        <h4 style="color: #f65314;">Current <span class="semi-bold">Admins</span></h4>
                        
                        <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                    </div>
                    <div class="grid-body ">
                        <table cellpadding="0" cellspacing="0" border="0" class="table " id="example3" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Adminship provided By</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $ad = 1;
                                foreach ($rows as $row) {

                                    $post = array();
                                    ?>

                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $row['Name']; ?></td>
                                        <td class="center"><?php echo $row['d_name']; ?></td>
                                        <td class="center"><?php echo $row['adminship']; ?></td>

                                        <?php
                                        if ( (strcmp($dept,$row['d_name']) != 0)) {
                                            ?>
                                            <td class="center"><button type="button" class="btn btn-default btn-cons disabled">Remove</button></td>
                                            <?php
                                        } else if ($row['A_id'] == 1) {
                                            ?>
                                            <td class="center"><button type="button"  class="btn btn-default btn-cons disabled">Remove</button></td>
                                            <?php
                                        } else {
                                            ?>
                                            <td class="center"><button type="button" id="rmv_admin" class="btn btn-danger btn-cons" onclick="remove_Ad(<?php echo $row['A_id']; ?>)">Remove</button></td>
                                            <?php
                                        }
                                        ?>

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
        function remove_Ad(x) {

            var error_msg_box = null;

            console.log('click');
            rmv_admin();
            e.preventDefault();
            return false;
            // Check Info to Update ..
            function  rmv_admin() {

                //jQuery(".Question_" + x + " .loader img").fadeIn(100);
                jQuery('.remove_adm .result').removeAttr('style');
                jQuery.post('WebServices/remove_adm.php',
                        {
                            ad_name: x

                        },
                function(rez) {


                    //            var rez = JSON.parse(response);
                    /*jQuery('.Question_' + x + ' .result')
                     .toggleClass('sc_infobox_style_error', false)
                     .toggleClass('sc_infobox_style_success', false);*/

                    if (rez.success == 1) {
                        jQuery('remove_adm .result').addClass('sc_infobox_style_success').html('Admin removed !!');
                        //jQuery(".Question_" + x + " .loader img").fadeOut(200);
                        setTimeout('window.location.reload();', 500);

                    } else {

                        jQuery('.remove_adm .result').addClass('sc_infobox_style_error').html('Can not remove !');
                    }
                    jQuery('.remove_adm .result').fadeIn(500);
                    setTimeout("jQuery('.remove_adm .result').fadeOut()", 6000);

                    //            console.log("session destroys");
                    //            location.reload();
                    //            
                    //            

                }, 'json');



            }
        }
    </script>
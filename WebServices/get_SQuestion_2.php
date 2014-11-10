<?php {

//load and connect to MySQL database stuff
    require("config.inc.php");

    $s_dept = $_SESSION['S_Dept'];
    $RollNo = $_SESSION['sess_RollNo'];
    $Ex_id = $_SESSION['Ex_id'];




    $query = "select * from `result_$s_dept` where `result_$s_dept`.`id` = '$Ex_id' and `result_$s_dept`.`rno` = $RollNo;";

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

    $op = $stmt->fetchAll();


    //  echo json_encode($response);

    if ($op) {

        foreach ($op as $op_row) {

            $x = 11;
            for ($x = 11; $x <= 20; $x++) {

                $query = "select `Qno`,`Question`,`A`,`B`,`C`,`D`,`choice`,`time_stamp`,`Explanation`,`Name` "
                        . "from `$s_dept`,`admin` where "
                        . "`$s_dept`.`A_id` = `admin`.`A_id` and `$s_dept`.`Qno` = $x";



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

                    foreach ($rows as $row) {
                        $post = array();
                        ?>

                        <div class="row-fluid">
                            <div class="span12">
                                <div class="grid simple">
                                    <div class="grid-title no-border">
                                        <div class="row-fluid">
                                            <div class="span4">
                                                <h4 style="color: #0090D9;">Question No :  <span class="semi-bold" style="color: #0aa699">&nbsp;<?php echo $x; ?>&nbsp;</span></h4>
                                            </div>
                                            <div class="span4">
                                            <!--<h4 style="color: #0090D9">Last Update : <?php echo $row['time_stamp']; ?></h4> -->
                                            </div>
                                            <div class="span4 text-right" style="margin-left: 20%;">
                                                <h4 style="color: #0090D9">&nbsp;&nbsp;<?php echo $row['Name']; ?></h4>
                                            </div>
                                            <div class="tools">
                                                <a class="collapse"  href="javascript:;"></a>
                                                <a class="config" data-toggle="modal" href="#grid-config"></a>
                                                <!-- <a class="reload" href="javascript:;"></a> <a class="remove" href="javascript:;"></a> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid-body no-border">
                                        <div class="Answer_<?php echo $x; ?>">
                                            <form action="" id="answer_<?php echo $x; ?>">

                                                <div class="row-fluid">
                                                    <div class="radio radio-success">
                                                        <div class="span11">
                                                            <div class="row-fluid">
                                                                <textarea readonly="true" style="margin-left: 5%; font-size: 12pt; line-height: 130%; color: #004444"  id="q<?php echo $x; ?>" name="q<?php echo $x; ?>" rows="10" class="span11"><?php echo $row['Question']; ?></textarea>
                                                            </div>
                                                            <div class="row-fluid" style="margin-left: 5%;">
                                                                <div class="radio radio-success">
                                                                    <div class="row-fluid">
                                                                        <?php
                                                                        if ($op_row['a_' . $x] == 1) {
                                                                            ?>
                                                                            <input id="A_<?php echo $x; ?>" checked="checked" type="radio" name="Ans_<?php echo $x; ?>" value="1" onclick="getAns(<?php echo $x; ?>, 1)" >
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input id="A_<?php echo $x; ?>" type="radio" name="Ans_<?php echo $x; ?>" value="1" onclick="getAns(<?php echo $x; ?>, 1)" >
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        <label style="font-size: 15px;" class="semi-bold" for="A_<?php echo $x; ?>">&nbsp;&nbsp;<?php echo $row['A']; ?></label>
                                                                    </div>
                                                                    <!-- 2nd -->
                                                                    <div class="row-fluid">
                                                                        <?php
                                                                        if ($op_row['a_' . $x] == 2) {
                                                                            ?>
                                                                            <input id="B_<?php echo $x; ?>" checked="checked" type="radio" name="Ans_<?php echo $x; ?>" value="2" onclick="getAns(<?php echo $x; ?>, 2)" >
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input id="B_<?php echo $x; ?>" type="radio" name="Ans_<?php echo $x; ?>" value="2" onclick="getAns(<?php echo $x; ?>, 2)" >
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        <label style="font-size: 15px;" class="semi-bold" for="B_<?php echo $x; ?>">&nbsp;&nbsp;<?php echo $row['B']; ?></label>
                                                                    </div>
                                                                    <!-- 3rd -->
                                                                    <div class="row-fluid">
                                                                        <?php
                                                                        if ($op_row['a_' . $x] == 3) {
                                                                            ?>
                                                                            <input id="C_<?php echo $x; ?>" checked="checked" type="radio" name="Ans_<?php echo $x; ?>" value="3" onclick="getAns(<?php echo $x; ?>, 3)" >
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input id="C_<?php echo $x; ?>" type="radio" name="Ans_<?php echo $x; ?>" value="3" onclick="getAns(<?php echo $x; ?>, 3)" >
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        <label style="font-size: 15px;" class="semi-bold" for="C_<?php echo $x; ?>">&nbsp;&nbsp;<?php echo $row['C']; ?></label>
                                                                    </div>
                                                                    <!-- 4th -->
                                                                    <div class="row-fluid">
                                                                        <?php
                                                                        if ($op_row['a_' . $x] == 4) {
                                                                            ?>
                                                                            <input id="D_<?php echo $x; ?>" checked="checked" type="radio" name="Ans_<?php echo $x; ?>" value="4" onclick="getAns(<?php echo $x; ?>, 4)" >
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input id="D_<?php echo $x; ?>" type="radio" name="Ans_<?php echo $x; ?>" value="4" onclick="getAns(<?php echo $x; ?>, 4)" >
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        <label style="font-size: 15px;" class="semi-bold" for="D_<?php echo $x; ?>">&nbsp;&nbsp;<?php echo $row['D']; ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        //update our repsonse JSON data
                        array_push($response["posts"], $post);
                    }
                }
            }
        }
    }
# close the connection
    $db = null;
}
?>
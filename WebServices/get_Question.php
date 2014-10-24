<?php {

//load and connect to MySQL database stuff
    require("config.inc.php");
    $dept = $_SESSION['Dept'];
    //gets user's info based off of a username.
    $query = "select `Qno`,`Question`,`A`,`B`,`C`,`D`,`choice`,`time_stamp`,`Name` from `$dept`,`admin` where `$dept`.`A_id` = `admin`.`A_id`";

    $query_params = array(
    );


//execute query
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        $response["success"] = 0;
        $response["message"] = "Database Error!";
        $response["details"] = $ex;

        echo $ex;
        die(json_encode($response));
    }

// Finally, we can retrieve all of the found rows into an array using fetchAll 
    $rows = $stmt->fetchAll();

    $x = 1;

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
                                    <h4 style="color: #0090D9">Last Update : <?php echo $row['time_stamp']; ?></h4>
                                </div>
                                <div class="span4">
                                    <h4 style="color: #0090D9">by-&nbsp;&nbsp;<?php echo $row['Name']; ?></h4>
                                </div>
                            <div class="tools"> 
                                <a class="collapse" href="javascript:;"></a> 
                                <a class="config" data-toggle="modal" href="#grid-config"></a> 
                                <a class="reload" href="javascript:;"></a> <a class="remove" href="javascript:;"></a> 
                            </div>
                            </div>
                        </div>

                        <div class="grid-body no-border">
                            <div class="Question_<?php echo $x; ?>">
                                <form action="" id="admin-form">
                                    <div class="grid-body no-border">
                                        <div class="row-fluid">
                                            <textarea id="q<?php echo $x; ?>" name="q<?php echo $x; ?>" class="span6" rows="5">
                                                <?php echo $row['Question']; ?>
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span1">
                                            <h5><span class="semi-bold">A :</span></h5>
                                        </div>
                                        <div class="span9">
                                            <input type="text" style="width:93%" value="<?php echo $row['A']; ?>" name="a_<?php $x; ?>" id="a_<?php $x; ?>" />
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span1">
                                            <h5><span class="semi-bold">B :</span></h5>
                                        </div>
                                        <div class="span9">
                                            <input type="text" style="width:93%" value="<?php echo $row['B']; ?>"name="b_<?php $x; ?>" id="b_<?php $x; ?>" />
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span1">
                                            <h5><span class="semi-bold">C :</span></h5>
                                        </div>
                                        <div class="span9">
                                            <input type="text" style="width:93%" value="<?php echo $row['C']; ?>" name="c_<?php $x; ?>" id="c_<?php $x; ?>" />
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span1">
                                            <h5><span class="semi-bold">D :</span></h5>
                                        </div>
                                        <div class="span9">
                                            <input type="text" style="width:93%" value="<?php echo $row['D']; ?>" name="d_<?php $x; ?>" id="a_<?php $x; ?>" />
                                        </div>
                                    </div>
                                    </br>
                                    <div class="result sc_infobox " style="display: none;"></div>
                                    <footer>
                                        <div class="row-fluid">
                                            <div class="span3">
                                                <h5><span class="semi-bold">Correct Choice :</span></h5>
                                            </div>
                                            <div class="span4">
                                                <select id="choice" name="choice" style="width: 40%;">
                                                    <?php
                                                    $i = 1;
                                                    $ch = 'A';
                                                    for ($i = 1; $i <= 4; $i++) {
                                                        if ($i == $row['choice']) {
                                                            ?>
                                                            <option value="<?php $i; ?>" selected="selected" ><?php echo $ch++; ?></option>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <option value="<?php $i; ?>" ><?php echo $ch++; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="span4">
                                                <button type="button" id="add_admin" class="btn btn-success btn-cons" style="margin-right: ">Save</button>
                                            </div>
                                        </div>
                                    </footer>
                                </form>
                            </div>

                        </div>
                    </div> 
                </div>
            </div>
            <?php
            //update our repsonse JSON data
            array_push($response["posts"], $post);
            $x++;
        }
    }

# close the connection
    $db = null;
}
?>
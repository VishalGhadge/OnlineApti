<?php {

//load and connect to MySQL database stuff
    require("config.inc.php");
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



    if ($rows) {

        $response["posts"] = array();

        foreach ($rows as $row) {
            ?>
            <tr><td><?php echo $row['rno']; ?></td>
                <?php
                $query = "select `id` from `exam` where `exam`.`d_id` = "
                        . "(select `department`.`d_id` from `department` where "
                        . "`d_name` = '$dept' );";



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

                $rows1 = $stmt->fetchAll();
                $tmark = 0;
                if ($rows1) {
                    $e_cnt = 0;
                    foreach ($rows1 as $row1) {
                        $e_cnt++;
                        $r1 = $row['rno'];
                        $rid = $row1['id'];
                       

                        $query = "select `total` from `result_$dept` "
                                . "where `result_$dept`.`rno` = $r1 and `result_$dept`.`id` = '$rid';";


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

                        $row2 = $stmt->fetch();
                        
                        if ($row2) {
                            
                            $tmark += $row2['total'];
                            
                            ?>
                            <td><?php echo $row2['total']; ?></td>
                            <?php
                        }
                    }
                }




                $avg = $tmark / $e_cnt;
                
                $post = array();
                ?>
                <td valign="middle">
                    <div class="progress progress-success">
                        <div data-percentage="0%" id="pro" style="width: <?php echo $avg; ?>%;" class="bar"></div>
                    </div>
                </td
            </tr>
            <?php
            
            array_push($response["posts"], $post);
        }
    }

# close the connection
    $db = null;
}
?>
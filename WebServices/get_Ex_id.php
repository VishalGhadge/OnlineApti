<?php {

//load and connect to MySQL database stuff
    require("config.inc.php");
    $dept = $_SESSION['Dept'];
    
    //gets user's info based off of a username.
    $query = "select `id` from `exam` where `exam`.`d_id` = "
            . "(select `department`.`d_id` from `department` where "
            . "`d_name` = '$dept' );";

    
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
            <th>Roll No</th>
        <?php
        
        foreach ($rows as $row) {
            $post = array();
            ?>
                <th><?php echo $row['id'] ?></th>
            <?php
            //update our repsonse JSON data
            array_push($response["posts"], $post);
        }
        ?>
            <th>Growth</th>
        <?php
    }

# close the connection
    $db = null;
}
?>
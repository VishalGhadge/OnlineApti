<?php {

//load and connect to MySQL database stuff
    require("config.inc.php");

    //gets user's info based off of a username.
    $query = "select * from department";

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



    if ($rows) {

        $response["posts"] = array();

        foreach ($rows as $row) {
            $post = array();
            ?>
                <option id="sel_1" value="<?php echo $row['d_id']; ?>"><?php echo $row['d_name']; ?></option>
            <?php
            //update our repsonse JSON data
            array_push($response["posts"], $post);
        }
    }

# close the connection
    $db = null;
}
?>
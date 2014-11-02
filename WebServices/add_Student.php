<?php
if (!empty($_POST)) {


//load and connect to MySQL database stuff
    require("config.inc.php");
    $dept = $_SESSION['Dept'];
    
    $rn_from = $_POST['rn_from'];
    $rn_to = $_POST['rn_to'];
    
    //gets user's info based off of a username.
    $query = " 
            SELECT `d_id` 
            FROM `department`
            WHERE 
                `d_name` =  '$dept'
        ";


    //execute query
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
    } catch (PDOException $ex) {
        $response["success"] = 0;
        $response["message"] = "Database Error!";
        $response["details"] = $ex;

        die(json_encode($response));
    }

// Finally, we can retrieve all of the found rows into an array using fetchAll 
    $rows = $stmt->fetchAll();

    if ($rows) {

        foreach ($rows as $row) {

            $did = $row['d_id'];

           $query = "insert into `student`(`rno`,`d_id`) values";

            for ($rno = $rn_from; $rno <= $rn_to; $rno++) {

                $query .= "($rno,$did),";
            }

            $sql = rtrim($query, ",");

            try {
                $stmt = $db->prepare($sql);
                $result = $stmt->execute();
            } catch (PDOException $ex) {
                $response["success"] = 0;
                $response["message"] = "Wrong roll no entered !";
                $response["details"] = $ex;

                die(json_encode($response));
            }

            $response["success"] = 1;
            $response["message"] = "Student added successgully ";
        }
    } else {
        $response["success"] = -1;
        $response["message"] = "Department is not present ! ";
        die(json_encode($response));
    }

    // echoing JSON response
    echo json_encode($response);
# close the connection
    $db = null;
} else {
    ?>
    <h1>Add Student</h1> 
    <form action="add_Student.php" method="post">
        from:<br /> 
        <input type="text" name="rn_from" placeholder="from" /> 
        <br /><br /> 
        to<br /> 
        <input type="text" name="rn_to" placeholder="to" /> 

        <br /><br /> 
        <input type="submit" value="Login" /> 
    </form> 
    <?php
}
?>

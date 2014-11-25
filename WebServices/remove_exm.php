<?php

//load and connect to MySQL database stuff
require("config.inc.php");
$dept = $_SESSION['Dept'];


$query = "delete from `exam` where `exam`.`d_id` = (select `department`.`d_id` from `department` where `d_name` = '$dept');"
        . " TRUNCATE TABLE  `result_$dept`;";


try {
    $stmt1 = $db->prepare($query);
    $result1 = $stmt1->execute();
} catch (PDOException $ex) {
    $response["success"] = 0;
    $response["message"] = "Database Error2. Please Try Again!";
    $response["details"] = $ex;

    die(json_encode($response));
}

$response["success"] = 1;
$response["message"] = "All Exam's removed !";

echo json_encode($response);

// Finally, we can retrieve all of the found rows into an array using fetchAll 
$db = null;
?>



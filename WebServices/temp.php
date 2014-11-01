<?php
if (!empty($_POST)) {
//load and connect to MySQL database stuff
    require("config.inc.php");

    $dept = $_SESSION['S_Dept'];
    //gets user's info based off of a username.
    $RollNo = $_SESSION['sess_RollNo'];
    $Ex_id = $_SESSION['Ex_id'];

    //gets user's info based off of a username.
    $query = "select * from `result_$dept` where `rno` = $RollNo and `id` = '$Ex_id';";

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
    
    

    if ($op) {
        
        foreach ($op as $op_row) {
            $x  = $_POST["x"];
           echo $op_row['a_'.$x];
        }
    }


    $response["success"] = 1;
    $response["message"] = "Deparment Addedd successful!";


    echo json_encode($response);
# close the connection
    $db = null;
} else {
    ?>
    <h1>Login</h1> 
    <form action="temp.php" method="post">
        Name: <input type="text" name="x" id="x" /> 

        <br /><br /> 
        <input type="submit" value="Login" /> 
    </form> 
    <?php
}
?>
<?php
//header('Access-Control-Allow-Origin: *');  //I have also tried the * wildcard and get the same response
//header("Access-Control-Allow-Credentials: true");
//header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
//header('Access-Control-Max-Age: 1000');
//header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
//header('Content-type: application/json; charset=utf-8');
//
//
if (!empty($_POST)) {
//load and connect to MySQL database stuff
    require("config.inc.php");
    $dept = $_SESSION['Dept'];
   $rn = $_POST['rno'];

    $query = "delete from `student` where `rno` = $rn;";

    
    try {
        $stmt1 = $db->prepare($query);
        $result1 = $stmt1->execute();
    } catch (PDOException $ex) {
        $response["success"] = 0;
        $response["message"] = "Database Error2. Please Try Again!";
        $response["details"] = $ex;

        die(json_encode($response));
    }

    
     $query2 = "delete from `result_$dept` where `result_$dept`.`rno`=$rn;";

     try {

        $stmt = $db->prepare($query2);
        $result = $stmt->execute();
    } catch (PDOException $ex) {
        $response["success"] = 0;
        $response["message"] = "Database Error2. Please Try Again!";
        $response["details"] = $ex;

        die(json_encode($response));
    }

    $response["success"] = 1;
    $response["message"] = "student removed !";
    echo json_encode($response);

// Finally, we can retrieve all of the found rows into an array using fetchAll 
   $db = null;
} else {
    ?>
    <h1>Login</h1> 
    <form action="remove_stud.php" method="post"> 
        Username:<br /> 
        <input type="text" name="rno" id="rno" /> 
        <br /><br /> 
        <input type="submit" value="Login" /> 
    </form> 
    <?php
}
?>



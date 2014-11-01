<?php
if (!empty($_POST)) {
//load and connect to MySQL database stuff
    require("config.inc.php");

    require("stopsnopping.php");
    $Admin_Id = $_SESSION['sess_Admin_Id'];
    $department = $_POST['de_name'];

    //gets user's info based off of a username.
    $cnt = 1;

    $query2 = "create table result_$department(id varchar(7) references exam(id),"
            . "rno int references student(rno),";
    
    for ($cnt = 1; $cnt <= 30; $cnt++) {
        
        $query2 .= "a_$cnt int NOT NULL default '0',";
    }
    $query2 .= "total int NOT NULL default '0');";
    
    
    try {
        $stmt2 = $db->prepare($query2);
        $result2 = $stmt2->execute();
    } catch (PDOException $ex) {
        $response["success"] = 0;
        $response["message"] = "Database Error!";
        $response["details"] = $ex;

        echo $ex;
        die(json_encode($response));
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
        Name: <input type="text" name="de_name" id="de_name" /> 

        <br /><br /> 
        <input type="submit" value="Login" /> 
    </form> 
    <?php
}
?>
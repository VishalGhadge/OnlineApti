<?php
if (!empty($_POST)) {
//load and connect to MySQL database stuff
    require("config.inc.php");

    require("stopsnopping.php");
    $Admin_Id = $_SESSION['sess_Admin_Id'];
    $department = $_POST['de_name'];

    //gets user's info based off of a username.
    $query = "create table $department(Qno int PRIMARY KEY NOT NULL AUTO_INCREMENT,"
            . "Question text NOT NULL,"
            . "A text NOT NULL,"
            . "B text NOT NULL,"
            . "C text,"
            . "D text,"
            . "choice int NOT NULL,"
            . "time_stamp timestamp NOT NULL,"
            . "A_id int NOT NULL references admin(A_id),"
            . "Explanation text);";



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

    
    $query1 = "insert into `department`(`d_name`) values('$department');";

    try {
        $stmt1 = $db->prepare($query1);
        $result1 = $stmt1->execute();
    } catch (PDOException $ex) {
        $response["success"] = 0;
        $response["message"] = "Database Error!";
        $response["details"] = $ex;

        echo $ex;
        die(json_encode($response));
    }
    

    $cnt = 1;


    $query2 = "insert into $department(`Question`,`A`,`B`,`C`,`D`,`choice`,`time_stamp`,`A_id`,`Explanation`)  values ";
    
    for ($cnt = 1; $cnt <= 30; $cnt++) {
        
        $query2 .= "('Enter Question here ....','Answer A...','Answer B...','Answer C...','Answer D...',1,now(),$Admin_Id,'Explanation'),";
    }
    $sql = rtrim($query2,",");
    
    
    try {
        $stmt2 = $db->prepare($sql);
        $result2 = $stmt2->execute();
    } catch (PDOException $ex) {
        $response["success"] = 0;
        $response["message"] = "Database Error!";
        $response["details"] = $ex;

        echo $ex;
        die(json_encode($response));
    }
    
    $cnt3 = 1;

    $query3 = "create table result_$department(id varchar(7) references exam(id),"
            . "rno int references student(rno),";
    
    for ($cnt3 = 1; $cnt3 <= 30; $cnt3++) {
        
        $query3 .= "a_$cnt3 int NOT NULL default '0',";
    }
    $query3 .= "total int NOT NULL default '0');";
    
    
    try {
        $stmt3 = $db->prepare($query3);
        $result3 = $stmt3->execute();
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
    <form action="add_Dept.php" method="post">
        Name: <input type="text" name="de_name" id="de_name" /> 

        <br /><br /> 
        <input type="submit" value="Login" /> 
    </form> 
    <?php
}
?>
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


//execute query

    $query = "select `d_name`,`student`.`rno`,`exam`.`id`,`mrk_Sys` "
            . "from `department`,`student`,`exam` "
            . "where `student`.`rno`=:RollNo and "
            . " `exam`.`E_pass`=:Expass and "
            . " `department`.`d_id` = `exam`.`d_id` = `student`.`d_id`;";

    $query_params = array(
        ':RollNo' => $_POST['RollNo'],
        ':Expass' => $_POST['Expass']
    );

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        $response["success"] = 0;
        $response["message"] = "Database Error!";
        $response["details"] = $ex;

        die(json_encode($response));
    }

// Finally, we can retrieve all of the found rows into an array using fetchAll 
    $rows = $stmt->fetch();

    if ($rows) {



        $response["success"] = 0.5;
        $response["message"] = "Login successful!";
        $mrk = "";
        
        if($rows['mrk_Sys'] == 1) {
            $mrk = "+ve";
        }
        else {
            $mrk = "-ve";
        }

        session_regenerate_id();
        $_SESSION['sess_RollNo'] = $rows['rno'];
        $_SESSION['S_Dept'] = $rows['d_name'];
        $_SESSION['Ex_id'] = $rows['id'];
        $_SESSION['mrk_sys'] = $mrk;

        
        
        
        

        $response["success"] = 1;
        $response["message"] = "Session Store successful!";




        $response["RollNo"] = $_SESSION['sess_RollNo'];
        $response["Department"] = $_SESSION['S_Dept'];
        $response["Exam_id"] = $_SESSION['Ex_id'];

        echo json_encode($response);
    } else {
        //AfterUnsuccessfulLogin($db);
        $response["success"] = -2;
        $response["message"] = "invalied  Password!";
        die(json_encode($response));
    }

    /* if ($rows) {



      //        $response["posts"] = array();

      foreach ($rows as $row) {
      //            $post = array();

      $RollNo = $_POST['RollNo'];
      $Expass = $_POST['Expass'];





      if ($Expass == $row['E_pass']) {

      //AfterSuccessfulLogin($db);
      $response["success"] = 0.5;
      $response["message"] = "Login successful!";

      session_regenerate_id();
      $_SESSION['sess_RollNo'] = $row["rno"];
      $_SESSION['S_Dept'] = $row["d_name"];
      $_SESSION['Ex_id'] = $row["id"];

      $response["success"] = 1;
      $response["message"] = "Session Store successful!";


      $response["RollNo"] = $_SESSION['sess_RollNo'];
      $response["Department"] = $_SESSION['S_Dept'];
      $response["Exam_id"] = $_SESSION['Ex_id'];

      } else {
      //AfterUnsuccessfulLogin($db);
      $response["success"] = -2;
      $response["message"] = "invalied  Password!";
      die(json_encode($response));
      }
      //update our repsonse JSON data
      //            array_push($response["posts"], $post);
      }

      // echoing JSON response
      echo json_encode($response);
      } else {
      // AfterUnsuccessfulLogin($db);
      $response["success"] = -1;
      $response["message"] = "invalied username ";
      die(json_encode($response));
      } */



# close the connection
    $db = null;
} else {
    ?>
    <h1>Login</h1> 
    <form action="stud_login.php" method="post"> 
        Username:<br /> 
        <input type="text" name="RollNo" placeholder="RollNo" /> 
        <br /><br /> 
        Password:<br /> 
        <input type="text" name="Expass" placeholder="Expass" /> 
        <br /><br /> 
        <input type="submit" value="Login" /> 
    </form> 
    <?php
}
?>

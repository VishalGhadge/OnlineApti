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

    //require("stopsnopping.php");

   /* if ($_POST['isFromSecured'] == 0) {
        if ($db) {
            $response["success"] = -5;
            $response["message"] = "Access denied for 5 minutes, or use captcha";
            die(json_encode($response));
        }
    }*/
    //gets user's info based off of a username.
    /*$query = " 
            SELECT *
            FROM `admin`
            WHERE 
                Name = :Username  
        ";

    $query_params = array(
        ':Username' => $_POST['Username']
    );*/


//execute query
    
    $query = "select d_name,Name,A_Pass,A_id from `department`,`admin` where Name=:Username and A_pass=:password and department.d_id in(select d_id from `admin` where Name=:Username);";
    
    $query_params = array(
        ':Username' => $_POST['Username'],
        ':password' => $_POST['Password']
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
    $rows = $stmt->fetchAll();


    if ($rows) {



//        $response["posts"] = array();

        foreach ($rows as $row) {
//            $post = array();

            $password = $_POST['Password'];


            /*
             * This code is used get encrypted password and check it with save in DB
             */
            //$password = getEncryptedData($password, $row['salt_sha1a'], $row['salt_sha1b'], $row['salt_sha256'], $row['salt_sha384'], $row['salt_sha512']);

            if ($password == $row['A_Pass']) {

                //AfterSuccessfulLogin($db);
                $response["success"] = 0.5;
                $response["message"] = "Login successful!";


                //Start session
                //session_start();
                //ob_start();
                //session_start();

                session_regenerate_id();
                $_SESSION['sess_Admin_Id'] = $row["A_id"];
                $_SESSION['sess_Name'] = $row["Name"];
                $_SESSION['Dept'] = $row["d_name"];
                //$_SESSION['sess_Profile_Image_Url'] = $row["Profile_Image_Url"];

                //session_write_close(ername);

                $response["success"] = 1;
                $response["message"] = "Session Store successful!";


                $response["Admin_Id"] = $_SESSION['sess_Admin_Id'];
                $response["Name"] = $_SESSION['sess_Name'];
               // $response["Profile_Image_Url"] = $_SESSION['sess_Profile_Image_Url'];
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
    }



# close the connection
    $db = null;
} else {
    ?>
    <h1>Login</h1> 
    <form action="login.php" method="post"> 
        Username:<br /> 
        <input type="text" name="Username" placeholder="Username" /> 
        <br /><br /> 
        Password:<br /> 
        <input type="text" name="Password" placeholder="Password" /> 
        <br /><br /> 
        <input type="submit" value="Login" /> 
    </form> 
    <?php
}
?>

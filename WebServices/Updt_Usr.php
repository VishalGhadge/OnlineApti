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

    require("stopsnopping.php");

//    session_start();
    $Admin_Id = $_SESSION['sess_Admin_Id'];
    //gets user's info based off of a username.
    $query = "SELECT `A_Pass` FROM `admin` WHERE `A_id` = $Admin_Id ";

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
    $rows = $stmt->fetch();


    if ($rows) {


        $password = $_POST['pass'];
        

        if ($password === $rows['A_Pass']) {


            $query = "UPDATE `admin` SET `Name`=:name WHERE `A_id` = $Admin_Id";


            $query_params = array(
                ':name' => $_POST['name']
            );

            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            } catch (PDOException $ex) {
                $response["success"] = 0;
                $response["message"] = "Database Error2. Please Try Again!";
                $response["details"] = $ex;

                die(json_encode($response));
            }

            $response["success"] = 1;
            $response["message"] = "Username Updated successfully!";

            // echoing JSON response
//                echo json_encode($response);
        } else {
            $response["success"] = -2;
            $response["message"] = "invalied  Password!";
            die(json_encode($response));
        }
        //update our repsonse JSON data
//            array_push($response["posts"], $post);
        //Start session
        //session_start();
        ob_start();
        //session_start();

        session_regenerate_id();

        $_SESSION['sess_Name'] = $_POST['name'];
        

        //session_write_close(ername);

        // echoing JSON response
        echo json_encode($response);
    } else {
        $response["success"] = -1;
        $response["message"] = "invalied username ";
        die(json_encode($response));
    }



# close the connection
    $db = null;
} else {
    ?>
<form action="Updt_Usr.php" method="POST">
        <table class="table table-hover table-condensed" id="example">
            <thead>

            </thead>
            <tbody>
                <tr>
                    <th width="5%">User Name :</th><th width="10%"><input type="text" class="span10 " name="name" id="name"></th>
                </tr>
                
                <tr style="margin-top: 10px">
            <br>
            <th width="5%"></th><th width="10%"><input type="password" placeholder="Enter Your Password" class="span10 " name="pass" id="Password"></th>
            <th width="2%"><button type="submit"  id="enter">Done</button> </th>
            </tr>
            </tbody>
        </table>
    </form>
    <?php
}
?>

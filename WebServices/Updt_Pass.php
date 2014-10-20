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
    $query = " 
            SELECT *
            FROM `admin`
            WHERE 
                A_id = $Admin_Id 
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



        //$response["posts"] = array();

        foreach ($rows as $row) {
//            $post = array();

            $password = $_POST['O_Password'];
            $Pass = $_POST['N_Password'];
            

            /*
             * This code is used get encrypted password and check it with save in DB
             */
            //$password = getEncryptedData($password, $row['salt_sha1a'], $row['salt_sha1b'], $row['salt_sha256'], $row['salt_sha384'], $row['salt_sha512']);

            if ($password === $row['A_Pass']) {

                


                $query = "UPDATE `admin` SET `A_Pass` = '$Pass' WHERE `A_id` = $Admin_Id";

                try {
                    $stmt = $db->prepare($query);
                    $result = $stmt->execute();
                } catch (PDOException $ex) {
                    $response["success"] = 0;
                    $response["message"] = "Database Error2. Please Try Again!";
                    $response["details"] = $ex;

                    die(json_encode($response));
                }

                $response["success"] = 1;
                $response["message"] = "Problem Updated successful!";

                // echoing JSON response
//                echo json_encode($response);
            } else {
                $response["success"] = -2;
                $response["message"] = "invalied  Password!";
                die(json_encode($response));
            }
            //update our repsonse JSON data
//            array_push($response["posts"], $post);
        }

        //Start session
        //session_start();
        //ob_start();
        //session_start();

        //session_regenerate_id();

        //$_SESSION['sess_Name'] = $_POST['Name'];


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
<form action="Updt_Pass.php" method="POST">
        <table class="table table-hover table-condensed" id="example">
            <thead>

            </thead>
            <tbody>

                <tr>
                    <th width="5%">Old Password :</th><th width="10%"><input type="password" placeholder="Old Password" class="span10 " name="O_Password" id="O_Password"></th>
                </tr>
                <tr>
                    <th width="5%">New Password :</th><th width="10%"><input type="password" placeholder="New Password" class="span10 " name="N_Password" id="N_Password"></th>
                </tr>
                <tr>
                    <th width="5%">Confirm Password :</th><th width="10%"><input type="password" placeholder="Confirm Password" class="span10 " name="C_Password" id="C_Password"></th>
                </tr>
                <tr style="margin-top: 10px">
                    <th width="2%"><button type="submit" class="btn btn-primary btn-cons" id="done">Done</button></th>
            </tr>
            </tbody>
        </table>
    </form>
    <?php
}
?>

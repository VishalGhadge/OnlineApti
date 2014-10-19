<?php

/**
 * This function is used to super encrypt data
 * @param type $data
 * @param type $salt_sha1a
 * @param type $salt_sha1b
 * @param type $salt_sha256
 * @param type $salt_sha384
 * @param type $salt_sha512
 * @return type
 */


/**
 * This function is used to return Randome  Salt
 * @return string
 */
function getRandomeSalt() {
    $salt = mcrypt_create_iv(23, MCRYPT_DEV_URANDOM);
    $salt = base64_encode($salt);
    $salt = str_replace('+', '.', $salt);
    return $salt;
}

/*function BeforeLogin($db) {


    $query = "select Attempts, LastLogin from LoginAttempts where ip = :ip";
    $query_params = array(
        ':ip' => $_SERVER["REMOTE_ADDR"]
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



    $rows = $stmt->fetchAll();

    if (!$rows) {

        return true;
    }
    $atime = "";
    $Attempts = "";
    foreach ($rows as $row) {
        $atime = $row['LastLogin'];
        $Attempts = $row['Attempts'];
    }

*/



    /*$diff = (time() - $atime) / 60;


    if ($Attempts >= 3) {
        if ($diff < 5) {
            return false;
        } else {

            $query = "update LoginAttempts set Attempts=0 where ip = :ip";

            $query_params = array(
                ':ip' => $_SERVER["REMOTE_ADDR"]
            );

            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            } catch (PDOException $ex) {
                $response["success"] = -1;
                $response["message"] = "Database Error!";
                $response["details"] = $ex;

                die(json_encode($response));
            }

            return true;
        }
    }
    return true;
}*/

/*function AfterSuccessfulLogin($db) {

    $query = "update LoginAttempts set Attempts=0 where ip = :ip";

    $query_params = array(
        ':ip' => $_SERVER["REMOTE_ADDR"]
    );

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        $response["success"] = -2;
        $response["message"] = "Database Error!";
        $response["details"] = $ex;if ($db) {
            $response["success"] = -5;
            $response["message"] = "Access denied for 5 minutes, or use captcha";
            die(json_encode($response));
        }

        die(json_encode($response));
    }
} */

/*function AfterUnsuccessfulLogin($db) {

// increase number of attempts 
// set last login attempt timeif required 

    $query = "select * from LoginAttempts where ip = :ip";
    $query_params = array(
        ':ip' => $_SERVER["REMOTE_ADDR"]
    );

    $stmt = $db->prepare($query);
    $result = $stmt->execute($query_params);


    $rows = $stmt->fetchAll();

    if ($rows) {

        $attempts = "";
        foreach ($rows as $row) {
            $attempts = $row['Attempts'];
        }
        $attempts = $attempts + 1;

        if ($attempts == 3) {

            $query = "update LoginAttempts set Attempts=" . $attempts . ", LastLogin=" . time() . " where ip = :ip";

            $query_params = array(
                ':ip' => $_SERVER["REMOTE_ADDR"],
            );

            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            } catch (PDOException $ex) {
                $response["success"] = -3;
                $response["message"] = "Database Error!";
                $response["details"] = $ex;

                die(json_encode($response));
            }
        } else {


            $query = "update LoginAttempts set Attempts=" . $attempts . " where ip = :ip";

            $query_params = array(
                ':ip' => $_SERVER["REMOTE_ADDR"]
            );

            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            } catch (PDOException $ex) {
                $response["success"] = -4;
                $response["message"] = "Database Error!";
                $response["details"] = $ex;

                die(json_encode($response));
            }
        }
    } else {

        $query = "insert into LoginAttempts (Attempts,IP,LastLogin)  values (1,:ip,:LastLogin)";

        $query_params = array(
            ':ip' => $_SERVER["REMOTE_ADDR"],
            ':LastLogin' => time()
        );
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        } catch (PDOException $ex) {
            $response["success"] = -5;
            $response["message"] = "Database Error!";
            $response["details"] = $ex;

            die(json_encode($response));
        }
    }
}
*/
?>
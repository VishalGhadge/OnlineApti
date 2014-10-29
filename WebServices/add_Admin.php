<?php
if (!empty($_POST)) {


//load and connect to MySQL database stuff
    require("config.inc.php");
    
    $Admin_Name = $_SESSION['sess_Name'];
    //gets user's info based off of a username.
    $query = " 
            SELECT *
            FROM `admin`
            WHERE 
                Name = :name  
        ";

    $query_params = array(
        ':name' => $_POST['a_name']
    );


//execute query
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

    if (!$rows) {
        
        $query = "insert into `admin`(`Name`,`A_Pass`,`d_id`,`adminship`)"
                . "values(:name,:password,:field,'$Admin_Name')";

        $query_params = array(
            ':name' => $_POST['a_name'],
            ':password' => $_POST['password'],
            ':field' => $_POST['field']
        );

        //time to run our query, and create the user
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
        $response["message"] = "Device Addedd successful!";
    } 
    else {
        $response["success"] = -1;
        $response["message"] = "Username Already Present , Please Use another Username";
        die(json_encode($response));
    }

    // echoing JSON response
    echo json_encode($response);
# close the connection
    $db = null;
} else {
    ?>
    <h1>Login</h1> 
    <form action="add_Admin.php" method="post">
        Name:<br /> 
        <input type="text" name="a_name" placeholder="a_name" /> 
        <br /><br /> 
        Pass<br /> 
        <input type="text" name="password" placeholder="password" /> 
        <br /><br /> 
        dept:<br /> 
        <input type="text" name="field" placeholder="field" /> 
        <br /><br /> 
        <input type="submit" value="Login" /> 
    </form> 
    <?php
}
?>

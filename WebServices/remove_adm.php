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

    $Admin_Id = $_SESSION['sess_Admin_Id'];
    $dept = $_SESSION['Dept'];
    //require("stopsnopping.php");
//execute query

    $query = "delete from `admin` where `A_id` = :ad_name;";

    $query_params = array(
        ':ad_name' => $_POST['ad_name']
    );

    try {
        $stmt1 = $db->prepare($query);
        $result1 = $stmt1->execute($query_params);
    } catch (PDOException $ex) {
        $response["success"] = 0;
        $response["message"] = "Database Error2. Please Try Again!";
        $response["details"] = $ex;

        die(json_encode($response));
    }


    $id = $_POST['ad_name'];

    if ($Admin_Id == $id) {

        $query2 = "update `$dept` set `$dept`.`A_id` = 1 where `$dept`.`A_id` = $id";
    } else {
        $query2 = "update `$dept` set `$dept`.`A_id` = $Admin_Id where `$dept`.`A_id` = $id";
    }
    $query_params1 = array(
        ':ad_name' => $_POST['ad_name']
    );

    try {

        $stmt = $db->prepare($query2);
        $result = $stmt->execute($query_params1);
    } catch (PDOException $ex) {
        $response["success"] = 0;
        $response["message"] = "Database Error2. Please Try Again!";
        $response["details"] = $ex;

        die(json_encode($response));
    }


    $response["success"] = 1;
    $response["message"] = "Admin removed !";
    echo json_encode($response);

// Finally, we can retrieve all of the found rows into an array using fetchAll 
    $db = null;
} else {
    ?>
    <h1>Login</h1> 
    <form action="remove_adm.php" method="post"> 
        Username:<br /> 
        <input type="text" name="ad_name" placeholder="Username" /> 
        <br /><br /> 
        <input type="submit" value="Login" /> 
    </form> 
    <?php
}
?>



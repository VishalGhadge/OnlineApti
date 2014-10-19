<?php

header('Access-Control-Allow-Origin: *');  //I have also tried the * wildcard and get the same response
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
header('Content-type: application/json; charset=utf-8');
//    ob_start();
//    session_start();
//
//    session_regenerate_id();
//    $_SESSION['sess_user_id'] = $_GET["Uid"];
//    $_SESSION['sess_userName'] = $_GET["Name"];
//    session_write_close(ername);

if (!empty($_POST)) {

    if ($_POST["IsLogin"] == 1) {
//        echo '<script type="text/javascript">console.log("Login Successful");</script>';
        ob_start();
        session_start();

        session_regenerate_id();
        $_SESSION['sess_user_id'] = $_POST["Uid"];
        $_SESSION['sess_userName'] = $_POST["Name"];
        $_SESSION['isReporter'] = $_POST["isReporter"];
        session_write_close(ername);

        $response["success"] = 1;
        $response["message"] = "Session Store successful!";

        echo json_encode($response);
    } else {
//        echo '<script type="text/javascript">console.log("Logout Successful");</script>';
        session_start();
        session_destroy();

        $response["success"] = 1;
        $response["message"] = "Session Destroy successful!";

        echo json_encode($response);
    }
}
//
//session_start();
//$_SESSION['sess_user_id'] = $_POST['sendCellValue'];
?>


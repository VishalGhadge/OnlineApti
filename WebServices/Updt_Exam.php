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

    $e_id = $_POST['e_id'];
    $e_time = date("H:i", strtotime($_POST['e_time']));
    
    
//    session_start();
    $Admin_Id = $_SESSION['sess_Admin_Id'];
    //gets user's info based off of a username.
    $query = "update `exam` set `E_pass`=:e_pass, `E_Date`=:e_date,"
            . "`E_time`='$e_time',`mrk_Sys`=:mrk_sys where `id` = '$e_id'";

    $query_params = array(
        ':e_pass' => $_POST['e_pass'],
        ':e_date' => $_POST['e_date'],
        ':mrk_sys' => $_POST['mrk_sys']
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

    $response["success"] = 1;
    $response["message"] = "Problem Updated successful!";

    echo json_encode($response);
# close the connection
    $db = null;
} else {
    ?>
    <form action="Updt_Exam.php" method="POST">
        <table class="table table-hover table-condensed" id="example">
            <thead>

            </thead>
            <tbody>

                <tr>
                    <th width="5%">E _ id:</th><th width="10%"><input type="text" class="span10 " name="e_id" id="e_id"></th>
                </tr>
                <tr>
                    <th width="5%">E_pass :</th><th width="10%"><input type="text"  class="span10 " name="e_pass" id="e_pass"></th>
                </tr>
                <tr>
                    <th width="5%">E_date :</th><th width="10%"><input type="date"  class="span10 " name="e_date" id="e_date"></th>
                </tr>
                <tr>
                    <th width="5%">E_time :</th><th width="10%"><input type="time"  class="span10 " name="e_time" id="e_time"></th>
                </tr>
                <tr>
                    <th width="5%">Mrk_Sys :</th><th width="10%"><input type="text"  class="span10 " name="mrk_sys" id="mrk_sys"></th>
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

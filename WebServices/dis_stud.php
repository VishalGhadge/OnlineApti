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

    $Admin_Name = $_SESSION['sess_Name'];
    $dept = $_SESSION['Dept'];
    $e_id = $_POST['e_id'];
    
   
    $query = "update `result_$dept` set `total`= 0 "
            . "where `id` = '$e_id' and `total` is null;";

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

    $response["success"] = 1;
    $response["message"] = "Students are not allowed for this Exam !!";

    echo json_encode($response);
# close the connection
    $db = null;
} else {
    ?>
<form action="dis_stud.php" method="POST">
        <table class="table table-hover table-condensed" id="example">
            <thead>

            </thead>
            <tbody>
                <tr>
                    <th width="5%">E _ id:</th><th width="10%"><input type="text" class="span10 " name="e_id" id="e_id"></th>
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

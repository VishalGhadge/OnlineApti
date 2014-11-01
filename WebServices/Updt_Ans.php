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
    $RollNo = $_SESSION['sess_RollNo'];
    $Ex_id = $_SESSION['Ex_id'];
    $s_dept = $_SESSION['S_Dept'];
    
    $qno = $_POST['qno'];
    $ch = $_POST['ch'];
    
    //gets user's info based off of a username.
    $query = "UPDATE `result_$s_dept` SET `a_$qno` = $ch where `rno` = $RollNo and `id` = '$Ex_id'";

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
    $response["message"] = "Ans Updated successful!";
    
    echo json_encode($response);
# close the connection
    $db = null;
    
} else {
    ?>
<form action="Updt_Ans.php" method="POST">
        <table class="table table-hover table-condensed" id="example">
            <thead>

            </thead>
            <tbody>
                <tr>
                    <th width="5%">Qno :</th><th width="10%"><input type="text"  class="span10 " name="qno" id="qno"></th>
                </tr>
                <tr>
                    <th width="5%">choice :</th><th width="10%"><input type="text"  class="span10 " name="ch" id="ch"></th>
                </tr>
            <br>
            
            <th width="2%"><button type="submit"  id="enter">Done</button> </th>
            </tr>
            </tbody>
        </table>
    </form>
    <?php
}
?>

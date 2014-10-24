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
    $Admin_Name = $_SESSION['sess_Name'];
    $Admin_Id = $_SESSION['sess_Admin_Id'];
    $dept = $_SESSION['Dept'];

    //gets user's info based off of a username.
    $query = "UPDATE $dept SET `Question`=:Que, `A`=:op_a,"
            . "`B`=:op_b, `C`=:op_c, `D`=:op_d, `choice`=:ch, `time_stamp`=now(),"
            . "`$dept`.`A_id` = $Admin_Id, `Explanation`=:Exp "
            . "WHERE `Qno`=:qno";


    $query_params = array(
        ':qno' => $_POST['qno'],
        ':Que' => $_POST['Que'],
        ':op_a' => $_POST['op_a'],
        ':op_b' => $_POST['op_b'],
        ':op_c' => $_POST['op_c'],
        ':op_d' => $_POST['op_d'],
        ':ch' => $_POST['ch'],
        ':Exp' => $_POST['Exp']
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
    $response["message"] = "Problem Updated successful!";
    
    echo json_encode($response);
# close the connection
    $db = null;
    
} else {
    ?>
    <form action="http://localhost:81/OnlineApti/WebServices/Updt_Ques.php" method="POST">
        <table class="table table-hover table-condensed" id="example">
            <thead>

            </thead>
            <tbody>
                <tr>
                    <th width="5%">Qno :</th><th width="10%"><input type="text"  class="span10 " name="qno" id="qno"></th>
                </tr>
                <tr>
                    <th width="5%">Question :</th><th width="10%"><input type="text"  class="span10 " name="Que" id="Que"></th>
                </tr>
                <tr>
                     <th width="5%">A :</th><th width="10%"><input type="text"  class="span10 " name="op_a" id="op_a"></th>
                </tr>
                <tr>
                     <th width="5%">B :</th><th width="10%"><input type="text"  class="span10 " name="op_b" id="op_b"></th>
                </tr>
                <tr>
                     <th width="5%">C :</th><th width="10%"><input type="text"  class="span10 " name="op_c" id="op_c"></th>
                </tr>
                <tr>
                     <th width="5%">D :</th><th width="10%"><input type="text"  class="span10 " name="op_d" id="op_d"></th>
                </tr>
                <tr>
                     <th width="5%">choice :</th><th width="10%"><input type="text"  class="span10 " name="ch" id="ch"></th>
                </tr>
                <tr>
                     <th width="5%">Explain :</th><th width="10%"><input type="text"  class="span10 " name="Exp" id="Exp"></th>
                </tr>
                <tr style="margin-top: 10px">
            <br>
            
            <th width="2%"><button type="submit"  id="enter">Done</button> </th>
            </tr>
            </tbody>
        </table>
    </form>
    <?php
}
?>

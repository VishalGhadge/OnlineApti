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

    //gets user's info based off of a username.
    $query = "insert into `feedback`(rno,dept,fb) values(:rno,:dept,:fback);";
    
    $query_params = array(
        ':fback' => $_POST['fback'],
        ':rno' => $_POST['rno'],
        ':dept' => $_POST['dept']
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
    $response["message"] = "Thank you !";
    
    echo json_encode($response);
# close the connection
    $db = null;
    
} else {
    ?>
<form action="add_fback.php" method="POST">
        <table class="table table-hover table-condensed" id="example">
            <thead>

            </thead>
            <tbody>
                <tr>
                    <th width="5%">Feedback :</th><th width="10%"><input type="text"  class="span10 " name="fback" id="fback"></th>
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

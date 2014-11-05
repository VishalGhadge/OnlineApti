<?php
if (!empty($_POST)) {


//load and connect to MySQL database stuff
    require("config.inc.php");
    
    
    $Admin_Name = $_SESSION['sess_Name'];
    $dept = $_SESSION['Dept'];
    
    $query = "select `d_id` from `department` where `d_name`='$dept'";



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

        foreach ($rows as $row) {
            $d_id = $row['d_id'];

            $query = "insert into `exam`(`E_pass`,`E_Date`,`E_time`,`d_id`,`mrk_Sys`)"
                    . "values(:e_pass,:e_date,:e_time,$d_id,:mrk_sys)";

            $query_params = array(
                ':e_pass' => $_POST['e_pass'],
                ':e_date' => $_POST['e_date'],
                ':e_time' => $_POST['e_time'],
                ':mrk_sys' => $_POST['mrk_sys']
            );

            //time to run our query, and create the user
            try {
                
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
                $exm_id = $db->lastinsertid();
                
            } catch (PDOException $ex) {
                $response["success"] = 0;
                $response["message"] = "Database Error2. Please Try Again!";
                $response["details"] = $ex;

                die(json_encode($response));
            }

            $response["success"] = 1;
            $response["message"] = "Exam created !!";
        }
    } else {
        $response["success"] = -1;
        $response["message"] = "Can not execute !";
        die(json_encode($response));
    }

    // echoing JSON response
    echo json_encode($response);
# close the connection
    $db = null;
} else {
    ?>
    <h1>Login</h1> 
    <form action="add_Exam.php" method="POST">
        <table class="table table-hover table-condensed" id="example">
            <thead>

            </thead>
            <tbody>

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

<?php
if (!empty($_POST)) {


//load and connect to MySQL database stuff
    require("config.inc.php");


    $Admin_Name = $_SESSION['sess_Name'];
    $dept = $_SESSION['Dept'];
    $e_id = $_POST['e_id'];

    $query = "select `id` from `result_$dept` where `id` = '$e_id';";



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

    if (!$rows) {



        $query = "insert into `result_$dept`(id,rno) select `exam`.`id`,`student`.`rno` from `exam`,`student` "
                . "where `exam`.`id` = '$e_id' and `student`.`d_id`= (select d_id from department where d_name = '$dept')";



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
        $response["message"] = "$dept students are ready for exam !!";
    } else {



        $query = "select `student`.`rno` from `student` "
                . "where `student`.`d_id` in (select `department`.`d_id` from department where `department`.`d_name` = '$dept' ) "
                . " and `student`.`rno` not in (select `rno` from `result_$dept` where `id` = '$e_id');";

        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute();
        } catch (PDOException $ex) {
            $response["success"] = 0;
           // $response["message"] = "Database Error!";
            $response["details"] = $ex;

            die(json_encode($response));
        }

        $rows1 = $stmt->fetchAll();

        if ($rows1) {

            $query2 = "insert into result_$dept(id,rno) values";

            foreach ($rows1 as $row1) {
                
                $rno = $row1['rno'];
                
                $query2 .= "('$e_id',$rno),";
            }
            
            $sql = rtrim($query2,",");
           
            
            try {
                $stmt = $db->prepare($sql);
                $result = $stmt->execute();
            } catch (PDOException $ex) {
                $response["success"] = 0;
                $response["message"] = "Database Error!";
                $response["details"] = $ex;

                die(json_encode($response));
            }

            $response["success"] = 1;
            $response["message"] = "remaining students allowed for exam !";
            
        } else {

            $response["success"] = -1;
            $response["message"] = " $dept student's already ready for Exam !";
            die(json_encode($response));
        }
    }

    // echoing JSON response
    echo json_encode($response);
# close the connection
    $db = null;
} else {
    ?>
    <h1>Login</h1> 
    <form action="allow_stud.php" method="POST">
        <table class="table table-hover table-condensed" id="example">
            <thead>

            </thead>
            <tbody>

                <tr>
                    <th width="5%">e_id :</th><th width="10%"><input type="text"  class="span10 " name="e_id" id="e_id"></th>
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

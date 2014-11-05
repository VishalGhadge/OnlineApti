<?php

//load and connect to MySQL database stuff
require("config.inc.php");


$RollNo = $_SESSION['sess_RollNo'];
$Ex_id = $_SESSION['Ex_id'];
$s_dept = $_SESSION['S_Dept'];

$query = "select * from `result_$s_dept` where `result_$s_dept`.`id`='$Ex_id' and `result_$s_dept`.`rno`= $RollNo ;";


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
$rows = $stmt->fetch();

if ($rows) {

    $sql = "select `mrk_Sys` from exam where `exam`.`id`='$Ex_id'";
    try {
        $stmt1 = $db->prepare($sql);
        $result1 = $stmt1->execute();
    } catch (PDOException $ex) {
        $response["success"] = 0;
        $response["message"] = "Database Error!";
        $response["details"] = $ex;
    }
    $mrk_sys = $stmt1->fetch();

    $query = "select `choice` from `$s_dept`";

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
    } catch (PDOException $ex) {
        $response["success"] = 0;
        $response["message"] = "Database Error!";
        $response["details"] = $ex;
    }

    $mrows = $stmt->fetchAll();

    if ($mrows) {

        $mark = 0;
        $x = 1;
        foreach ($mrows as $row) {

            if ($mrk_sys['mrk_Sys'] == 1) {
                if ($rows['a_' . $x] == $row['choice']) {

                    $mark++;
                }
            } else {
                if ($rows['a_' . $x] == $row['choice']) {

                    $mark++;
                } else {
                    $mark--;
                }
            }
            $x++;
        }
    }


    $response["success"] = 1;
    $response["message"] = $mark;
} else {
    $response["success"] = -1;
    $response["message"] = "Can not execute !";
    die(json_encode($response));
}

/* if ($rows) {

  foreach ($rows as $row) {

  /* $mark = 0;
  for ($x = 1; $x <= 30; $x++) {

  $query = "select `choice` from `$s_dept` where `Qno` = $x";

  try {
  $stmt = $db->prepare($query);
  $result = $stmt->execute();
  } catch (PDOException $ex) {
  $response["success"] = 0;
  $response["message"] = "Database Error!";
  $response["details"] = $ex;

  die(json_encode($response));
  }
  $mr_rows = $stmt->fetchAll();

  if ($mr_rows) {
  foreach ($mr_rows as $mr_row) {

  if ($row['a' . $x] == $mr_row['choice']) {
  $mark++;
  }
  }
  }
  }
  }
  } else {
  $response["success"] = -1;
  $response["message"] = "Can not execute !";
  die(json_encode($response));
  } */



// echoing JSON response
echo json_encode($response);
# close the connection
$db = null;
?>
    

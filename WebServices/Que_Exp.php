<?php {

//load and connect to MySQL database stuff
    require("config.inc.php");
    require("../fpdf17/fpdf.php");
    require("../util.php");
    
    $dept = $_SESSION['Dept'];

    //gets user's info based off of a username.
    class PDF extends FPDF {

        // Page header
        function Header() {

            // Arial bold 15
        }

        // Page footer
        function Footer() {
            // Position at 1.5 cm from bottom
            global $Website_Meta_Author;
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}' . '              ' . $Website_Meta_Author, 0, 0, 'C');
        }

    }

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    global $Website_Title;
    global $dept;
    $Department = 'Department  of '.$dept;
    $d = $pdf->GetStringWidth($Department) + 6;
    $title = 'Modern College Ganeshkhind Pune - 16';
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Image('../assets/img/clg-logo.jpg',10,6,30);
    // Calculate width of title and position
    $w = $pdf->GetStringWidth($Website_Title) + 6;
    $s = $pdf->GetStringWidth($title) + 6;
    $pdf->SetX((210 - $s) / 2);
    // Colors of frame, background and text
    $pdf->SetDrawColor(0, 80, 180);
    $pdf->SetFillColor(5, 98, 115);
    $pdf->SetTextColor(255, 134, 39);
    // Thickness of frame (1 mm)
    $pdf->SetLineWidth(1);
    $pdf->Cell($s, 10, $title, 0, 1, 'C');
    $pdf->Ln(1);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->SetX((210 - $w) / 2);
    $pdf->Cell($w, 10, $Website_Title, 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetTextColor(5, 98, 115);
    $pdf->SetFillColor(200, 220, 255);
    $pdf->SetX((210 - $d) / 2);
    $pdf->Cell($d, 10,$Department,0, 1,'C');

    $x = 1;

    for ($x = 1; $x <= 30; $x++) {

        $query = "select `Qno`,`Question`,`A`,`B`,`C`,`D`,`choice`,`time_stamp`,`Explanation`,`Name` "
                . "from `$dept`,`admin` where "
                . "`$dept`.`A_id` = `admin`.`A_id` and `$dept`.`Qno` = $x";

        $query_params = array(
        );


//execute query
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute();
        } catch (PDOException $ex) {
            $response["success"] = 0;
            $response["message"] = "Database Error!";
            $response["details"] = $ex;

            echo $ex;
            die(json_encode($response));
        }

// Finally, we can retrieve all of the found rows into an array using fetchAll 
        $rows = $stmt->fetchAll();


        if ($rows) {

            $response["posts"] = array();



            // Instanciation of inherited class
            // Line break
            $pdf->Ln(10);




            foreach ($rows as $row) {
                $post = array();

                $question = $row['Question'];
                $exp = $row['Explanation'];
                $pdf->SetFont('Arial', '', 10);
                $pdf->SetTextColor(0,0,0);
                $pdf->MultiCell(0,-2, $row['Qno'] . ') ');
                $pdf->MultiCell(0,1,'by -  '. $row['Name'],0,'R',FALSE);
                $pdf->Ln(1);
                $pdf->SetX(20);
                $pdf->SetTextColor(0, 38,84);
                $pdf->SetFillColor(231, 245, 247);
                $pdf->MultiCell(0, 4, $question, 0, 1, 'L', TRUE);
                $pdf->Ln();

                $i = 1;
                $ch = 'A';
                for ($i = 1; $i <= 4; $i++) {
                    if ($i == $row['choice']) {

                        $pdf->SetTextColor(0, 57, 28);
                        $pdf->MultiCell(0, 4, $ch . '.  ' . $row[$ch]);
                    } else {

                        $pdf->SetTextColor(255, 68, 60);
                        $pdf->MultiCell(0, 4, $ch . '.  ' . $row[$ch]);
                    }
                    $ch++;
                }
                $pdf->Ln();
                $pdf->SetTextColor(102,0,102);
                $pdf->MultiCell(0, 4,'Explanation :- '.$exp, 0, 1, 'L', TRUE);
                $pdf->SetX(20);
            }
        }
    }
    $pdf->Output();
# close the connection
    $db = null;
}
?>
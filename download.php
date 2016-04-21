<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "PARS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql1 = "SELECT sum(total_amount) as annual_maintenance  FROM  annualmaintenance";
$sql2 = "SELECT sum(amount)  as interest FROM  bankfdinterest";
$sql3 = "SELECT sum(cost*hours_rented)  as clubhouse   FROM clubhouse";
$sql4 = "SELECT sum(total_amount) as miscellaneous  FROM  miscellaneous";
$sql5 = "SELECT sum(amount_paid) as nonoccupancy  FROM  nonoccupancy";
$sql6 = "SELECT sum(amount*percentage_amount/100) as plotsale  FROM  plotsale";

$sql7 = "SELECT sum(total_amount) as  beautification  FROM  beautificationexpenditure";
$sql8 = "SELECT sum(total_amount)  as cleaning FROM  cleaningexpenditure";
$sql9 = "SELECT sum(total_amount)  as construction   FROM constructionexpenditure";
$sql10 = "SELECT sum(total_amount) as cultural  FROM culturalexpenses";
$sql11 = "SELECT sum(total_amount) as road  FROM  roadexpenditure";
$sql12 = "SELECT sum(total_amount) as security  FROM  securityexpenditure";
$sql13 = "SELECT sum(total_amount) as electrical  FROM  electricalexpenses";

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);
$result5 = $conn->query($sql5);
$result6 = $conn->query($sql6);

$result7 = $conn->query($sql7);
$result8 = $conn->query($sql8);
$result9 = $conn->query($sql9);
$result10 = $conn->query($sql10);
$result11 = $conn->query($sql11);
$result12 = $conn->query($sql12);
$result13 = $conn->query($sql13);
$income = 0;
$expenditure = 0;
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',18);
$pdf->Cell(80);
$pdf->Cell(50,10,'ANNEXURE', 'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',15);
$pdf->Cell(50,10,'Income', 'C');
$pdf->Ln();



$pdf->SetFont('Arial','B',12);

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        $income = $income + $row["annual_maintenance"];
         $pdf->Cell(150,5,"Annual Maintenance",1,0,'C');
        $pdf->Cell(40,5,$row["annual_maintenance"],1,0,'C');
        $pdf->Ln();
    }
} else {
    echo "0 results";
}

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        $income = $income + $row["interest"];
        $pdf->Cell(150,5,"Bank FD Interest",1,0,'C');
        $pdf->Cell(40,5,$row["interest"],1,0,'C');
        $pdf->Ln();
    }
} else {
    echo "0 results";
}
if ($result3->num_rows > 0) {
    // output data of each row
    while($row = $result3->fetch_assoc()) {
        $income = $income + $row["clubhouse"];
        $pdf->Cell(150,5,"Club House",1,0,'C');
        $pdf->Cell(40,5,$row["clubhouse"],1,0,'C');
        $pdf->Ln();
    }
} else {
    echo "0 results";
}

if ($result4->num_rows > 0) {
    // output data of each row
    while($row = $result4->fetch_assoc()) {
        $income = $income + $row["miscellaneous"];
        $pdf->Cell(150,5,"Miscellaneous",1,0,'C');
        $pdf->Cell(40,5,$row["miscellaneous"],1,0,'C');
        $pdf->Ln();
    }
} else {
    echo "0 results";
}

if ($result5->num_rows > 0) {
    // output data of each row
    while($row = $result5->fetch_assoc()) {
        $income = $income + $row["nonoccupancy"];
        $pdf->Cell(150,5,"Non-occupancy",1,0,'C');
        $pdf->Cell(40,5,$row["nonoccupancy"],1,0,'C');
        $pdf->Ln();
    }
} else {
    echo "0 results";
}

if ($result6->num_rows > 0) {
    // output data of each row
    while($row = $result6->fetch_assoc()) {
        $income = $income + $row["plotsale"];
        $pdf->Cell(150,5,"Plot Sale",1,0,'C');
        $pdf->Cell(40,5,$row["plotsale"],1,0,'C');
        $pdf->Ln();
    }
} else {
    echo "0 results";
}
        $pdf->Cell(150,5,"Total Income",1,0,'C');
        $pdf->Cell(40,5,$income,1,0,'C');
        $pdf->Ln();$pdf->Ln();

$pdf->SetFont('Arial','B',15);
$pdf->Cell(50,10,'Expenditure', 'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',12);

if ($result7->num_rows > 0) {
    // output data of each row
    while($row = $result7->fetch_assoc()) {
        $expenditure = $expenditure + $row["beautification"];
        $pdf->Cell(150,5,"Beautification",1,0,'C');
        $pdf->Cell(40,5,$row["beautification"],1,0,'C');
        $pdf->Ln();
    }
} else {
    echo "0 results";
}

if ($result8->num_rows > 0) {
    // output data of each row
    while($row = $result8->fetch_assoc()) {
        $expenditure = $expenditure + $row["cleaning"];
        $pdf->Cell(150,5,"Cleaning",1,0,'C');
        $pdf->Cell(40,5,$row["cleaning"],1,0,'C');
        $pdf->Ln();
    }
} else {
    echo "0 results";
}
if ($result9->num_rows > 0) {
    // output data of each row
    while($row = $result9->fetch_assoc()) {
        $expenditure = $expenditure + $row["construction"];
        $pdf->Cell(150,5,"Construction",1,0,'C');
        $pdf->Cell(40,5,$row["construction"],1,0,'C');
        $pdf->Ln();
    }
} else {
    echo "0 results";
}

if ($result10->num_rows > 0) {
    // output data of each row
    while($row = $result10->fetch_assoc()) {
        $expenditure = $expenditure + $row["cultural"];
        $pdf->Cell(150,5,"Cultural",1,0,'C');
        $pdf->Cell(40,5,$row["cultural"],1,0,'C');
        $pdf->Ln();
    }
} else {
    echo "0 results";
}

if ($result11->num_rows > 0) {
    // output data of each row
    while($row = $result11->fetch_assoc()) {
        $expenditure = $expenditure + $row["road"];
        $pdf->Cell(150,5,"Road",1,0,'C');
        $pdf->Cell(40,5,$row["road"],1,0,'C');
        $pdf->Ln();
    }
} else {
    echo "0 results";
}

if ($result12->num_rows > 0) {
    // output data of each row
    while($row = $result12->fetch_assoc()) {
        $expenditure = $expenditure + $row["security"];
        $pdf->Cell(150,5,"Security",1,0,'C');
        $pdf->Cell(40,5,$row["security"],1,0,'C');
        $pdf->Ln();
    }
} else {
    echo "0 results";
}
if ($result13->num_rows > 0) {
    // output data of each row
    while($row = $result13->fetch_assoc()) {
        $expenditure = $expenditure + $row["electrical"];
        $pdf->Cell(150,5,"Electrical",1,0,'C');
        $pdf->Cell(40,5,$row["electrical"],1,0,'C');
        $pdf->Ln();
    }
} else {
    echo "0 results";
}
        $pdf->Cell(150,5,"Total Expenditure",1,0,'C');
        $pdf->Cell(40,5,$expenditure,1,0,'C');
        $pdf->Ln();

$conn->close();
$pdf->Output('Annexure.pdf','D');
?>

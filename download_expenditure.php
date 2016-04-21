<?php
$servername = 'localhost';
        $username = 'root';
        $password = 'sojwal';
    
        $dbname = 'pars';
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM expenditure";
$result = $conn->query($sql);


require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);	
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc())

{
    $pdf->Cell(20,5,$row['description'],1,0,'C');
    $pdf->Cell(20,5,$row['date'],1,0,'C');
    $pdf->Cell(30,5,$row['amount'],1,0,'C');
    $pdf->Ln();
}
}
$pdf->Output('expenditure.pdf','D');
?>


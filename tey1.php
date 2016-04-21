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
$sql = "SELECT * FROM Annual_main";
$result = $conn->query($sql);


require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);  


$yr = 0; $yr_sum = 0;
$yr1 = 0; $yr1_sum = 0;

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc())

{
    $pdf->Cell(20,5,$row['m_name'],1,0,'C');
    $pdf->Cell(20,5,$row['p_no'],1,0,'C');
    $pdf->Cell(30,5,$row['pay_date'],1,0,'C');
    $pdf->Cell(20,5,$row['amt'],1,0,'C');
    $pdf->Cell(20,5,$row['time'],1,0,'C');
    $pdf->Cell(20,5,$row['late_fee'],1,0,'C');
    $pdf->Cell(40,5,$row['total'],1,0,'C');
    $pdf->Ln();
    if($yr == 0 || $yr == substr($row['pay_date'] ,  -4 ) ) {
        $yr = substr($row['pay_date'] ,  -4 );
    $yr_sum = $yr_sum + $row['total'];
    }
    else {
    $yr1 = substr($row['pay_date'] ,  -4 );
    $yr1_sum = $yr1_sum + $row['total'];
    }
}
}
$pdf->Cell(130,5,"Income from annual maintenance for ".$yr,1,0,'C');    
$pdf->Cell(40,5,$yr_sum,1,0,'C');   
$pdf->Ln();
$pdf->Cell(130,5,"Income from annual maintenance ".$yr1,1,0,'C');   
$pdf->Cell(40,5,$yr1_sum,1,0,'C');   
$pdf->Output('example2.pdf','I');
?>


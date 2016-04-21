<?php
 
require('mysql_table.php');
 echo 'works'
class PDF extends PDF_MySQL_Table
{
function Header()
{
 
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,’All Products’,0,1,'C');
    $this->Ln(10);
 
    parent::Header();
}
}
 
mysql_connect('localhost','root','Rinku1234');
mysql_select_db('try');
 
$pdf=new PDF();
$pdf->AddPage();
 
$pdf->Table('SELECT * FROM prediction');
 
$pdf->Output();
?>

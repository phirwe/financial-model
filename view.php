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

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc())

{
	print "<table border = 2>";
	print "<tr>"; 
        print "<td>".$row['m_name']."</td>";
	print "<td>".$row['p_no']."</td>";
	print "<td>".$row['pay_date']."</td>";
	print "<td>".$row['amt']."</td>";
	print "<td>".$row['time']."</td>";
	print "<td>".$row['late_fee']."</td>";
	print "<td>".$row['total']."</td>";
	print "</tr>";
	print "</table>";
}
}
?>


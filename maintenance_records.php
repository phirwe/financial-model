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

$sql = "SELECT * FROM Members";
$result = $conn->query($sql);
?>

<section id = "table" class= "bg-darkest-black">
<div class="container">
<div class="caption">Maintenance reocord</div>	
<div id="table">
<div class="header-row row">
    <span class="cell">Check</span>
	<span class="cell">Member name</span>
	<span class="cell">Plot number</span>
<span class="cell">Telephone</span>
<span class="cell">Mobile number</span>
<span class="cell">email id</span>
	<span class="cell">Paid for</span>
	<span class="cell">Total amount paid</span>


</div>
<?php
$j = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $j = $j + 1;
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Name>";
        echo $row["member_name"];
        echo "</span>";

        echo "<span class=cell primary data-label=Payment Date>"; 
        echo $row["plot_number"];
        echo "</span>";

        echo "<span class=cell primary data-label=Duration>";
        echo $row["telephone"];
        echo "</span>";

        echo "<span class=cell primary data-label=Amount Paid>";
        echo $row["mobile_number"];
        echo "</span>";

        echo "<span class=cell primary data-label=Late Fee Fine>";
        echo $row["email_id"];
        echo "</span>";
		$sql1 = "SELECT * FROM AnnualMaintenance where AnnualMaintenance.plot_number = Members.plot_number";
		$result1 = $conn->query($sql1);
		$duration = "Not Paid";
		$amount = 0;
		if($result1->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
				$amount = $amount + $row[total_amount];
				if($row[duration] == '1 year'||$row[duration] == '12 months') {
					$duration = '1 year';
				}
				if($duration == '1 year') {
					break;
				}
				else {
					if(substr($row[duration], 2,5) == 'month') {
						if($a = intval(substr($duration, 0,1) + substr($row[duration], 0,1)) <= 12) {
							$duration = $a +  ' months';
						}
					}
				}
			}
		}
         echo "<span class=cell primary data-label=Total Amount>";
        echo $duration;
        echo "</span>";
 
         echo "<span class=cell primary data-label=Total Amount>";
        echo $amount;
        echo "</span>";

        echo "</div>";
    }
} else {
    echo "No Maintenance Records";
}
echo"</table>";
echo "</div></div><br>";

echo "</center>";
echo"</section>
</html>";


$conn->close();
?>


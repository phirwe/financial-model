<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ShantibanApp">
    <meta name="author" content="ShantibanApp">

    <title>Shantiban Society Financial Model</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="table.css">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.html">Shantiban Society Financial Model</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="index.html"></a>
                    </li>
                    
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</body>
<section id = "table" class= "bg-darkest-black">
<div class="container">
<div class="caption">Club House</div>	
<div id="table">
<div class="header-row row">
    <span class="cell">Check</span>
    <span class="cell">Member Name</span>
    <span class="cell">Plot no.</span>
    <span class="cell">Hours Rented</span>
    <span class="cell">Cost</span>
    <span class="cell">Date Rented</span>
    <span class="cell">Payment Date</span>
    <span class="cell">Payment Method</span>
    <span class="cell">Cheque Number</span>
</div>
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


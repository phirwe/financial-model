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

$sql = "SELECT * FROM AnnualMaintenance";
$result = $conn->query($sql);
?>

<section id = "table" class= "bg-darkest-black">
<div class="container">
<div class="caption">Annual Maintenance</div>	
<div id="table">
<div class="header-row row">
    <span class="cell">Check</span>
    <span class="cell">Name</span>
   <span class="cell">Plot number</span>
<span class="cell">Payment Date</span>
<span class="cell">Duration</span>
    <span class="cell">Amount Paid</span>
   <span class="cell">Late Fee Fine</span>
   <span class="cell">Total Amount</span>
    <span class="cell">Payment Method</span>
     <span class="cell">Cheque Number</span>
</div>
<?php
$j = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $j = $j + 1;
        echo "<div class=row>";
        $str = "".$j;
        echo "<span class=cell primary data-label=Check>";        
        echo"<div>";
        echo "<form method = 'get' action= ''/>";
        echo "<input type='checkbox' name='options[]' value = $str />";
        echo "</div>";
        echo "</span>";

        echo "<span class=cell primary data-label=Name>";
        echo $row["member_name"];
        echo "</span>";

        echo "<span class=cell primary data-label=Plot number>";	
        echo $row["plot_number"];
        echo "</span>";

        echo "<span class=cell primary data-label=Payment Date>"; 
        echo $row["payment_date"];
        echo "</span>";

        echo "<span class=cell primary data-label=Duration>";
        echo $row["duration"];
        echo "</span>";

        echo "<span class=cell primary data-label=Amount Paid>";
        echo $row["amount_paid"];
        echo "</span>";

        echo "<span class=cell primary data-label=Late Fee Fine>";
        echo $row["late_fee_fine"];
        echo "</span>";

        echo "<span class=cell primary data-label=Total Amount>";
        echo $row["total_amount"];
        echo "</span>";

        echo "<span class=cell primary data-label=Total Amount>";
        echo $row["payment_method"];
        echo "</span>";

		echo "<span class=cell primary data-label=Total Amount>";
        echo $row["cheque_number"];
        echo "</span>";
    



        echo "</div>";
    }
} else {
    echo "0 results";
}
echo"</table>";
echo "</div></div><br>";
echo "<center>";
echo "<input type='submit'   name='submit' value='delete'>";
  $s = array();
  $sql = "SELECT * FROM AnnualMaintenance";
$result = $conn->query($sql);  

if (array_key_exists('options', $_GET) || array_key_exists('options', $_GET))
{
    foreach($_GET['options'] as $value){
        
        
        $i = intval($value);
        $k = 0;
        while($row = mysqli_fetch_array($result)) {
            $s = $row;
            $k = $k + 1;
            if($i == $k)
                break;
        }

       mysqli_query($conn, "DELETE FROM AnnualMaintenance WHERE member_name = '$s[0]' and plot_number = '$s[1]' and payment_date = '$s[2]' and duration = '$s[3]' and amount_paid = '$s[4]' and late_fee_fine = '$s[5]' and total_amount = '$s[6]' and payment_method = '$s[7]' and cheque_number = '$s[8]' ");
       
        
}
}



echo "</input>";
echo "</form>";
echo "</center>";
echo"</section>
</html>";


$conn->close();
?>

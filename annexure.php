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

$sql1 = "SELECT sum(total_amount) as annualmaintenance  FROM  AnnualMaintenance";
$sql2 = "SELECT sum(amount)  as interest FROM  BankFdInterest";
$sql3 = "SELECT sum(cost*hours_rented)  as clubhouse   FROM ClubHouse";
$sql4 = "SELECT sum(total_amount) as miscellaneous  FROM  Miscellaneous";
$sql5 = "SELECT sum(amount_paid) as nonoccupancy  FROM  Nonoccupancy";
$sql6 = "SELECT sum(amount*percentage_amount/100) as plotsale  FROM  Plotsale";

$sql7 = "SELECT sum(amount_spent) as  beautification  FROM  Beautification";
$sql8 = "SELECT sum(amount_spent)  as cleaning FROM  Cleaning";
$sql9 = "SELECT sum(amount_spent)  as construction   FROM Construction";
$sql10 = "SELECT sum(amount_spent) as cultural  FROM Cultural";
$sql11 = "SELECT sum(amount_spent) as road  FROM  Road";
$sql12 = "SELECT sum(amount_spent) as security  FROM  Security";
$sql13 = "SELECT sum(amount_spent) as electrical  FROM  Electrical";

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
?>
<section id = "table" class= "bg-darkest-black">
<div class="container">
<div class="caption">Annexure</div>
<div class="caption2">Income</div>

<div id="table">


<div class="header-row row">

    <span class="cell">Description</span>
    <span class="cell">Amount</span>
    
</div>

<?php
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Description>";
        echo "Annual Maintenance";
        echo "</span>";
        echo "<span class=cell primary data-label=Amount>";
        echo $row["annual_maintenance"];
        $income = $income + $row["annual_maintenance"];
        echo "</span>";echo "</div>";
    }
} else {
    echo "0 results";
}

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Description>";
        echo "Bank FD Interest";
        echo "</span>";
        echo "<span class=cell primary data-label=Amount>";
        echo $row["interest"];
        $income = $income + $row["interest"];
        echo "</span>";echo "</div>";
    }
} else {
    echo "0 results";
}
if ($result3->num_rows > 0) {
    // output data of each row
    while($row = $result3->fetch_assoc()) {
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Description>";
        echo "Club House";
        echo "</span>";
        echo "<span class=cell primary data-label=Amount>";
        echo $row["clubhouse"];
        $income = $income + $row["clubhouse"];
        echo "</span>";echo "</div>";
    }
} else {
    echo "0 results";
}

if ($result4->num_rows > 0) {
    // output data of each row
    while($row = $result4->fetch_assoc()) {
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Description>";
        echo "Miscellaneous";
        echo "</span>";
        echo "<span class=cell primary data-label=Amount>";
        echo $row["miscellaneous"];
        $income = $income + $row["miscellaneous"];
        echo "</span>";echo "</div>";
    }
} else {
    echo "0 results";
}

if ($result5->num_rows > 0) {
    // output data of each row
    while($row = $result5->fetch_assoc()) {
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Description>";
        echo "Non-occupancy";
        echo "</span>";
        echo "<span class=cell primary data-label=Amount>";
        echo $row["nonoccupancy"];
        $income = $income + $row["nonoccupancy"];
        echo "</span>";echo "</div>";
    }
} else {
    echo "0 results";
}

if ($result6->num_rows > 0) {
    // output data of each row
    while($row = $result6->fetch_assoc()) {
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Description>";
        echo "Plot Sale";
        echo "</span>";
        echo "<span class=cell primary data-label=Amount>";
        echo $row["plotsale"];
        $income = $income + $row["plotsale"];
        echo "</span>";echo "</div>";
    }
} else {
    echo "0 results";
}
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Description>";
        echo "<h5><b>Total Income</b></h5>";
        echo "</span>";
        echo "<span class=cell primary data-label=Amount>";
        echo "<h5><b>".$income."</b></h5>";
        echo "</span>";echo "</div>";
?>
</div>
<div class="caption2">Expenditure</div>
<div id="table">



<div class="header-row row">

    <span class="cell">Description</span>
    <span class="cell">Amount</span>
    
</div>






<?php
if ($result7->num_rows > 0) {
    // output data of each row
    while($row = $result7->fetch_assoc()) {
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Description>";
        echo "Beautification";
        echo "</span>";
        echo "<span class=cell primary data-label=Amount>";
        echo $row["beautification"];
        $expenditure = $expenditure + $row["beautification"];
        echo "</span>";echo "</div>";
    }
} else {
    echo "0 results";
}

if ($result8->num_rows > 0) {
    // output data of each row
    while($row = $result8->fetch_assoc()) {
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Description>";
        echo "Cleaning";
        echo "</span>";
        echo "<span class=cell primary data-label=Amount>";
        echo $row["cleaning"];
        $expenditure = $expenditure + $row["cleaning"];
        echo "</span>";echo "</div>";
    }
} else {
    echo "0 results";
}
if ($result9->num_rows > 0) {
    // output data of each row
    while($row = $result9->fetch_assoc()) {
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Description>";
        echo "Construction";
        echo "</span>";
        echo "<span class=cell primary data-label=Amount>";
        echo $row["construction"];
        $expenditure = $expenditure + $row["construction"];
        echo "</span>";echo "</div>";
    }
} else {
    echo "0 results";
}

if ($result10->num_rows > 0) {
    // output data of each row
    while($row = $result10->fetch_assoc()) {
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Description>";
        echo "Cultural";
        echo "</span>";
        echo "<span class=cell primary data-label=Amount>";
        echo $row["cultural"];
        $expenditure = $expenditure + $row["cultural"];
        echo "</span>";echo "</div>";
    }
} else {
    echo "0 results";
}

if ($result11->num_rows > 0) {
    // output data of each row
    while($row = $result11->fetch_assoc()) {
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Description>";
        echo "Road";
        echo "</span>";
        echo "<span class=cell primary data-label=Amount>";
        echo $row["road"];
        $expenditure = $expenditure + $row["road"];
        echo "</span>";echo "</div>";
    }
} else {
    echo "0 results";
}

if ($result12->num_rows > 0) {
    // output data of each row
    while($row = $result12->fetch_assoc()) {
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Description>";
        echo "Security";
        echo "</span>";
        echo "<span class=cell primary data-label=Amount>";
        echo $row["security"];
        $expenditure = $expenditure + $row["security"];
        echo "</span>";echo "</div>";
    }
} else {
    echo "0 results";
}
if ($result13->num_rows > 0) {
    // output data of each row
    while($row = $result13->fetch_assoc()) {
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Description>";
        echo "Electrical";
        echo "</span>";
        echo "<span class=cell primary data-label=Amount>";
        echo $row["electrical"];
        $expenditure = $expenditure + $row["electrical"];
        echo "</span>";echo "</div>";
    }
} else {
    echo "0 results";
}
        echo "<div class=row>";
        echo "<span class=cell primary data-label=Description>";
        echo "<h5><b>Total Expenditure</b></h5>";
        echo "</span>";
        echo "<span class=cell primary data-label=Amount>";
        echo "<h5><b>".$expenditure."</h5></b>";
        
$conn->close();
?>
<br>
<br>
</div>
</div>
<center>
<div>

<form action= 'download.php'>

<input type='submit' name='submit' value='pdf'></input></form>
</div>
</center>


</div>

</div>
</section>
</html>
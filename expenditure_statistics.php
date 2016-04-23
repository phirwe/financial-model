
<div id="test">	
	<div id="result">
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "PARS";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			die("Error viewing Statistics");
			}
			$sql7 = "SELECT sum(amount_spent) as beautification FROM Beautification";
			$sql8 = "SELECT sum(amount_spent) as cleaning FROM Cleaning";
			$sql9 = "SELECT sum(amount_spent) as construction FROM Construction";
			$sql10 = "SELECT sum(amount_spent) as cultural FROM Cultural";
			$sql11 = "SELECT sum(amount_spent) as road FROM Road";
			$sql12 = "SELECT sum(amount_spent) as security FROM Security";
			$sql13 = "SELECT sum(amount_spent) as electrical FROM Electrical";

			$result7 = $conn->query($sql7);
			$result8 = $conn->query($sql8);
			$result9 = $conn->query($sql9);
			$result10 = $conn->query($sql10);
			$result11 = $conn->query($sql11);
			$result12 = $conn->query($sql12);
			$result13 = $conn->query($sql13);
			$expenditure = 0;

$b = 0;
if ($result7->num_rows > 0) {
    while($row = $result7->fetch_assoc()) {
	$b =  $row["beautification"];
        $expenditure = $expenditure + $row["beautification"];
    }
}
$c = 0;
if ($result8->num_rows > 0) {
    while($row = $result8->fetch_assoc()) {
        $c = $row["cleaning"];
        $expenditure = $expenditure + $row["cleaning"];
    }
}
$co = 0;
if ($result9->num_rows > 0) {
    while($row = $result9->fetch_assoc()) {
        $co = $row["construction"];
        $expenditure = $expenditure + $row["construction"];
    }
}
$cu = 0;
if ($result10->num_rows > 0) {
    while($row = $result10->fetch_assoc()) {
        $cu = $row["cultural"];
        $expenditure = $expenditure + $row["cultural"];
    }
}
$r = 0;
if ($result11->num_rows > 0) {
    while($row = $result11->fetch_assoc()) {
        $r = $row["road"];
        $expenditure = $expenditure + $row["road"];
    }
}
$s = 0;
if ($result12->num_rows > 0) {
    while($row = $result12->fetch_assoc()) {
	$s = $row["security"];
        $expenditure = $expenditure + $row["security"];
    }
}
$e = 0;
if ($result13->num_rows > 0) {
    while($row = $result13->fetch_assoc()) {
        $e = $row["electrical"];
        $expenditure = $expenditure + $row["electrical"];
    }
}
$conn->close();
if($expenditure != 0){
	$b = ($b/$expenditure)*100;
	$c = ($c/$expenditure)*100;
	$co = ($co/$expenditure)*100;
	$cu = ($cu/$expenditure)*100;
	$r = ($r/$expenditure)*100;
	$s = ($s/$expenditure)*100;
	$e = ($e/$expenditure)*100
}

?>
	</div>
</div>
<div id = "graph">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Income Statistics</title>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
var b = <?php echo $b; ?>;
var c = <?php echo $c; ?>;
var co = <?php echo $co; ?>;
var cu = <?php echo $cu; ?>;
var r = <?php echo $r; ?>;
var s = <?php echo $s; ?>;
var e = <?php echo $e; ?>;
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Expenditure Statistics'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Income',
            colorByPoint: true,
            data: [{
                name: 'Beautification',
                y: b
            }, {
                name: 'Cleaning',
                y: c
            }, {
                name: 'Construction',
                y: co
            }, {
                name: 'Cultural',
                y: cu
            }, {
                name: 'Road',
                y: r
            }, {
                name: 'Security',
                y: s
            }, {
                name: 'Electrical',
                y: e
            }]
        }]
    });
});
		</script>
	</head>
	<body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

	</body>

</div>

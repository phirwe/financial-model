
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
			die("Error viewing Statistics ");
			}
			$sql1 = "SELECT sum(total_amount) as annualmaintenance  FROM  AnnualMaintenance";
			$sql2 = "SELECT sum(amount)  as interest FROM  BankFdInterest";
			$sql3 = "SELECT sum(cost*hours_rented)  as clubhouse FROM ClubHouse";
			$sql4 = "SELECT sum(total_amount) as miscellaneous  FROM  Miscellaneous";
			$sql5 = "SELECT sum(amount_paid) as nonoccupancy  FROM  NonOccupancy";
			$sql6 = "SELECT sum(amount*percentage_amount/100) as plotsale  FROM  PlotSale";

			$result1 = $conn->query($sql1);
			$result2 = $conn->query($sql2);
			$result3 = $conn->query($sql3);
			$result4 = $conn->query($sql4);
			$result5 = $conn->query($sql5);
			$result6 = $conn->query($sql6);

			$income = 0;

			$am = 0;
			if ($result1->num_rows > 0) {
			    while($row = $result1->fetch_assoc()) {
				$am = $row["annualmaintenance"];
				$income = $income + $row["annualmaintenance"];
			    }
			}
			$i = 0;
			if ($result2->num_rows > 0) {
			    while($row = $result2->fetch_assoc()) {
				$i = $row["interest"];
				$income = $income + $row["interest"];
			    }
			}
			$ch = 0;
			if ($result3->num_rows > 0) {
			    while($row = $result3->fetch_assoc()) {
				$ch = $row["clubhouse"];
				$income = $income + $row["clubhouse"];
			    }
			}
			$m = 0;
			if ($result4->num_rows > 0) {
			    while($row = $result4->fetch_assoc()) {
				$m = $row["miscellaneous"];
				$income = $income + $row["miscellaneous"];
			    }
			}
			$no = 0;
			if ($result5->num_rows > 0) {
			    while($row = $result5->fetch_assoc()) {
				$no = $row["nonoccupancy"];
				$income = $income + $row["nonoccupancy"];
			    }
			}
			$ps = 0;
			if ($result6->num_rows > 0) {
			    while($row = $result6->fetch_assoc()) {
				$ps = $row["plotsale"];
				$income = $income + $row["plotsale"];
			    }
			}
			if($income != 0){
				$am = ($am/$income)*100;
				$i = ($i/$income)*100;
				$ch = ($ch/$income)*100;
				$m = ($m/$income)*100;
				$no = ($no/$income)*100;
				$ps = ($ps/$income)*100;
			}
			$conn->close();
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
var am = <?php echo $am; ?>;
var i = <?php echo $i; ?>;
var ch = <?php echo $ch; ?>;
var m = <?php echo $m; ?>;
var no = <?php echo $no; ?>;
var ps = <?php echo $ps; ?>;
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Income Statistics'
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
                name: 'Annual Maintenance',
                y: am
            }, {
                name: 'Bank Fd Interest',
                y: i
            }, {
                name: 'Club House',
                y: ch
            }, {
                name: 'Miscellaneous',
                y: m
            }, {
                name: 'Non-Occupancy',
                y: no
            }, {
                name: 'Plotsale',
                y: ps
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

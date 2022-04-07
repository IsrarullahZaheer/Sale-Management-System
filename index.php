<?php include "config/connectoin.php"?>
<?php include "includes/header.php";?>
		<!-- Sidenav -->
<?php include "includes/sidenav.php";?>
		<!-- Main content -->
		<div class="main-content" id="panel">
			<!-- Topnav -->
	<?php include "includes/topnav.php";

?>




</head>
<?php
$query = "SELECT * FROM sarafi ORDER BY id DESC LIMIT 1";
$selectLast = mysqli_query($connection, $query);
if ($selectLast) {
    while ($rows = mysqli_fetch_assoc($selectLast)) {
        $lastAf2rs = $rows['af2rs'];
    }
}
?>
<div class="row">

<div class="col text-center">
<span class="bg-primary text-white d-block display-4 p-0 m-0"  >


<script>
var currentTime = new Date(),
hours = currentTime.getHours(),
minutes = currentTime.getMinutes();
if(minutes<10){
	minutes = "0" + minutes;
}
var suffix = "AM";
if(hours>=12){
	suffix="PM";
	hours=hours-12;
}
if(hours==0){
	hours=12;
}

var currentDate = new Date(),
day =currentDate.getDate(),
month = currentDate.getMonth()+1,
year = currentDate.getFullYear();
document.write(day+"-"+month+"-"+ year);
document.write(" ");

document.write(hours+":"+minutes+" "+ suffix);


</script>

<span class="text-center pashtofont  "><?='  د 1000 اففانیو ' . $lastAf2rs . '  کلداری کی کیږی   '?></span>

</span>

</div>
</div>
			<!-- Header -->

			<!-- Page content -->
			<!-- <div class="container-fluid mt-3">

            <?php include "includes/dashboardCardStatus.php";?>


<!-- Footer -->
<?php include "includes/footer.php";?>
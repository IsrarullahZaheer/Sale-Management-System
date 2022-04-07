<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>

<?php ob_start();?>

<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html dir="">
	<head>

		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>

		<meta name="Israrullah Zaheer" content="Code Warrior Team" />
		<title> Mobile Center</title>

		<!-- Favicon -->
		<link
			rel="icon"
			href="img/brand/favicon.png"
			type="image/png"
		/>
		<!-- Fonts -->
		<!-- <link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
		/> -->

	<link rel="stylesheet" href="assets/fonts/pashto">




	<link
			rel="stylesheet"
			href="assets/vendor/@fortawesome/fontawesome-free/css/pashtofont.css"
			type="text/css"
		/>




		<!-- Icons -->
		<link
			rel="stylesheet"
			href="assets/vendor/nucleo/css/nucleo.css"
			type="text/css"
		/>
		<link
			rel="stylesheet"
			href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
			type="text/css"
		/>
		<!-- Page plugins -->
		<link
			rel="stylesheet"
			href="assets/vendor/fullcalendar/dist/fullcalendar.min.css"
		/>
		<link
			rel="stylesheet"
			href="assets/vendor/sweetalert2/dist/sweetalert2.min.css"
		/>
		<!-- Argon CSS -->
		<link rel="stylesheet" href="css/dashboard.css" type="text/css" />
		<link rel="stylesheet" href="css/mystyle.css">
		<link
			rel="stylesheet"
			href="assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			href="assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			href="assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css"
		/>
		<link rel="stylesheet" href="functions/function.php">

<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>


<style>


body{
	overflow-x:hidden;

}
</style>

	</head>

	<body>

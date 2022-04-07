<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "mobileapp";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Connection Feiled" . mysqli_error($connection));
} else {
    $connection->set_charset("utf8");

}

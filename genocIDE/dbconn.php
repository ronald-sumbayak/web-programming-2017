<?php
$host     = "localhost";
$username = "root";
$password = "";
$database = "pw2_b_5115100174";

$link     = mysqli_connect ($host, $username, $password, $database);
mysqli_select_db ($link, $database);
?>
<?php
$host     = "localhost";
$username = "root";
$password = "";
$database = "b_5115100174_teman";

$link     = mysqli_connect ($host, $username, $password, $database);
mysqli_select_db ($link, $database);
?>
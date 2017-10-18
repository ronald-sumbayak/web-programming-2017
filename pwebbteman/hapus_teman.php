<?php
include ('dbconn.php');
$q = mysqli_query ($link, "delete from teman where id = " . $_GET['id']);
header ("Location: index.php");
?>
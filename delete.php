<?php
include ('checksession.php');
include ('dbconn.php');
$res = mysqli_query ($link, "delete from files where id = " . $_GET['file']);
if ($res)
    header ("Location: home.php");
?>
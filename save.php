<?php
include ('checksession.php');
include ('dbconn.php');
$a = $_POST['id'];
$b = htmlspecialchars ($_POST['content'], ENT_QUOTES);
$c = "update files set content = '" . $b . "' where id = '" . $a . "'";

$res = mysqli_query ($link, $c) or die (mysqli_error ($link));
if ($res)
    header ("Location: home.php");
?>
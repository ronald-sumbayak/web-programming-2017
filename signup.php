<?php
include ('dbconn.php');
$email = $_POST['email'];
$paswd = $_POST['password'];
$res = mysqli_query ($link, "insert into userdata values ('$email', '$paswd')");
mysqli_close ($link);
if ($res)
    include ('login.php');
?>
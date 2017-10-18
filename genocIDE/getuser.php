<?php
include ('dbconn.php');
$user = mysqli_query ($link, 'select * from userdata where email = "' . $_REQUEST['email'] . '"');
?>
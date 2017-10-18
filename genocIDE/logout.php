<?php
session_start ();
if (session_destroy ()) {
    setcookie ("email", "", time () - 3600);
    setcookie ("password", "", time () - 3600);
    header ("Location: index.php");
}
?>
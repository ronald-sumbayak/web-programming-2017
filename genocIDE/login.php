<?php
include ('getuser.php');

if ($user)
    if ($row = mysqli_fetch_assoc ($user)) {
        if ($_REQUEST['password'] == $row['pass']) {
            session_start ();
            setcookie ("email", $row['email'], time() + 30*24*60*60);
            setcookie ("password", $row['pass'], time() + 30*24*60*60);
            $_SESSION['user'] = $row['email'];
            header ('Location: home.php');
        }
        else
            $errorlogin = "wrong";
    }
    else
        $errorlogin = "not exists";
else
    $errorlogin = "not exists";
?>
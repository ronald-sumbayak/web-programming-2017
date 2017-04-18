<?php

if (isset ($_COOKIE['email'])) {
    session_start ();
    $_SESSION['user'] = $_COOKIE['email'];
    header ("Location: home.php");
}

if ($_POST) {
    if (isset ($_POST['login'])) {
        include ('login.php');
    }
    else if (isset ($_POST['signup'])) {
        include ('getuser.php');
        if ($user) {
            if (mysqli_num_rows ($user) == 1)
                $errorsignup = "exists";
            else {
                if ($_POST['password'] == $_POST['passwordretype'])
                    include ('signup.php');
                else
                    $errorsignup = "not match";
            }
        }
    }
}
?>
<!doctype html>
<html>
    <head>
        <title>GenocIDE - The world future greatest editor for all language (HTML only for now)</title>
        <script src="jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto"/>
        <link rel="stylesheet" href="login.css">
        <script src="login.js"></script>
    </head>
    <body>
        <div class="background">
            <div class="container">
                <form id="loginform" class="form" name="login" method="post" autocomplete="off">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <div id="loginerr" style="color: #D32F2F; font-weight: bold">
                    <?php
                    if (isset ($errorlogin))
                        if ($errorlogin == "wrong")
                            echo "<div>Wrong password</div>";
                        else
                            echo "<div>User not exists</div>";
                    ?>
                    </div>
                    <input class="btn" type="submit" name="login" value="Login">
                    <button id="switchregister" class="btn" onclick="showsignup()">Register</button>
                </form>
                <form id="signupform" class="form" name="signup" method="post" autocomplete="off">
                    <input type="email" name="email" placeholder="Email" required style="display:block; width:100%">
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="passwordretype" placeholder="Password (Again)" required>
                    <div id="signuperr"style="color: #D32F2F; font-weight: bold">
                    <?php
                    if (isset ($errorsignup))
                        if ($errorsignup == "exists")
                            echo "<div>Email exists</div>";
                        else
                            echo "<div>Password didn't match</div>";
                    ?>
                    </div>
                    <input class="btn" type="submit" name="signup" value="Register">
                    <button id="switchlogin" class="btn" onclick="showlogin()">Login</button>
                </form>
                <?php
                if (isset ($_POST['signup']))
                    echo "<script>$('#loginform').hide ()</script>";
                else
                    echo "<script>$('#signupform').hide ()</script>";
                ?>
            </div>
        </div>
    </body>
</html>
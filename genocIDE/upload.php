<?php
include ('checksession.php');
if ($_POST) {
    if ($open = fopen ($_FILES['file']['tmp_name'], 'r')) {
        if ($read = fread ($open, $_FILES['file']['size'])) {
            $content  = htmlspecialchars ($read, ENT_QUOTES);
            $name     = $_POST['name'];
            $mimetype = $_FILES['file']['type'];
            $size     = $_FILES['file']['size'];
            $ext      = pathinfo ($_FILES['file']['name'], PATHINFO_EXTENSION);
            $allowed  = array ("cpp", "c", "java", "html", "css", "js", "php");
            if (in_array ($ext, $allowed)) {
                include ('dbconn.php');
                $own = $_SESSION['user'];
                $res = mysqli_query ($link, "insert into files (own, filename, filetype, size, ext, content) values ('$own', '$name', '$mimetype', '$size', '$ext', '$content')") or die (mysqli_error ($link));
                if ($res) {
                    mysqli_close ($link);
                }
            }
            else "Only support " . $allowed;
        }
    }
}

header ("Location: home.php");
?>

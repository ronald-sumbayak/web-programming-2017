<?php
include ('checksession.php');
include ('dbconn.php');

if ($file = mysqli_query ($link, "select * from files where id = " . $_GET['file'])) {
    if ($row = mysqli_fetch_assoc ($file)) {
        $name = $row['filename'] . "." . $row['ext'];
        $type = $row['filetype'];
        $size = $row['size'];
        $data = $row['content'];
        
        header ("Content-type: " . $type);
        header ("Content-length: " . $size);
        header ("Content-Transfer-Encoding: binary");
        header ("Content-Disposition: download; filename=\"" . $name . "\"");
        echo htmlspecialchars_decode ($data);
        exit ();
    }
}
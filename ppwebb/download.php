<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "ppwebb";

$link = mysqli_connect ($host, $username, $password, $database);
mysqli_select_db ($link, $database);

if ($file = mysqli_query ($link, "select * from files where id = " . $_REQUEST['id'])) {
    if ($row = mysqli_fetch_assoc ($file)) {
        $name = $row['name'];
        $type = $row['type'];
        $size = $row['size'];
        $data = $row['data'];
        
        header ("Content-type: " . $type);
        header ("Content-length: " . $size);
        header ("Content-Transfer-Encoding: binary");
        header ("Content-Disposition: download; filename=\"" . $name . "\"");
        echo $data;
        exit ();
    }
}

mysqli_close ($link);
?>
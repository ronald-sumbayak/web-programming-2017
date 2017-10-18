<html>
    <head>
        <title>PPWEBB</title>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <table border="0">
            <tr>
                <td>File</td>
                <td><input type="file" name="file"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea
                        name="description"
                        cols="50"
                        rows="10"
                        style="margin:10px;resize:none"
                        placeholder="Put description for the file"
                        ></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="upload" value="Upload"></td>
            </tr>
            </table>
        </form>
    </body>
</html>

<?php
if ($_POST) {
    if ($open = fopen ($_FILES['file']['tmp_name'], 'r')) {
        if ($read = fread ($open, $_FILES['file']['size'])) {
            $data = addslashes ($read);
            $name = $_FILES['file']['name'];
            $type = $_FILES['file']['type'];
            $type = pathinfo ($name, PATHINFO_EXTENSION);
            $size = $_FILES['file']['size'];
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "ppwebb";

            $link = mysqli_connect ($host, $username, $password, $database);
            mysqli_select_db ($link, $database);
            $res = mysqli_query ($link, "insert into files (name, type, size, data) values ('$name', '$type', '$size', '$data')") or die (mysqli_error ($link));
            if ($res) echo "Saved to database";
            mysqli_close ($link);
        }
    }
}
?>
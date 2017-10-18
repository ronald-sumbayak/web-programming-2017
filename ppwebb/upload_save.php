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
if ($_POST)
    if (!empty ($_FILES['file']['name'])) {
        echo "Uploaded Files:<br>";
        echo $_FILES['file']['name'];
        echo "<br>";
        echo $_FILES['file']['type'];
        echo "<br>";
        echo $_FILES['file']['size'];
        echo "<br>";
        
        if (isset ($_POST['description']))
            echo htmlspecialchars ($_POST['description']);
        
        $target = getcwd ()."\\".$_FILES['file']['name'];
        if (move_uploaded_file ($_FILES['file']['tmp_name'], $target))
            echo "File berhasil diaplot";
        else
            echo "File gagal diaplot";
    }
    else
        echo "File empty";
?>
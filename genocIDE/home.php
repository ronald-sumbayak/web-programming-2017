<?php
include ('checksession.php');
$errorupload = " ";
if ($_POST) {
    if ($open = fopen ($_FILES['file']['tmp_name'], 'r')) {
        if ($read = fread ($open, $_FILES['file']['size'])) {
            $content  = htmlspecialchars ($read, ENT_QUOTES);
            $name     = $_POST['name'];
            $mimetype = $_FILES['file']['type'];
            $size     = $_FILES['file']['size'];
            $ext      = pathinfo ($_FILES['file']['name'], PATHINFO_EXTENSION);
            $allowed  = array ("cpp", "c", "java", "html", "css", "cs", "js", "py", "json", "xml", "ini", "sql");
            if (in_array ($ext, $allowed)) {
                include ('dbconn.php');
                $own = $_SESSION['user'];
                $res = mysqli_query ($link, "insert into files (own, filename, filetype, size, ext, content) values ('$own', '$name', '$mimetype', '$size', '$ext', '$content')") or die (mysqli_error ($link));
                if ($res) {
                    mysqli_close ($link);
                }
            }
            else $errorupload = "Only support " . implode (',', $allowed);
        }
    }
}

include ('dbconn.php');
include ('getlang.php');
$user = $_SESSION['user'];
$files = mysqli_query ($link, 'select * from files where own = "' . $user . '"');
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div id="header">
            <a id="header-title">Codes of <?php echo $user ?>:</a>
            <a href="logout.php" type="submit" class="btn2" style="display:inline-block; float:right">Logout</a>
        </div>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Filename" maxlength="25" required>
            <input type="file" name="file" required>
            <input type="submit" name="upload" value="Upload">
            <?php if ($errorupload) { ?>
            <div style="color: #D32F2F; font-weight: bold"><?php echo $errorupload ?></div>
            <?php } ?>
        </form>
        <table style="table-layout: fixed; width: 100%">
            <?php while ($row = mysqli_fetch_assoc ($files)) { ?>
            <tr style="display: block">
                <td style="width:55%"><?php echo $row['filename'] . '.' . $row['ext']; ?></td>
                <td style="width:20%"><?php echo getLanguage ($row['ext']); ?></td>
                <td><a href="view.php?file=<?php echo $row['id']; ?>" target="_blank">view</a></td>
                <td><a href="edit.php?file=<?php echo $row['id']; ?>">edit</a></td>
                <td><a href="delete.php?file=<?php echo $row['id']; ?>">delete</a></td>
                <td><a href="download.php?file=<?php echo $row['id']; ?>">download</a></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "ppwebb";

$link = mysqli_connect ($host, $username, $password, $database);
mysqli_select_db ($link, $database);
$files = mysqli_query ($link, "select * from files");
?>

<html>
<head>
    <title>PPWEBB - Download</title>
</head>
<body>
    <h1>Dir</h1>
    <table border="1">
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Size</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc ($files)) { ?>
    <tr>
        <td><a href="download.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
        <td><?php echo $row['type']; ?></td>
        <td><?php echo $row['size']; echo " B" ?></td>
    </tr>
    <?php } ?>
    </table>
</body>
</html>

<?php
mysqli_close ($link);
?>
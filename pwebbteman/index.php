<?php
include ('dbconn.php');
$friends = mysqli_query ($link, "select * from teman");
?>

<!doctype html>
<html>
<head>
	<title>Teman Saya</title>
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="lib/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/teman.css">
</head>
<body>

	<div class="page-header">
		<h1>Teman Saya</h1>
	</div>

	<a class="btn btn-success" href="tambah_teman.php" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i>
Tambah Teman</a>

	<table class="table table-bordered"> 
		<tr>
			<td>Nama</td>
			<td>Gender</td>
			<td>Email</td>
			<td>Facebook</td>
			<td>Foto</td>
			<td colspan="2">Aksi</td>
		</tr>
        
        <?php while ($row = mysqli_fetch_assoc ($friends)) { ?>
        <tr>
            
			<td><?php echo $row['nama'] ?></td>
			<td><?php echo $row['gender'] ?></td>
			<td><?php echo $row['email'] ?></td>
			<td><?php echo $row['fb'] ?></td>
            <?php
            $foto = $row['foto'];
			echo '<td><img class=" img-responsive" width="50" height="50" alt="" src="data:image/png;base64,'.base64_encode($foto).'"></td>';
            ?>
			<td><a href="edit_teman.php?id=<?php echo $row['id'] ?>">Edit</a></td>
            <td><a href="hapus_teman.php?id=<?php echo $row['id'] ?>">Delete</a></td>
		</tr>
        <?php } ?>
        
	</table>

	
 	<script src="lib/jquery/jquery-3.2.0.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
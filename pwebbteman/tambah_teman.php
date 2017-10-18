<!doctype html>
<html>
<head>
	<title>Tambah Teman Saya</title>
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="lib/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="page-header">
		<h1>Tambah Teman Baru</h1>
	</div>
	
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
		    <label for="nama">Nama</label>
		    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
		</div>
		<div class="form-group">
		    <label for="gender">Gender</label>
		    <label class="radio-inline">
			  <input type="radio" name="gender" id="genderRadio1" value="L"> L
			</label>
			<label class="radio-inline">
			  <input type="radio" name="gender" id="genderRadio2" value="P"> P
			</label>
		</div>
		<div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
		</div>
		<div class="form-group">
		    <label for="nama">Facebook</label>
		    <input type="text" name="fb" class="form-control" id="nama" placeholder="Facebook">
		</div>
		<div class="form-group">
			<label for="nama">Foto</label>
		    <input type="file"  name="foto" id="foto">
		</div>

		<a><button type="submit" class="btn btn-default">Simpan</button></a>
	</form>

	
 	<script src="lib/jquery/jquery-3.2.0.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?php
if ($_POST) {
    if ($open = fopen ($_FILES['foto']['tmp_name'], 'r')) {
        if ($read = fread ($open, $_FILES['foto']['size'])) {
            $name   = $_POST['nama'];
            $gender = $_POST['gender'];
            $email  = $_POST['email'];
            $fb     = $_POST['fb'];
            $foto   = addslashes ($read);
            
            include ('dbconn.php');
            $q = mysqli_query ($link, "insert into teman (nama, gender, email, fb, foto) values ('$name', '$gender', '$email', '$fb', '$foto')");
            header ("Location: index.php");
        }
    }
}
?>
<?php 
require 'functions.php';
if (isset($_POST['tambah'])){
	if(tambah($_POST, $_FILES) > 0){
		echo "<script>
		alert('data berhasil ditambahkan!'); 
		document.location.href = 'admin.php'; </script>";
	}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Daftar Film</title>
</head>
<body>
	<h3>Daftar Film</h3>
	<form method="post" action="" enctype="multipart/form-data">
		<ul>
			<li>
				<label>Nama Film : </label> <br>
				<input type="text" name="nama_film" required>
			</li>
			<li>
				<label>Sutradara :  </label> <br>
				<input type="text" name="sutradara" required>
			</li>
			<li>
				<label>Tahun Rilis :</label> <br>
				<input type="text" name="tahun_rilis" required>

			</li>
			<li>
				<label>Genre :</label><br>
				<input type="text" name="genre" required>
			</li>
			<li>
				<label>pendapatan :</label> <br>
				<input type="text" name="pendapatan" required>
			</li>
			<!-- <li>
				<label>Produksi :</label> <br>
				<input type="text" name="nama_produksi" required="">
			</li> -->
			<li>
				<label>gambar :</label><br>
				<input type="file" name="gambar">
			</li>
			<li>
				<button type="submit" name="tambah">Tambah Data</button>
			</li>
		</ul>
	</form>

</body>
</html>
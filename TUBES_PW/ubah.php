<?php
require ('functions.php');

$id = $_GET['id'];

$flm = query("SELECT * FROM film WHERE id = $id")[0];
// $film = query("SELECT * FROM film INNER JOIN produksi ON film.id_produksi = produksi.id_produksi");


if(isset($_POST['ubah'])) {
	if(ubah($_POST) > 0) {
		echo"<script>
		alert('data berhasil diubah');
		document.location.href = 'admin.php';
		</script>";
	} else {
		echo"<script>
		alert('data gagal diubah');
		document.location.href = 'admin.php';
		</script>";
	}


}




?>
<!DOCTYPE html>
<html>
<head>

	<title>Form Film</title>

</head>
<body>	
		<h3>Form Ubah Data Film</h3>

		<form  action="" method="post" enctype="multipart/form-data">

			<input type="hidden" name="id" value="<?= $flm['id']; ?>">
			<input type="hidden" name="gambarLama" value="<?= $flm['gambar']; ?>">
			
			<label for="nama_film"> Nama Film :</label><br>
			<input type="text" name="nama_film" id="nama_film" value="<?= $flm['nama_film']; ?>"> <br><br>

			<label for="sutradara">Sutradara</label><br>
			<input type="text" name="sutradara" id="sutradara" value="<?= $flm['sutradara']; ?>"><br><br>

			<label for="tahun_rilis">Tahun Rilis :</label><br>
			<input type="text" name="tahun_rilis" id="tahun_rilis" value="<?= $flm['tahun_rilis']; ?>"><br><br>

			<label for=" genre"> Genre :</label><br>
			<input type="text" name="genre" id="genre" value="<?= $flm['genre']; ?>"><br><br>

			<label for="pendapatan"> Pendapatan :</label><br>
		<input type="text" name="pendapatan" id="pendapatan" value="<?= $flm['pendapatan']; ?>"><br><br>

        <!-- <label for="nama_produksi"> produksi :</label><br>
		<input type="text" name="nama_produksi" id="nama_produksi" value="<?= $flm['nama_produksi']; ?>"><br><br> -->

			<label for="gambar"> Gambar :</label><br>
			<img src="asset/img/<?= $flm["gambar"];  ?>" width= '60'> <br>
			<input type="file" name="gambar" id="gambar" value="<?= $flm['gambar']; ?>"><br><br>

			<button type="submit" name="ubah">Ubah!</button>
			<a href="index.php"><button type="button">Kembali</button></a>
			</form>




</body>
</html>
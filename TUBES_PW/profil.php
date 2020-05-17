<?php 

if (!isset($_GET['id'])) {
	header("Location: index.php");
	exit;
}

require 'functions.php';
$id = $_GET['id'];

$flm = query("SELECT * FROM film WHERE id = $id")[0];




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<title>Profil</title>
</head>
<body>
	<div class="tampil1">
		<h1 class="warna" style="text-align: center;">Profil Mobil</h1>
		
		<div class="container">
			<div class="content" style="text-align: center;">
				<div class="text-center">
					<img src="asset/img/<?= $flm['gambar']; ?>" style="width: 400px; height: 600px;" class='rounded-circle'>
				</div>
					<table class="table table-borderless"style="margin: auto;" >
						<tbody>
						    <tr>
						      	<td class="text-center h4" >Nama Film</td>
						      	<td class="text-center h4">:</td>
						      	<td class="text-center h4"><?= $flm['nama_film'] ?></td>
						    </tr>
						    <tr>
						      	<td class="text-center h4">Sutradara</td>
						      	<td class="text-center h4">:</td>
						      	<td class="text-center h4"><?= $flm['sutradara'] ?></td>
						    </tr>
						    <tr>
						      	<td class="text-center h4">Tahun Rilis</td>
						      	<td class="text-center h4">:</td>
						      	<td class="text-center h4">Rp. <?= $flm['tahun_rilis'] ?></td>
						    </tr>
						    <tr>
						      	<td class="text-center h4">Pendapatan</td>
						      	<td class="text-center h4">:</td>
						      	<td class="text-center h4">Rp. <?= $flm['pendapatan'] ?></td>
						    </tr>
						  </tbody>
					</table>
					<div class="text-center"><a href="index.php"><button type="button" class="btn btn-dark">Kembali</button></a></div>
				</div>
			</div>
		</div>
	</div>

	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['submit'])){
	header('Location: login.php');
	  exit;
}
require 'functions.php';
// $film = query("SELECT * FROM film ");
$film = query("SELECT * FROM film INNER JOIN produksi ON film.id_produksi = produksi.id_produksi");
 


if (isset($_POST["cari"])){
	$film = cari($_POST["keyword"]);
 $query_cari = "SELECT * FROM film JOIN produksi ON film.id_produksi = produksi.id WHERE id";
 }



?>

<html>
<head>
	<script src="asset/js/jquery-3.4.0.min.js"></script>
	<script src="asset/js/script2.js"></script>

	<title></title>
	<body>
		<p><a href="login.php">Logout</a></p>
		<!-- <div class="container"> -->
			<h3>Daftar Film</h3>
            <form action="" method="post" >
            	<input type="text" name="keyword" placeholder="search..." size="40" autocomplete="off" id="keyword">
            	<button type="text" name="cari"id="tombol-cari">Cari</button>
            	
            <label>Urutkan berdasarkan :</label>
   <select id="urutan">
   	<option value="nama_film">nama</option>
   	<option value="tahun_rilis">tahun</option>
   </select>


            </form>
			<a href="tambah.php"><button>Tambah Data</button></a>
        <div id="container">
		<table border="1" cellspacing="0" cellpadding="5">
	<tr>
				<th>#</th>
				<th>Nama Film</th>
				<th>Sutradara</th>
				<th>Tahun Rilis</th>
				<th>Genre</th>
				<th>Pendapatan</th>
				<th>Produksi</th>>
				<th>Gambar</th>
				<th>Aksi</th>

    </tr>
	<?php $i = 1; ?>
	<?php foreach ($film as $flm) :?>
		<tr>
				<td><?=$i++; ?></td>

				
			<td><a href="profil.php?id=<?= $flm['id']?>"><?=$flm['nama_film']; ?></a></td>
			<td><?=$flm['sutradara']?></td>
			<td><?=$flm['tahun_rilis']?></td>
			<td><?=$flm['genre']?></td>
			<td><?=$flm['pendapatan']?></td>
			<td><?=$flm['nama_produksi']?></td>
			<td><img src="asset/img/<?= $flm['gambar']?>"width="80px" high="50px"></td>
			<td>
					<a href="ubah.php?id=<?= $flm['id']?>">Ubah|</a>
					<a href="hapus.php?id=<?= $flm['id']?>" onclick="return confirm('Yakin?')">|Hapus</a>

				</td>
			</tr>
			
		
			<?php endforeach; ?>
		</table>
		</div>
	</body>
</head>
<script type="text/javascript">  

let urutan = document.getElementById('urutan');



urutan.addEventListener('change',function() {
	//ajax
	let xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4 && xhr.status == 200){
			container.innerHTML = xhr.responseText;
		}
	}
  xhr.open('get','sorting.php?urutan=' + urutan.value);
  xhr.send()

});
</script>
</html>
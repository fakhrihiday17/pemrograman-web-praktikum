<?php
require 'functions.php';

$urutan = $_GET['urutan'];
	$query_sorting = "SELECT * FROM film  ORDER BY $urutan ASC ";
	$film = query($query_sorting);

?>

<table border="1" cellspacing="0" cellpadding="5">
	<tr>
				<th>#</th>
				<th>Nama Film</th>
				<th>Sutradara</th>
				<th>Tahun Rilis</th>
				<th>Genre</th>
				<th>Pendapatan</th>
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
			<td><img src="asset/img/<?= $flm['gambar']?>"width="80px" high="50px"></td>
			<td>
					<a href="ubah.php?id=<?= $flm['id']?>">Ubah|</a>
					<a href="hapus.php?id=<?= $flm['id']?>" onclick="return confirm('Yakin?')">|Hapus</a>

				</td>
			</tr>
			
		
			<?php endforeach; ?>
		</table>
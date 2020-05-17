<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$film = query("SELECT * FROM film");


$mpdf = new \Mpdf\Mpdf();

$html ='<!DOCTYPE html>
<html>
<head>
	<title>Film</title>
</head>
<body>
<h1>Daftar Film</h1>
<table border="1" cellspacing="0" cellpadding="5">
	<tr>
				<th>#</th>
				<th>Nama Film</th>
				<th>Sutradara</th>
				<th>Tahun Rilis</th>
				<th>Genre</th>
				<th>Pendapatan</th>
				<th>Gambar</th>
				

    </tr>';
     $i = 1;
    foreach ($film as $flm){
    	$html .= '<tr>
    	<td>'. $i++ .'</td>
    	<td><img src="asset/img/'. $flm["gambar"] .' " width="100"></td>
    	<td>'.$flm["nama_film"].'</td>
    	<td>'.$flm["sutradara"].'</td>
    	<td>'.$flm["tahun_rilis"].'</td>
    	<td>'.$flm["genre"].'</td>
    	<td>'.$flm["pendapatan"].'</td>
    	</tr>';
    }
$html .='</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar_film.pdf', 'I');

?>


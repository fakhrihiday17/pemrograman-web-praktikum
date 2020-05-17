<?php
function koneksi(){


 $conn = mysqli_connect("localhost", "root", "", "film") or die ("Koneksi ke DB gagal!");
 mysqli_select_db($conn, "film") ;


return $conn;

}

function query($query){


	$conn = koneksi();
	$result = mysqli_query($conn, $query);

	$rows=[];
	while ( $row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	};

	return $rows;
}


function tambah($data){

	$conn = koneksi();


	$namaf = htmlspecialchars($data['nama_film']);
	$sutradara = htmlspecialchars($data['sutradara']);
	$tahunril = htmlspecialchars($data['tahun_rilis']);
	$genre = htmlspecialchars($data['genre']);
	$pendapatan = htmlspecialchars($data['pendapatan']);
	$produksi = htmlspecialchars($data['nama_produksi']);
	
	// $gambar = htmlspecialchars($data['gambar']);


	// $querytambah = "INSERT INTO film
	// 						VALUES ('', '$namaf','$sutradara','$tahunril','$genre','$pendapatan','$gambar')";

	// 						mysqli_query($conn, $querytambah);
	// 						return mysqli_affected_rows($conn);

    //upload gambar
	$gambar = upload();
	if( !$gambar) {
		return false;
	}

	$query = "INSERT INTO film VALUES ('', '$namaf', '$sutradara', '$tahunril', '$genre', '$pendapatan', '$gambar','$produksi')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);


}


function upload() {
	$conn = koneksi();

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tdk ada gambar di upload
	if ( $error === 4) {
		echo "<script>
			alert('pilih gambar terlebih dahulu');
			</script>";
			return false;
	}

	// cek apakah yg diupload
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "
		<script>
			alert('yang anda upload bukan gambar!');
		</script>";
		return false;
	}

	// cek jika ukuran besar
	if( $ukuranFile > 1000000) {
		echo "
		<script>
			alert('ukuran gambar terlalu besar!');
		</script>";

		return false;
	}

	// lolos gambar

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	

	move_uploaded_file($tmpName, 'asset/img/' . $namaFileBaru);
	return $namaFileBaru;

}

function hapus($id){

	$conn= koneksi();
	mysqli_query($conn, "DELETE FROM film WHERE id = $id");

	return mysqli_affected_rows($conn);

}

function ubah($data){
	$conn       = koneksi();
    $id         = $data['id'];

	$namaf      = htmlspecialchars($data['nama_film']);
	$sutradara  = htmlspecialchars($data['sutradara']);
	$tahunril   = htmlspecialchars($data['tahun_rilis']);
	$genre       = htmlspecialchars($data['genre']);
	$pendapatan = htmlspecialchars($data['pendapatan']);
	// $produksi =htmlspecialchars($data['nama_produksi']);
	$gambarLama = htmlspecialchars($data['gambarLama']);


	   if($_FILES['gambar']['error'] === 4){
	   	$gambar = $gambarLama;
	   }else{
	   	$gambar = upload();

	   }
	




	$queryubah = "UPDATE film SET
					nama_film = '$namaf',
					sutradara ='$sutradara',
					tahun_rilis = '$tahunril',
					genre = '$genre',
					pendapatan ='$pendapatan',
					-- nama_produksi ='$produksi',
					gambar = '$gambar'

					WHERE id = '$id' ";
							mysqli_query($conn, $queryubah);
							return mysqli_affected_rows($conn);
}

 function cari($keyword){
 	$querycari = "SELECT * FROM film WHERE
 	             nama_film  LIKE '%$keyword%' OR
 	             sutradara  LIKE '%$keyword%' OR
 	             genre      LIKE '%$keyword%' OR
 	             pendapatan LIKE '$keyword%' OR
 	             gambar     LIKE '%$keyword%'" ;
 	    return query($querycari);
 }



 function registrasi($data) {
	

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string(koneksi(), $data["password"]);
	$password2 = mysqli_real_escape_string(koneksi(), $data["password2"]);
	


	$result = mysqli_query(koneksi(), "SELECT username FROM user WHERE username = '$username'");
	if ( mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('username  sudah terdaftar');
			  </script>";
			  return false;
	}



	if ( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
			  </script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);
	
	mysqli_query(koneksi(), "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows(koneksi());
} 
 ?>




<?php

require 'functions.php';
$film = query("SELECT * FROM film");

if (isset($_POST["cari"])){
	$film = cari($_POST["keyword"]);
}



?>

<html>
<head>
	<script src="asset/js/jquery-3.4.0.min.js"></script>
	<script src="asset/js/script.js"></script>
	<script src="asset/js/bootstrap.js"></script>
    <link rel="stylesheet" href="asset/css/bootstrap.css">

	<title></title>
	</head>
	<body>
		
		<!-- navbar -->
		<nav class="navbar navbar-light bg-light">
     <a class="navbar-brand">Navbar</a>
     <form class="form-inline" method="post" action="">
     <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Search..." aria-label="Search" autocomplete="off" id="keyword">
     <button class="btn btn-outline-success my-2 my-sm-0" type="text" id="tombol-cari" name="cari">cari</button>
     <button class="btn btn-outline-success my-2 my-sm-0"><p><a href="login.php">Login Admin</a></p></button>
     <button class="btn btn-outline-success my-2 my-sm-0" ><a href="cetak.php" target="_blank">cetak</a></button>
     </form>
     </nav>
      <!--  akhir navbar -->

		
		
		
 <h3 style="text-align: center;">Daftar Film</h3>

 
  <div class="container" id="container" style="padding: 35px; margin-top: 90px;" >  

 <?php foreach ($film as $flm) :?>
 	
 		<div class="card" style="width: 12rem; display: inline-block; margin: 10px 5px;>
 			<a href=" profil.php?id=<?= $flm['id']?>"></a>
 			<img src="asset/img/<?= $flm['gambar']?>" class="card-img-top" style="height: 300px">
 				<div class="card-body">	
 			      <p class="card-text"><a href="profil.php?id=<?= $flm['id']?>"><?=$flm['nama_film']; ?></a></p>
 			    </div>
 		</div>
 		
 	
	 <?php endforeach; ?>  
    
</div>






 
  <!--  </div> -->
 <!-- <?php foreach ($film as $flm) :?>
 
	
		    
				

				
			  <td><a href="profil.php?id=<?= $flm['id']?>"><?=$flm['nama_film']; ?></a></td> 
			  <img src="asset/img/<?= $flm['gambar']?>"width="80px" high="50px">  
		 
		
		 	 <?php endforeach; ?>  -->
      

  </body>
   

</html>
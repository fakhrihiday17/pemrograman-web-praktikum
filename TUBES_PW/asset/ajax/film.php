<?php 
require '../../functions.php';


$keyword = $_GET["keyword"];
 	$querycari = "SELECT * FROM film WHERE
 	             nama_film  LIKE '%$keyword%'" ;
 	    $film = query($querycari);



?>




 
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


  </body>
   

</html>
$(document).ready(function() {
	// hilangkan tombol-cari
	$('#tombol-cari').hide();


// event keyword ditulis
$('#keyword').on('keyup', function() {
	// muncul loding

	// ajax load
// 	$('#container').load('ajax/film.php?keyword=' + $('#keyword').val());

// get
$('#container').load('asset/ajax/film2.php?keyword=' + $('#keyword').val())

});

});

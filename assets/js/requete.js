$(document).ready(function(){
	categorie();
	 function categorie() {
		$.({
			url: "Produits.php",
			method:"POST",
			data:{ categorie:1},
			success: function(data){
				$('#get_categorie').html(data);
	 }
	 })
	 }
})

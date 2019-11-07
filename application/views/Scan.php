<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('jquery.toast.min'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('all'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('font-awesome.min'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('PNotifyBrightTheme'); ?>" />
 <script src="<?php echo js_url('pnotify.custom.min'); ?>"></script>
 <script src="<?php echo js_url('PNotify'); ?>"></script>
 <script src="<?php echo js_url('PNotifyButtons'); ?>"></script>
 <script src="<?php echo js_url('PNotifyMobile'); ?>"></script>
 <script src="<?php echo js_url('PNotifyConfirm'); ?>"></script>
 <script src="<?php echo js_url('PNotifyStyleMaterial'); ?>"></script>
 <script src="<?php echo js_url('jquery'); ?>"></script>
<style>
     #info{
       background-color: #ffffff;
     width: 0px;
     height: 0px;
     border: 0;
     color: #FFF;
    }
	
 </style>
	
 </style>
  <div class="container-fluid">
  <div class="row">
   <div class="col-md-7">
   <div class="panel panel-primary" >
    <div class="panel-heading "><span class="glyphicon glyphicon-user"> NOUVEAU PELERIN</div>
  <div class="panel-body">
 <center><div class="row">
 <form class="online" name="f" id="form1" method="post" action="<?php echo site_url('Scan') ?>">
 <?php echo $info; ?>
 <div class="col-md-12">
 <div class="form-group input-group">
	<input type="text" id="info" style="display:nones"  name="info"  />
	</div>
 </div>
 <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Nom</span>
					</span>
	<input type="text" id="nom" readonly placeholder=" Votre Nom" name="txt_nom" value="<?php echo set_value('txt_nom'); ?>" class="form-control form-control-sm" />
	</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span > Prenom</span>
					</span>
	<input type="text" readonly id="nom" placeholder=" Votre Prenom" name="txt_nom" class="form-control" />
	</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >CNIB/PASSPORT</span>
					</span>
	<input type="text" id="nom" readonly placeholder=" CNIB OU PASSEPORT" name="txt_nom" class="form-control" />
	</div>
 
 </div>

  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Date naissance</span>
					</span>
	<input type="email" id="nom" readonly placeholder=" Date de naissance" name="txt_nom" class="form-control" />
	</div>
 </div>
  <div class="col-md-6">
  <div class="form-group input-group">
<span class="input-group-addon">
						<span >Sexe</span>
					</span>
	<select class="form-control" readonly />
<option>Male</option>
<option>Famel</option>
</select>
</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Nationalité</span>
					</span>
	<input type="email" id="nom" readonly placeholder=" Nationalité" name="txt_nom" class="form-control" >
	</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Date delivrance</span>
					</span>
	<input type="text" id="nom"  placeholder="Date delivrance" name="txt_nom" class="form-control" />
	</div>
 
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Date d'expiration</span>
					</span>
	<input type="password" id="nom" readonly placeholder="Date d'expiration" name="txt_nom" class="form-control" />
	</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group">

	<input type="submit" id="nom"value="Envoyer"  class="form-control btn btn-primary">
	</div>
 </div>
 </form>
 </div></center>
  
  </div>
  </div>
   
   </div>
   <div class="col-md-2" style="float:right;">
 <div class="form-group input-group">

	<button type="submit" class="btn btn-danger" onclick="myFunction()" value="" id="script" />Activer le script</button>
	</div>
 </div>
  <div class="col-md-5" style="float:right;">
  <div class="panel panel-info">
  <div class="panel-body" id="tableauP">
  <?php 
	  echo $profil;
  ?>
  </div>
  </div>
  </div>
  </div>
   <script src="<?php echo js_url('jquery'); ?>"></script>
   <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
   <!--<script> 
        $(document).ready(function() {
      
    // Lorsque je soumets le formulaire
    $('#form1').on('submit', function(e) {
        e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire
 
        var $this = $(this); // L'objet jQuery du formulaire
 
        // Je récupère les valeurs
        var info = $('#info').val();
      var element=info.split(',');
      if(element.length==9){
        var nom=element[0];
      var prenom=  element[1];
      var sexe= element[2];
      var birth= element[3];
      var expire= element[4];
      var number= element[6];
      var etat= element[6];
      var pays = element[7]; 
	  
       
      if(nom.length>3 && prenom.length>3 && sexe.length>3 && number.length>3 && birth.length>3
              && expire.length>3 && etat.length>3 && pays.length>3){
        nom=nom.substr(3);
        prenom=prenom.substr(3);
        sexe=sexe.substr(3);
        birth=birth.substr(3);
        expire=expire.substr(3);
        number=number.substr(3);
        etat=etat.substr(3);
        pays=pays.substr(3);
 
 if(nom.indexOf('_')<0 && prenom.indexOf('_')<0 && sexe.indexOf('_')<0 && number.indexOf('_')<0 && birth.indexOf('_')<0
              && expire.indexOf('_')<0 && etat.indexOf('_')<0 && pays.indexOf('_')<0){
      // Envoi de la requête HTTP en mode asynchrone
	
            $.ajax({
                url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
                type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
                data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                success: function(html) { // Je récupère la réponse du fichier PHP
                    // J'affiche cette réponse
                   // if(html=='false'){
						  //alert("bien recuperer!!!"+nom); 
                      var site="<?php echo site_url('Scan');?>";
					  window.location=site;
                    // $(document).load(site);
                     

	//}
                    
                }
            });
      }else{
   alert("Erreur de Lecture de la Carte Veuillez réessayer!!!");    
      }}else{
   alert("Erreur de Lecture de la Carte Veuillez réessayer!!!");    
      }}else{
      //alert(element.length);
      alert("Erreur de Lecture de la Carte Veuillez réessayer!!!");

      }
   document.getElementById('info').value = '';       
        });  
});
    </script> -->
  <script>
function myFunction() {
   $("#info").val($("#info").val()).focus();
$('#info').on('blur',function (event) {
    var blurEl = $(this);
    setTimeout(function() {blurEl.focus()},3000) });
    $("html").click(function() {
        $("#info").val($("#info").val()).focus();
    }); 
   $("button").css({ "backgroundColor": "lightgreen", "color": "white" });
   $("button").html("Script activé!");
}
</script>
<script>

    
 
   
       

        </script>
</body>
</html>
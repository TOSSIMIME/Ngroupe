<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<meta charset="utf8">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('jquery.toast.min'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo css_url('pnotify.custom.min'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo css_url('horloge'); ?>" />
  <script src="<?php echo js_url('jquery.form'); ?>"></script>
 <script src="<?php echo js_url('pnotify.custom.min'); ?>"></script>
 <script src="<?php echo js_url('PNotify'); ?>"></script>
 <script src="<?php echo js_url('PNotifyButtons'); ?>"></script>
 <script src="<?php echo js_url('PNotifyMobile'); ?>"></script>
 <script src="<?php echo js_url('PNotifyConfirm'); ?>"></script>
 <script src="<?php echo js_url('PNotifyStyleMaterial'); ?>"></script>
 <script src="<?php echo js_url('jquery'); ?>" ></script>
 <body style="margin:auto;">
 <center>
  <div class="container-fluid" >
  <div class="row">
  <div class="col-md-2" style="float:left; margin-left:22px;">
  </div>
   <div class="col-md-7">
   <div class="panel panel-primary" >
  <div class="panel-body">
  <div class="col-md-12" >
  <div class="panel panel-info">
    <div class="panel-heading "><h4><span class="glyphicon glyphicon-envelope" style="font-size:24px;"> DEMANDE_ADHESION_A_LA_PLATEFORME</h4></div>
  <div class="panel-body">
  <form method="post" action="<?php echo site_url('Welcome/adhesion'); ?>">
  <?php echo $info;?>
  <div class="col-md-12">
<div class="form-group input-group">
<span class="input-group-addon">
						<span class="glyphicon glyphicon-user" style="font-size:18px;"> Entrez votre nom et prenoms:</span>
					</span>
	<input type="text" name="nom_user" class="form-control" placeholder="Nom utilisateur" /><br>
	</div>
	</div>
	<div class="col-md-12">
<div class="form-group input-group">
<span class="input-group-addon">
						<span class="glyphicon glyphicon-user" style="font-size:18px;"> Entrez votre email:</span>
					</span>
	<input type="text" name="email_user" class="form-control" placeholder="Nom utilisateur" /><br>
	</div>
	</div>
	<div class="col-md-12">
<div class="form-group input-group">
<span class="input-group-addon">
					<span class="glyphicon glyphicon-earphone" style="font-size:18px;"> Entrez numero du telephone:</span>
					</span>
	<input type="text" name="phone_user" class="form-control" placeholder="Nom utilisateur" /><br>
	</div>
	</div>
	<div class="col-md-12">
<div class="form-group input-group">
<span class="input-group-addon">
						<span class="glyphicon glyphicon-th-large" style="font-size:18px;"> Entrez le nom de votre structure:</span>
					</span>
	<input type="text" name="agence" class="form-control" placeholder="Nom utilisateur" /><br>
	</div>
	</div>
	<div class="col-md-12">
<div class="form-group input-group">
<span class="input-group-addon">
						<span class="glyphicon glyphicon-th-large" style="font-size:18px;"> Entrez email de votre structure:</span>
					</span>
	<input type="text" name="email_agence" class="form-control" placeholder="Nom utilisateur" /><br>
	</div>
	</div>
	<div class="col-md-12">
	<div class="form-group input-group">
<span class="input-group-addon">
						<span class="glyphicon glyphicon-envelope" style="font-size:18px;"> Message :</span>
					</span>
	<input type="textarea" name="message" class="form-control" id="password" placeholder="Entrez E-mail de l'agence" />
	</div>
	</div>
	
	<div class="col-md-12">
	<div class="form-group input-group">
	<center><input type="submit" style="width:200%;"class="btn btn-success"  value="Envoyer"></center>
	</div>
	</div>
	</form>
	<p><a href="<?php echo site_url('Welcome'); ?>" title="Se connecter" ><span class="glyphicon glyphicon-backward" style="font-size:18px;"></span>   
	<span class="glyphicon glyphicon-forward" style="font-size:18px;"></span></a></p>
  </div>
  </div>
  </div>
 
  </div>
   
   </div>
   </div>
 
  </div>
  </div>
  </center>
   <script src="<?php echo js_url('jquery'); ?>"></script>
   <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
   
  
</body>
</html>
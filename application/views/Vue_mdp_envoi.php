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
  <div class="panel-body">
  <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Bien envoyé</h4>
  <p>Nous avons recu votre requete de retrouvage de votre mot de passe perdu ou oublie, nous vous prions d'etre patient</p>
  <hr>
  <p class="mb-0">Nous allons vous repondre dans quelque instant dans votre e-mail veuillez le consultez ilterierement.<br>cliquez ici : <a href="https://www.google.com/intl/fr/gmail/about/" target="_blank"><?php echo $this->session->flashdata('message');?></p>
</div>
	<p class="btn btn-success"><a href="<?php echo site_url('Welcome'); ?>" title="Se connecter" ><span class="glyphicon glyphicon-backward" style="font-size:18px;"></span></a>  <a href="<?php echo site_url('Welcome'); ?>">  <span class="glyphicon glyphicon-forward" style="font-size:18px;"></span> </a></p>
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
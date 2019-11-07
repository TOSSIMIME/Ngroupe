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
  <!--<div class="col-md-1" ></div>-->
  <div class="col-md-2" style="float:left; margin-left:22px;">
 
  </div>
   <div class="col-md-7">
   <div class="panel panel-primary" >
    <!--<div class="panel-heading "><span class="glyphicon glyphicon-th"> MENU PRINCIPAL</div>-->
  <div class="panel-body">
  <div class="col-md-12" >
  <div class="panel panel-info">
    <div class="panel-heading "><h4><span class="glyphicon glyphicon-envelope" style="font-size:24px;"> RECUPERATION DE MOT DE PASSE </h4></div>
  <div class="panel-body">
  <form method="post" action="<?php echo site_url('Welcome/mdp_envoi'); ?>">
  <?php echo $info;?>
  <div class="col-md-12">
<div class="form-group input-group">
<span class="input-group-addon">
						<span class="glyphicon glyphicon-envelope" style="font-size:18px;"> Entrez votre E-mail:</span>
					</span>
	<input type="text" name="email_user" value="<?php echo set_value('email_user'); ?>"class="form-control" placeholder="Nom utilisateur" /><br>
	</div>
	</div>
	<div class="col-md-12">
	<div class="form-group input-group">
<span class="input-group-addon">
						<span class="glyphicon glyphicon-envelope" style="font-size:18px;"> Entrez E-mail de l'agence:</span>
					</span>
	<input type="text" name="email_agence" value="<?php echo set_value('email_agence'); ?>" class="form-control" id="password" placeholder="Entrez E-mail de l'agence" />
	</div>
	</div>
	<div class="col-md-12">
  <div class="form-group input-group">
<span class="input-group-addon">
						<span class="glyphicon glyphicon-th-large" style="font-size:18px;"> Selectionnez votre agence:</span>
					</span>
					
	<select class="form-control" name="idag" required/>
<option>---Choix de l'agence--</option>
<?php if($agence){ foreach($agence as $ag){ ?>
        <option value="<?php echo $ag->ID_AG;?>"><?php echo $ag->NOM_AG;?></option>

       
		<?php }}?>
</select>
</div>
 </div>
	<div class="col-md-12">
	<div class="form-group input-group">
	<center><input type="submit" style="width:200%;"class="btn btn-success"  value="Envoyer"></center>
	</div>
	</div>
	</form>
	<p><a href="<?php echo site_url('Welcome'); ?>" title="Se connecter" ><span class="glyphicon glyphicon-backward" style="font-size:18px;"></span></a>  <a href="<?php echo site_url('Welcome'); ?>">  <span class="glyphicon glyphicon-forward" style="font-size:18px;"></span> </a></p>
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
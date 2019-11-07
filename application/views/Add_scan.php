<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('jquery.toast.min'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('all'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('font-awesome.min'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('PNotifyBrightTheme'); ?>" />
<script src="<?php echo js_url('jquery.form'); ?>"></script>
 <script src="<?php echo js_url('pnotify.custom.min'); ?>"></script>
 <script src="<?php echo js_url('PNotify'); ?>"></script>
 <script src="<?php echo js_url('PNotifyButtons'); ?>"></script>
 <script src="<?php echo js_url('PNotifyMobile'); ?>"></script>
 <script src="<?php echo js_url('PNotifyConfirm'); ?>"></script>
 <script src="<?php echo js_url('PNotifyStyleMaterial'); ?>"></script>
 <script src="<?php echo js_url('jquery'); ?>"></script>
  <div class="container-fluid">
  <div class="row">
   <div class="col-md-7">
   <div class="panel panel-primary" >
    <div class="panel-heading "><span class="glyphicon glyphicon-user"> NOUVEAU PELERIN</div>
  <div class="panel-body">
 <center><div class="row">
 <form class="online" name="f" method="post" action="<?php echo site_url('Pelerin/new_save') ?>">
 <?php echo $info; ?>
 <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span>Nom</span>
					</span>
	<input type="text" id="nom" readonly="readonly" placeholder=" Votre Nom" value="<?php echo $infos['nom'];?>" name="txt_nom" class="form-control form-control-sm" />
	</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span > Prenom</span>
					</span>
	<input type="text" readonly="readonly" id="nom" placeholder=" Votre Prenom" value="<?php echo $infos['prenom'];?>" name="txt_prenom" class="form-control mb-3" />
	</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >CNIB/PASSPORT</span>
					</span>
	<input type="text" id="nom" readonly="readonly" placeholder=" CNIB OU PASSEPORT" value="<?php echo $infos['number'];?>" name="txt_passport" class="form-control" />
	</div>
 
 </div>

  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Date naissance</span>
					</span>
	<input type="email" id="nom"readonly="readonly" placeholder="Date de naissance" value="<?php echo $infos['naiss'];?>" name="txt_naiss" class="form-control" />
	</div>
 </div>
  <div class="col-md-6">
  <div class="form-group input-group">
<span class="input-group-addon">
						<span >Sexe</span>
					</span>
	<select class="form-control" readonly="readonly" name="txt_sexe"/>
<option><?php echo $infos['sexe'];?></option>

</select>
</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Nationalité</span>
					</span>
	<input type="email" id="nom" readonly="readonly" placeholder=" Nationalité" value="<?php echo $infos['pays'];?>" name="txt_nation" class="form-control" >
	</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Date delivrance</span>
					</span>
	<input type="text" id="nom"  placeholder="Date delivrance"  name="txt_delivre" class="form-control" />
	</div>
 
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Date d'expiration</span>
					</span>
	<input type="text" id="nom" readonly="readonly" placeholder="Date d'expiration" value="<?php echo $infos['expire'];?>" name="txt_expir" class="form-control" />
	</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Vol pelerin</span>
					</span>
	<select class="form-control"  name="vols">
<option>Charter</option>
<option>Regulier</option>
</select>
	</div>
 </div>
  <div class="col-md-6">
  <div class="form-group input-group">
<span class="input-group-addon">
						<span >Localité</span>
					</span>
	<select class="form-control" name="locals" >
<option>OUAGADOUGOU</option>
<option>BOBO-DIOULASSO</option>
</select>
</div>
 </div>
 <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Telephone </span>
					</span>
	<input type="text" id="nom" placeholder="Telephone" name="txt_phone" class="form-control" />
	</div>
 </div>
 <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Personne en cas de besoin </span>
					</span>
	<input type="text" id="nom" placeholder="Personne en cas de besoin" name="txt_besoin" class="form-control" />
	</div>
 </div>
 <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Photo pelerin</span>
					</span>
	<input type="file" id="nom" placeholder=" Votre photo" name="txt_photo" class="form-control">
	</div>
 </div>
 <div class="col-md-6">
  <div class="form-group input-group">
<span class="input-group-addon">
						<span >Agence</span>
					</span>
	<select class="form-control" name="id_ag" >
	<?php if($_SESSION['type']==3 || $_SESSION['type']==2){  ?>
<option value="<?php echo $_SESSION['id_ag'];?>"><?php echo $_SESSION['agence'];?></option>
	<?php }elseif($liste_user){foreach($liste_user as $loop){?>
<option value="<?php echo $loop->ID_AG;?>"><?php echo $loop->NOM_AG;?></option>
	<?php }}?>
</select>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group">

	<input type="submit" id="nom"value="Enregistrer"  class="form-control btn btn-primary">
	</div>
 </div>
 </form>
 </div></center>
  
  </div>
  </div>
   
   </div>
  <div class="col-md-5" style="float:right;">
  <div class="panel panel-info">
  <div class="panel-body">
  <?php 
	  echo $profil;
  ?>
  </div>
  </div>
  </div>
  </div>
   
   <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
   <script src="<?php echo js_url('jquery.toast.min'); ?>"></script>
 

</body>
</html>
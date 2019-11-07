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
<style>
     #info{
       background-color: #ffffff;
     width: 0px;
     height: 0px;
     border: 0;
     color: #FFF;
    }
	
 </style>
  <div class="container-fluid">
  <div class="row">
   <div class="col-md-7">
   <div class="panel panel-primary" >
    <div class="panel-heading "><span class="glyphicon glyphicon-user"> NOUVEAU PELERIN</div>
	
  <div class="panel-body">
 <center><div class="row">
 <form class="online" method="post" action="<?php echo site_url('Pelerin/update') ?>">
  <?php echo $info; ?>
  <?php if($pelerin_edit){ foreach($pelerin_edit as $loop){ ?>
 <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Nom</span>
					</span>
	<input type="hidden" id="nom" value="<?php echo $loop->ID_PELERIN;?>" name="id" class="form-control form-control-sm" required />
	<input type="text" id="nom" value="<?php echo $loop->NOM_PELERIN;?>" name="txt_nom" class="form-control form-control-sm" required />
	</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span > Prenom</span>
					</span>
	<input type="text" id="nom" value="<?php echo $loop->PRENOM_PELERIN;?>" name="txt_prenom" class="form-control" required/>
	</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >CNIB/PASSPORT</span>
					</span>
	<input type="text" id="nom" value="<?php echo $loop->PASSEPORT;?>" name="txt_passport" class="form-control" required/>
	</div>
 
 </div>

  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Date naissance</span>
					</span>
	<input type="date" id="nom" value="<?php echo $loop->NAISS_PELERIN;?>" name="txt_naiss" class="form-control" required/>
	</div>
 </div>
  <div class="col-md-6">
  <div class="form-group input-group">
<span class="input-group-addon">
						<span >Sexe</span>
					</span>
	<select class="form-control"  name="txt_sexe"/>
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
	<input type="text" id="nom"value="<?php echo $loop->NATIONALITE;?>" name="txt_nation" class="form-control" required>
	</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Date delivrance</span>
					</span>
	<input type="date" id="nom" value="<?php echo $loop->DATE_DELIV;?>" name="txt_delivre" class="form-control" required/>
	</div>
 
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Date d'expiration</span>
					</span>
	<input type="date" id="nom" value="<?php echo $loop->DATE_EXPIR;?>" name="txt_expir" class="form-control" required/>
	</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Vol pelerin</span>
					</span>
	<select class="form-control" name="vols"  />
	
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
	<select class="form-control" name="locals" required>
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
	<input type="text" id="nom" value="<?php echo $loop->PHONE_PELERIN;?>" name="txt_phone" class="form-control" required/>
	</div>
 </div>
 <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Personne en cas de besoin </span>
					</span>
	<input type="text" id="nom" value="<?php echo $loop->BESOIN_PELERIN;?>" name="txt_besoin" class="form-control" required/>
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
	<?php }elseif($agence){foreach($agence as $loop){?>
<option value="<?php echo $loop->ID_AG;?>"><?php echo $loop->NOM_AG;?></option>
	<?php }}?>
</select>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group">

	<input type="submit" id="nom"value="Mise à jour"  class="form-control btn btn-primary ">
	</div>
 </div>
  <?php }} ?>
 </form>
 </div></center>
  
  </div>
  </div>
   
   </div>
   <div class="col-md-2">
 <div class="form-group input-group">
	</div>
 </div>
  <div class="col-md-5" style="float:right;">
  <div class="panel panel-info">
  <div class="panel-body">
  
  </div>
  </div>
  </div>
  </div>
   <script src="<?php echo js_url('jquery'); ?>"></script>
   <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
   
</body>
</html>
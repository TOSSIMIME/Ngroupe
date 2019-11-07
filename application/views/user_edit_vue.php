<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
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
 <link rel="stylesheet" type="text/css" href="<?php echo css_url('dataTables'); ?>"/>
 <script src="<?php echo js_url('dataTables'); ?>"></script>
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-4" style="float:left;">
  <div class="panel panel-primary">		
    <div class="panel-heading"><center><span class="glyphicon glyphicon-cog"></span> NOUVEL UTILISATEUR</center></div>
	 <?php echo $info;?>
  <div class="panel-body">
  <form method="post" action="<?php echo site_url('User/update') ?>" enctype="multipart/form-data"/>
  <?php if($user_edit){ foreach($user_edit as $loop){?>
	<center><div >
	 <div class="form-group input-group ">
	 <img width="112" height="50" border="2" src="<?php 
                     $photo = $loop->USER_PHOTO;
                  echo   image_user($photo);?>" title="Photo user" alt="ma photo"/>
	</div>
	</div>
	</center>
  <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Nom :</span>
</span>
	<input type="hidden" id="nom" value="<?php echo $loop->USER_ID;?>" name="id" class="form-control" />
	<input type="text" id="nom" value="<?php echo $loop->USER_NOM;?>" name="noms" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Prenoms :</span>
</span>
	<input type="text" id="nom" value="<?php echo $loop->USER_PRENOM;?>" name="prenom" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Telephone :</span>
</span>
	<input type="text" id="nom" value="<?php echo $loop->USER_PHONE;?>" name="phone" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >E-mail:</span>
</span>
	<input type="email" id="nom" value="<?php echo $loop->USER_MAIL;?>" name="email" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Pseudo :</span>
</span>
	<input type="text" id="nom" value="<?php echo $loop->USER_LOGIN;?>" name="login" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Mot de passe :</span>
</span>
	<input type="password" id="nom" placeholder="Mot de passe" name="passe" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
  <div class="form-group input-group">
<span class="input-group-addon">
						<span >Type</span>
					</span>
					
	<select class="form-control" name="type" required/>
<option>---Choix de type--</option>
<option value="2">Administrateur</option>
<option value="3">Agent</option>
<option value="4">Caissier(e)</option>
<option value="5">Consultant</option>
</select>
</div>
 </div>
  <div class="col-md-12">
  <div class="form-group input-group">
<span class="input-group-addon">
						<span >Agence</span>
					</span>
					
	<select class="form-control" name="id_ag" required/>
	<?php if($_SESSION['type']==2){  ?>
<option value="<?php echo $_SESSION['id_ag'];?>"><?php echo $_SESSION['agence'];?></option>
	<?php }elseif($user_edit){foreach($user_edit as $loop){?>
<option value="<?php echo $loop->ID_AG;?>"><?php echo $loop->NOM_AG;?></option>
	<?php }}?>
</select>

</div>
 </div>
  <div class="col-md-12">
 <div class="form-group input-group">
<span class="input-group-addon">
	<span >Photo user</span>
					</span>
	<input type="file"  name="userphoto" class="form-control required">
	</div>
 </div> 
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Statut user :</span>
</span>
	   <span class="input-group-addon" id="active">Activé:
                                <?php echo form_radio('etat', 0, set_radio('etat', 0)); ?>
                            </span>
                            <span class="input-group-addon " id="bloque">Desactivé:
                                <?php echo form_radio('etat', 1, set_radio('etat', 1)); ?></span>
</div>
 </div>
 
<div class="col-md-12">
 <div class="form-group input-group  col-md-12">
	<input type="submit" id="ok"  value="Mise à jour" class="form-control btn btn-info" required/>
</div>
 </div>
  <?php }}?>
 </form>
  </div>
   </div>
  </div>
   <div class="col-md-8">
   <div class="panel panel-primary" >
    <div class="panel-heading "><center><span class="glyphicon glyphicon-th"> LISTE DES UTILISATEURS</span></center></div>
  <div class="panel-body">
  <?php echo $tableau;?>
  </div>
  </div>
   </div>
   </div>
   
   <script src="<?php echo js_url('jquery-3.4.1'); ?>"></script>
   <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
   <script src="<?php echo js_url('notify'); ?>"></script>
   <script src="<?php echo js_url('dataTables_element'); ?>"></script>
<script>
   $(document).ready(function(){
       var table=$('#tab').dataTable();
   });
      </script>
</body>
</html>
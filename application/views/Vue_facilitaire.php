<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('jquery.toast.min'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('all'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('font-awesome.min'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('PNotifyBrightTheme'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo css_url('dataTables'); ?>"/>
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
  <div class="col-md-4" style="float:left;">
  <div class="panel panel-primary">		
    <div class="panel-heading"><center><span class="glyphicon glyphicon-cog"></span> NOUVEAU FACILITATAIRE</center></div>
	 <?php echo $info; ?>
  <div class="panel-body">
  <form method="post" action="<?php echo site_url('User/New_facilitateur') ?>" enctype="multipart/form-data"/>
  <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Nom :</span>
</span>
	<input type="text" id="nom" placeholder="Nom du partenaire" name="noms" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Prenoms :</span>
</span>
	<input type="text" id="nom" placeholder="Nom du partenaire" name="prenom" class="form-control" required/>
</div>
 </div>
 
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Date naissance:</span>
</span>
	<input type="date" id="nom" placeholder="Adesse postal" name="date_naiss" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Residence:</span>
</span>
	<input type="text" id="nom" placeholder="Residence region ou province" name="residence" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >E-mail:</span>
</span>
	<input type="email" id="nom" placeholder="Adresse electronique" name="email" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Telephone :</span>
</span>
	<input type="text" id="nom" placeholder="Telephone" name="phone" class="form-control" required/>
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
	<?php }elseif($liste_user){foreach($liste_user as $loop){?>
<option value="<?php echo $loop->ID_AG;?>"><?php echo $loop->NOM_AG;?></option>
	<?php }}?>
</select>

</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Statut  :</span>
</span>
	   <span class="input-group-addon" id="active">Encadreur:
                                <?php echo form_radio('etat', 0, set_radio('etat', 0)); ?>
                            </span>
                            <span class="input-group-addon " id="bloque">Demarcheur:
                                <?php echo form_radio('etat', 1, set_radio('etat', 1)); ?></span>
</div>
 </div>
  <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Photo:</span>
</span>
	<input type="file" id="nom"  name="photo_facilite" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group  col-md-12">

	<input type="submit" value="Enregistrer" class="form-control btn btn-info" required/>
</div>
 </div>
 </form>
  </div>
  </div>
  
  </div>
   <div class="col-md-8">
   <div class="panel panel-primary" >
    <div class="panel-heading "><center><span class="glyphicon glyphicon-th"> LISTE DES FACILITATAIRE</span></center></div>
  <div class="panel-body">
  <?php echo $tableau;?>
  </div>
  </div>
   
   </div>
  </div>
  
   <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
    <script src="<?php echo js_url('dataTables'); ?>"></script>
   <script src="<?php echo js_url('dataTables_element'); ?>"></script>
   <script>
   $(document).ready(function(){
       var table=$('#tab').dataTable();
   });
      </script>
</body>
</html>
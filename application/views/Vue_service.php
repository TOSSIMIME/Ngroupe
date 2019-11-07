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
  <div class="col-md-1"></div>
  <div class="col-md-4" style="float:left;">
  <div class="panel panel-primary">		
    <div class="panel-heading"><center><span class="glyphicon glyphicon-cog"></span> NOUVEAU SERVICE</center></div>
	 <?php echo $info; ?>
  <div class="panel-body">
  <form method="post" action="<?php echo site_url('Admin/new_service') ?>" enctype="multipart/form-data"/>
  <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >DESIGNATION SERVICE :</span>
</span>
	<input type="text" id="nom" placeholder="Nom du service" name="service" class="form-control" required/>
</div>
 </div>
 
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >COUT SERVICE:</span>
</span>
	<input type="number" id="nom"  name="cout" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >EDITION:</span>
</span>
	<input type="text" id="nom" placeholder="edition" name="edition" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >DESCRIPTION :</span>
</span>
	<input type="textarea" id="nom" placeholder="observation" name="observ" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
  <div class="form-group input-group">
<span class="input-group-addon">
						<span >AGENCE:</span>
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
 <div class="form-group input-group  col-md-12">

	<input type="submit" value="Enregistrer" class="form-control btn btn-info" required/>
</div>
 </div>
 </form>
  </div>
  </div>
  
  </div>
   <div class="col-md-7">
   <div class="panel panel-primary" >
    <div class="panel-heading "><center><span class="glyphicon glyphicon-th"> LISTE DES PARTENAIRES</span></center></div>
  <div class="panel-body">
  <?php echo $tableau;?>
  </div>
  </div>
   
   </div>
  </div>
   <script src="<?php echo js_url('jquery'); ?>"></script>
   <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
   <script>
   
         $('.myPopover').popover({
         html : true,
         content: function() {
          var elementId = $(this).attr("data-popover-content");
          return $(elementId).html();
         }
         });
      </script>
</body>
</html>
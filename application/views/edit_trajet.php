<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('jquery.toast.min'); ?>" />

  <div class="container-fluid">
  <div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-4" style="float:left;">
  <div class="panel panel-primary">		
    <div class="panel-heading"><center><span class="glyphicon glyphicon-cog"></span> NOUVEAU TRAJET</center></div>
	 <?php echo $info; ?>
  <div class="panel-body">
  <form method="post" action="<?php echo site_url('Vols/Gerer_vols') ?>" enctype="multipart/form-data"/>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Choix vols :</span>
</span>
	<select class="form-control" name="id_vols" required>
	 <?php if($vols){ foreach($vols as $loop){?>
<option value="<?php echo $loop->ID_VOLS;?>"><?php echo $loop->COMPAGNIE_VOLS.' '.$loop->NUMERO_VOLS;?> </option>
	 <?php }}?>
</select>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Trajet du vol :</span>
</span>
	<span class="input-group-addon" id="active">Aller:
                                <?php echo form_radio('etat', 0, set_radio('etat', 0)); ?>
                            </span>
                            <span class="input-group-addon " id="bloque">Retour:
                                <?php echo form_radio('etat', 1, set_radio('etat', 1)); ?></span>
</div>
 </div>

 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Date voyage :</span>
</span> 
	<input type="date" id="nom"   name="date_trajet" class="form-control" required/>
</div>
 </div>
 
 <div class="col-md-12">
 <div class="form-group input-group  col-md-12">

	<input type="submit" value="Mise à jour" class="form-control btn btn-info" required/>
</div>
 </div>
 </form>
  </div>
  </div> 
  </div>
   <div class="col-md-7">
   <div class="panel panel-primary" >
    <div class="panel-heading "><center><span class="glyphicon glyphicon-plane "> LISTE DES VOLS</span></center></div>
  <div class="panel-body">
  <?php echo $tableau;?>
  </div>
  </div>
   
   </div>
  </div>
   <script src="<?php echo js_url('jquery'); ?>"></script>
   <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
   <script src="<?php echo js_url('jquery.toast.min'); ?>"></script>
   <script src="<?php echo js_url('PNotify'); ?>"></script>
  
</body>
</html>
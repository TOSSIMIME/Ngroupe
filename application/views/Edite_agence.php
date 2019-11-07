<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-4" style="float:left;">
  <div class="panel panel-primary">		
    <div class="panel-heading"><center><span class="glyphicon glyphicon-cog"></span> NOUVELLE AGENCE</center></div>
	 <?php echo $info;	 ?>
  <div class="panel-body">
  <form method="post" action="<?php echo site_url('Agence/update') ?>" enctype="multipart/form-data"/>
  <?php if($agence_edit){ foreach($agence_edit as $loop){?>
  <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Nom de l'agence :</span>
</span>
<input type="hidden" id="nom" name="id" value="<?php echo $loop->ID_AG;?>" class="form-control" />
	<input type="text" id="nom" placeholder="Nom de l'agence" name="nom_agence" value="<?php echo $loop->NOM_AG;?>" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Contact agence :</span>
</span>
	<input type="text" id="nom" placeholder="Contact de l'agence" name="contact_agence" value="<?php echo $loop->PHONE_AG;?>" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >E-mail agence :</span>
</span>
	<input type="email" id="nom" placeholder="Email de l'agence" name="email_agence" value="<?php echo $loop->MAIL_AG;?>" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Adresse agence(BP) :</span>
</span>
	<input type="text" id="nom" placeholder="Adresse de l'agence" name="adresse_agence" value="<?php echo $loop->ADRESSE_AG;?>" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >SIEGE AGENCE :</span>
</span>
	<input type="text" id="nom" placeholder="Siege de l'agence" name="siege_agence" value="<?php echo $loop->SIEGE_AG;?>" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Logo agence :</span>
</span>
	<input type="file" id="nom"  name="logo_agence" class="form-control" />
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Statut agence :</span>
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

	<input type="submit" value="Modifier" class="form-control btn btn-info" required/>
</div>
 </div>
  <?php }} ?>
 </form>
  </div>
  </div>
  
  </div>
   <div class="col-md-7">
   <div class="panel panel-primary" >
    <div class="panel-heading "><center><span class="glyphicon glyphicon-th"> LISTE DES AGENCES DE VOYAGES</span></center></div>
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
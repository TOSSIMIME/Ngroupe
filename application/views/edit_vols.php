<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-4" style="float:left;">
  <div class="panel panel-primary">		
    <div class="panel-heading"><center><span class="glyphicon glyphicon-cog"></span> NOUVEAU TRAJET</center></div>
	 <?php echo $info; ?>
  <div class="panel-body">
  <form method="post" action="<?php echo site_url('Vols/update_vols') ?>" enctype="multipart/form-data"/>
  <?php if($edit_vols){ foreach($edit_vols as $loop){?>
  <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Trajet de :</span>
</span>
	<input type="hidden" id="nom" value="<?php echo $loop->ID_VOLS;?>" name="id" class="form-control" required/>
	<input type="text" id="nom" value="<?php echo $loop->TRAJET_VOLS;?>" name="trajet" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Arrivée à :</span>
</span>
	<input type="text" id="nom"  value="<?php echo $loop->ARRIVER_VOLS;?>" name="arriver" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Nom de la Compagnie :</span>
</span>
	<input type="text" id="nom" value="<?php echo $loop->COMPAGNIE_VOLS;?>" name="nom_compagnie" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Numero du vol :</span>
</span>
	<input type="text" id="nom" value="<?php echo $loop->NUMERO_VOLS;?>" name="num_vol" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Volume du vol :</span>
</span>
	<input type="text" id="nom" value="<?php echo $loop->VOLUME_VOLS;?>" name="volume_vol" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Contact tel :</span>
</span>
	<input type="textarea" id="nom" value="<?php echo $loop->PHONE_VOLS;?>" name="tel_vol" class="form-control" required/>
</div>
 </div>

 <div class="col-md-12">
 <div class="form-group input-group  col-md-12">

	<input type="submit" value="Mise à jour" class="form-control btn btn-info" required/>
</div>
 </div>
  <?php }}?>
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
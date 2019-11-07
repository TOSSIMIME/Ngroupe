<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
<script src="<?php echo js_url('PNotify'); ?>"></script>
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-4" style="float:left;">
  <div class="panel panel-primary">		
    <div class="panel-heading"><center><span class="glyphicon glyphicon-cog"></span> NOUVEAU BATIMENT</center></div>
	 <?php echo $info;	 ?>
	 
  <div class="panel-body">
  <form method="post" action="<?php echo site_url('Agence/update_bati') ?>" enctype="multipart/form-data"/>
    <?php if($batiment_edit){ foreach($batiment_edit as $loop){?>
  <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Nom du batiment :</span>
</span>
   <input type="hidden" id="nom"  value="<?php echo $loop->ID_BATI;?>" name="id" class="form-control" required/>
	<input type="text" id="nom" placeholder="Nom du batiment" value="<?php echo $loop->NOM_BATI;?>" name="nom_bati" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Proprietaire batiment :</span>
</span>
	<input type="text" id="nom"  name="proprietaire" value="<?php echo $loop->PROPRIETAIRE_BATI;?>" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Quartier :</span>
</span>
	<input type="text" id="nom" placeholder="Quartier" value="<?php echo $loop->QUARTIER_BATI;?>" name="quarier"  class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Nombre de lits :</span>
</span>
	<input type="number" id="nom" placeholder="Nombre des lits" value="<?php echo $loop->NB_LIT_BATI;?>" name="nb_lit"  class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Agence de voyage :</span>
</span>
	<select class="form-control" name="id_ag" required>
	
<option value="<?php echo $loop->ID_AG;?>"><?php echo $loop->NOM_AG;?> </option>

</select>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group  col-md-12">

	<input type="submit" value="Mise à jour" class="form-control btn btn-info" />
</div>
 </div>
 <?php }} ?>
 </form>
  </div>
  </div>
  
  </div>
   <div class="col-md-7">
   <div class="panel panel-primary" >
    <div class="panel-heading "><center><span class="glyphicon glyphicon-th"> LISTE DE LOGEMENTS DES AGENCES</span></center></div>
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
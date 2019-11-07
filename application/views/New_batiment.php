<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-4" style="float:left;">
  <div class="panel panel-primary">		
    <div class="panel-heading"><center><span class="glyphicon glyphicon-cog"></span> NOUVEAU BATIMENT</center></div>
	 <?php echo $info;?>
  <div class="panel-body">
  <form method="post" action="<?php echo site_url('Agence/new_batiment') ?>" enctype="multipart/form-data"/>
  <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Nom du batiment :</span>
</span>
   
	<input type="text" id="nom" placeholder="Nom du batiment" name="nom_bati" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Proprietaire batiment :</span>
</span>
	<input type="text" id="nom"  name="proprietaire"  class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Quartier :</span>
</span>
	<input type="text" id="nom" placeholder="Quartier" name="quarier"  class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Nombre de lits :</span>
</span>
	<input type="number" id="nom" placeholder="Nombre des lits" name="nb_lit"  class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Agence de voyage :</span>
</span>
	<select class="form-control" name="id_ag" required>
	 <?php if($agence_edit){ foreach($agence_edit as $loop){?>
<option value="<?php echo $loop->ID_AG;?>"><?php echo $loop->NOM_AG;?> </option>
	 <?php }}?>
</select>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group  col-md-12">

	<input type="submit" value="Enregistrer" class="form-control btn btn-info" />
</div>
 </div>
 
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
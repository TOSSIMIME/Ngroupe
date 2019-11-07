<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-4" style="float:left;">
  <div class="panel panel-primary">		
    <div class="panel-heading"><center><span class="glyphicon glyphicon-cog"></span> MODIFIER QUOTAS NATIONAL</center></div>
	 <?php echo $info; ?>
  <div class="panel-body">
  <form method="post" action="<?php echo site_url('Agence/update_quota') ?>" enctype="multipart/form-data"/>
  <?php if($quotas_edit){foreach($quotas_edit as $loop){ ?>
  <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Quotas :</span>
</span>
    <input type="hidden" id="nom" placeholder="les quota general" name="id" value="<?php echo $loop->ID_QUOTA; ?>" class="form-control" required/>
	<input type="number" id="nom" placeholder="les quota general" name="quotas" value="<?php echo $loop->QUOTAS; ?>" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Année :</span>
</span>
	<input type="date" id="nom"  name="anne_quotas" value="<?php echo $loop->ANNE_QUOTA; ?>" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Motif :</span>
</span>
	<input type="text" id="nom" placeholder="quel motif pour ce quotas" name="motif_quotas" value="<?php echo $loop->MOTIF_QUOTA; ?>" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Descriptions :</span>
</span>
	<input type="textarea" id="nom" placeholder="Description sur quotas" name="description" value="<?php echo $loop->DESCRIPTION ; ?>" class="form-control" required/>
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
    <div class="panel-heading "><center><span class="glyphicon glyphicon-th"> LISTE DES QUOTAS PAR ANNEE</span></center></div>
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
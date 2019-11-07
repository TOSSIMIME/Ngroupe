<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-4" style="float:left;">
  <div class="panel panel-primary">		
    <div class="panel-heading"><center><span class="glyphicon glyphicon-cog"></span> NOUVEAU PARTENAIRE</center></div>
	 <?php echo $info; ?>
  <div class="panel-body">
  <form method="post" action="<?php echo site_url('Admin/update_partenaire') ?>" enctype="multipart/form-data"/>
  <?php if($partenaire_edit){ foreach($partenaire_edit as $loop){ ?>
  <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Nom :</span>
</span>
<input type="hidden" id="nom" placeholder="Nom du partenaire" value="<?php echo $loop->ID_PART;?>" name="id" class="form-control" required/>
	<input type="text" id="nom" placeholder="Nom du partenaire" value="<?php echo $loop->NOM_PART;?>" name="noms" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Prenoms :</span>
</span>
	<input type="text" id="nom" placeholder="Nom du partenaire" value="<?php echo $loop->PRENOM_PART;?>" name="prenom" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Adresse(BP):</span>
</span>
	<input type="text" id="nom" placeholder="Adesse postal" value="<?php echo $loop->ADRESSE_PART;?>" name="adresse" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >E-mail:</span>
</span>
	<input type="email" id="nom" placeholder="Adresse electronique" value="<?php echo $loop->MAIL_PART;?>" name="email" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Telephone :</span>
</span>
	<input type="text" id="nom" placeholder="Telephone" value="<?php echo $loop->PHONE_PART;?>" name="phone" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group  col-md-12">

	<input type="submit" value="Mise a jour" class="form-control btn btn-info" required/>
</div>
 </div>
  <?php }}?>
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
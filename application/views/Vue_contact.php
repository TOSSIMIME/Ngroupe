<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-4" style="float:left;">
  <div class="panel panel-primary">		
    <div class="panel-heading"><center><span class="glyphicon glyphicon-cog"></span> NOUVELLE AGENCE</center></div>
	 <?php echo $info; ?>
  <div class="panel-body">
  <form method="post" action="<?php echo site_url('Agence/new_agence') ?>" enctype="multipart/form-data"/>
 
 <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Login agence :</span>
</span>
	<input type="text" id="nom" placeholder="Login de l'agence" name="login_agence" class="form-control" required/>
</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group">
<span class="input-group-addon ">
<span >Mot de passe :</span>
</span>
	<input type="password" id="nom" placeholder="Nom de l'agence" name="mdp_agence" class="form-control" required/>
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

	<input type="submit" value="Enregistrer" class="form-control btn btn-info" required/>
</div>
 </div>
 </form>
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
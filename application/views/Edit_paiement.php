<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
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
   <div class="col-md-12">
   <div class="panel panel-primary" >
    <div class="panel-heading "><span class="glyphicon glyphicon-user"> PAIEMENT </div>
  <div class="panel-body">
 <center><div class="row">
 <?php echo $info;?>
 <form class="online" method="post" action="<?php echo site_url('Pelerin/Edit_paie') ?>">
 <?php if($edit_paie){ foreach($edit_paie as $loop){ ?>
 <div class="col-md-4">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >CNIB/PASSPORT</span>
					</span>
	<input type="hidden" id="nom"  value="<?php echo $loop->ID_PELERIN;?>"name="id" class="form-control" />
		<input type="text"  readonly value="<?php echo $loop->PASSEPORT;?>" name="txt_nom" class="form-control" required/>
	</div>
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Nom</span>
					</span>
	<input type="text" readonly value="<?php echo $loop->NOM_PELERIN;?>" name="txt_nom" class="form-control form-control-sm" required />
	</div>
 </div>
  <div class="col-md-4">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span > Prenom</span>
					</span>
	<input type="text"  value="<?php echo $loop->PRENOM_PELERIN;?>" name="txt_prenom" readonly class="form-control" required/>
	</div>
 
  
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Date naissance</span>
					</span>
	<input type="text" id="nom" readonly value="<?php echo $loop->NAISS_PELERIN;?>" name="txt_naiss" class="form-control" required/>
	</div>
	</div>
  <div class="col-md-4">
  <div class="form-group input-group">
<span class="input-group-addon">
						<span >Sexe</span>
					</span>
	<select class="form-control" readonly required/>
<option>Male</option>
<option>Famel</option>
</select>
</div>
<div class="form-group input-group">
<span class="input-group-addon">
						<span >Type paiement</span>
					</span>
	<select class="form-control" name="types"  required/>
<option>Espece</option>
<option>Cheque</option>
<option>Virement</option>
</select>
	</div>
 </div>
  
  <div class="col-md-4">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Montant paie</span>
					</span>
	<input type="number"  placeholder="Montant paie" name="txt_montant" class="form-control" required/>
	</div>
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >N° cheque</span>
					</span>
	<input type="text" id="nom" placeholder="N° cheque" name="txt_cheque" class="form-control" />
	</div>
 </div>
   <div class="col-md-4">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Banque</span>
					</span>
	<input type="text" id="nom" placeholder="Banque" name="txt_banque" class="form-control" />
	</div>
	<div class="form-group input-group">
<span class="input-group-addon">
						<span >N° compte</span>
					</span>
	<input type="password"  placeholder="N° compte" name="txt_compte" class="form-control" />
	</div>
 </div>
  <div class="col-md-4 ">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Date virement</span>
					</span>
	<input type="date" id="nom" placeholder="Date virement" name="txt_virement" class="form-control" />
	</div>
	<div class="form-group input-group">
<span class="input-group-addon">
						<span >Autre personne</span>
					</span>
	<input type="text" id="nom" placeholder="Autre personne" name="autre" class="form-control" />
	</div>
 </div>
  <div class="col-md-6">
 
 </div>
 <div class="col-md-12">
 <div class="form-group input-group">

	<input type="submit" id="nom"value="Enregistrer"  class="form-control btn btn-primary">
	</div>
 </div>
 <?php }}?>
 </form>
 </div></center>
  
  </div>
  </div>
   
   </div>
  <div class="col-md-12" style="float:right;">
  <div class="panel panel-info">
   <div class="panel-heading "><center><span class="glyphicon glyphicon-th"> LISTE DES PAIEMENTS</span></center></div>
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
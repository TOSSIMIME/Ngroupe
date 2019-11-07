<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('all'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('font-awesome.min'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('PNotifyBrightTheme'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('dataTables'); ?>" />
 <script src="<?php echo js_url('jquery.form'); ?>"></script>
 <script src="<?php echo js_url('pnotify.custom.min'); ?>"></script>
 <script src="<?php echo js_url('PNotify'); ?>"></script>
 <script src="<?php echo js_url('PNotifyButtons'); ?>"></script>
 <script src="<?php echo js_url('PNotifyMobile'); ?>"></script>
 <script src="<?php echo js_url('PNotifyConfirm'); ?>"></script>
 <script src="<?php echo js_url('PNotifyStyleMaterial'); ?>"></script>
 <script src="<?php echo js_url('jquery'); ?>"></script>
  <script src="<?php echo js_url('dataTables'); ?>"></script>
 
  <div class="container-fluid">
<!--  <div class="row">
   <div class="col-md-12">
   <div class="panel panel-primary" >
    <div class="panel-heading "><span class="glyphicon glyphicon-user"> PAIEMENT </div>
  <div class="panel-body">
  <?php echo $info;?>
 <center><div class="row">
 <form class="online" method="post" action="">
 <div class="col-md-4">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >CNIB/PASSPORT</span>
					</span>
	<input type="text" id="nom" readonly placeholder=" CNIB OU PASSEPORT" name="txt_nom" class="form-control" required/>
	</div>
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Nom</span>
					</span>
	<input type="hidden" id="nom" placeholder=" Votre Nom" name="txt_nom" class="form-control form-control-sm" required />
	<input type="text" id="nom" readonly placeholder=" Votre Nom" name="txt_nom" class="form-control form-control-sm" required />
	</div>
 </div>
 
  <div class="col-md-4">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span > Prenom</span>
					</span>
	<input type="text" id="nom" readonly placeholder=" Votre Prenom" name="txt_nom" class="form-control" required/>
	</div>
	 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Date naissance</span>
					</span>
	<input type="text" id="nom" readonly placeholder=" Date de naissance" name="txt_nom" class="form-control" required/>
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
	<select class="form-control"  required/>
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
	<input type="text" id="nom" placeholder="Montant paie" name="txt_nom" class="form-control" required/>
	</div>
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >N° cheque</span>
					</span>
	<input type="password" id="nom" placeholder="Date d'expiration" name="txt_nom" class="form-control" required/>
	</div>
 </div>
   <div class="col-md-4">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Banque</span>
					</span>
	<input type="password" id="nom" placeholder="Date d'expiration" name="txt_nom" class="form-control" required/>
	</div>
	<div class="form-group input-group">
<span class="input-group-addon">
						<span >N° compte</span>
					</span>
	<input type="password" id="nom" placeholder="Date d'expiration" name="txt_nom" class="form-control" required/>
	</div>
 </div>
  <div class="col-md-4">
	<div class="form-group input-group">
<span class="input-group-addon">
						<span >Date virement</span>
					</span>
	<input type="date" id="nom" placeholder="Date d'expiration" name="txt_nom" class="form-control" required/>
	</div>
	<div class="form-group input-group">
<span class="input-group-addon">
						<span >Autre personne</span>
					</span>
	<input type="text" id="nom" placeholder="Date d'expiration" name="txt_nom" class="form-control" required/>
	</div>
 </div>
 <div class="col-md-12">
 <div class="form-group input-group">

	<input type="submit" id="nom"value="Envoyer" name="txt_nom" class="form-control btn btn-primary">
	</div>
 </div>
 </form>
 </div></center>
  
  </div>
  </div>
   
   </div>--->
  <div class="col-lg-12" >
  <div class="panel panel-info">
   <div class="panel-heading "><center><span class="glyphicon glyphicon-th"> LISTE DES PELERINS</span></center></div>
  <div class="panel-body">
   <?php echo $tableau;?>
  </div>
  </div>
  </div>
  </div>
  
   <script src="<?php echo js_url('jquery'); ?>"></script>
   <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
   <script src="<?php echo js_url('dataTables_element'); ?>"></script>
   <!--<script>
            $(document).ready(function() {
                var table = $('#tab').dataTable();
            });
        </script>-->
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
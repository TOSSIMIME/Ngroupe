<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
    <head>
        <title>eHadj 20</title>
       <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->config->item('charset'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo css_url('bootstrap'); ?>" />
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap-responsive'); ?>" />
		 <script src="<?php echo js_url('bootstrap'); ?>"></script>
			  <script src="<?php echo js_url('jquery-1.8.3.min'); ?>"></script>
		 <script>
            (function($)
            {
                $(document).ready(function()
                {
                    $.ajaxSetup(
                            {
                                cache: false,
                                beforeSend: function() {


                                },
                                complete: function() {

                                    $('#quota').show();
                                },
                                success: function() {
                                    ;
                                    $('#quota').show();
                                }
                            });
                    var site_url = "<?php echo site_url('Pelerin/quota_ag'); ?>"; //append id at end
                    $('#quota').load(site_url);
                    var refreshId = setInterval(function()
                    {
                        $('#quota').load(site_url);
                    }, 60000);
                });
            })(jQuery);
        </script>
    </head>
    <body   >
<div class="navbar navbar-inverse  navbar-fixed-top " style="background-color:#046380; border:0px;" >
    <div class="container">
        <div class="navbar-collapse collapse">
           <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo site_url('Agence'); ?>"><span class="glyphicon glyphicon-home"> <?php echo $_SESSION['nom'];?></span></a></li>
      <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Agences de voyages</a>
	  <ul class="dropdown-menu ">
	<li><a href="<?php echo site_url('Agence'); ?>" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-user"> Nouvelle agence</span></a></li>
	<li><a href="<?php echo site_url('User'); ?>" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-user"> Nouvel utilisateur</span></a></li>
	<li><a href="<?php echo site_url('Agence/liste'); ?>" class=" btn btn-warning sm" ><span class="glyphicon glyphicon-lock">Liste des agences</span></a></li>
	</ul>
	  </li>
      <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Les quotas</a>
	  <ul class="dropdown-menu ">
	<li><a href="<?php echo site_url('Agence/New_quotas'); ?>" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-user"> Quotas general</span></a></li>
	
	</ul>
	  </li>
	  <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Les pelerins</a>
	  <ul class="dropdown-menu ">
	<li><a href="<?php echo site_url('Pelerin/liste'); ?>" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-user"> Liste des pelerins</span></a></li>
	</ul>
	  </li>
	  <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Les payements</a>
	  <ul class="dropdown-menu ">
	<li><a href="<?php echo site_url('Pelerin/liste'); ?>" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-user"> Liste des payements</span></a></li>
	
	
	</ul>
	  </li>
      <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Les vols</a>
	   <ul class="dropdown-menu ">
	<li><a href="<?php echo site_url('Vols/New_vols'); ?>" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-user"> Creer vols</span></a></li>
	<li><a href="<?php echo site_url('Vols/Gerer_vols'); ?>" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-user"> Gerer vols</span></a></li>
	
	</ul>
	  </li>
	  <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Les logements</a>
	  <ul class="dropdown-menu ">
	<li><a href="<?php echo site_url('Agence/new_batiment'); ?>" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-user"> Nouveau Batiment</span></a></li>
	<li><a href="<?php echo site_url('Agence/liste_batiment'); ?>" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-user"> Liste des batiments</span></a></li>
	
	</ul>
	  </li>
	  
    </ul>
	<ul class="nav navbar-nav ">
	<li class=""><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> Connecte:  <?php echo $_SESSION['nom'];?></span></a>
	<ul class="dropdown-menu ">
	<li><a href=""id="<?php echo site_url('Welcome/accounte/'.$_SESSION["id"]); ?>" class=" btn btn-primary sm company" style="color:white;"><span class="glyphicon glyphicon-user"> <?php echo $_SESSION['nom'];?></span></a></li>
	<!--<li><a href="<?php echo site_url('Welcome/accounte'); ?>" class=" btn btn-primary sm" style="color:white;"><span class="glyphicon glyphicon-user"> Nouveau compte</span></a></li>-->
	<li><a href="<?php echo site_url('Welcome/deconnexion'); ?>" class=" btn btn-default sm" ><span class="glyphicon glyphicon-lock"> Mot de passe Oublier</span></a></li>
	<li><a href="<?php echo site_url('Welcome/deconnexion'); ?>" class=" btn btn-default sm" ><span class="glyphicon glyphicon-lock"> Se deconnecter</a></li>
	</ul>
	</li>
	</ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
</div>
<br>

<div class="navbar pull-right"  >
	 <div id="quota"></div>
    
</div>
<p><br><br><br></p>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
 <div class="modal-content">

<div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 <h4 class="modal-title" id="myModalLabel">Suppression</h4>
</div>

<div class="modal-body">
 <p>Voulez vraiment supprimer cet element?</p>

</div>

<div class="modal-footer">
 <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
 <a href="#" class="btn btn-danger danger">Supprimer</a>
</div>
 </div>
 </div>
</div>
<script>
 $('#confirm-delete').on('show.bs.modal', function(e) {
 $(this).find('.danger').attr('href', $(e.relatedTarget).data('href')); 
 $('.debug-url').html('Delete URL: <strong>' + $(this).find('.danger').attr('href') + '</strong>');
 })
</script>
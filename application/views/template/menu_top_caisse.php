<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
    <head>
        <title>eHadj 20</title>
       <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->config->item('charset'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo css_url('bootstrap'); ?>" />
		 <link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('styles'); ?>" />
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
      <li class="active"><a href="<?php echo site_url('Welcome'); ?>"><span class="glyphicon glyphicon-home"> <?php echo $_SESSION['agence'];?> </span></a></li>
	   <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion de paiements</a>
	  <ul class="dropdown-menu ">
	<li><a href="<?php echo site_url('Pelerin/new_paie'); ?>" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-user"> Encaissement</span></a></li>
		<li><a href="<?php echo site_url('Pelerin/liste_paie'); ?>" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-user"> Liste paiements</span></a></li>
	</ul>
	  </li>
      <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Les vols</a>
	  <ul class="dropdown-menu ">
	<li><a href="<?php echo site_url('Vols/liste'); ?>" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-plane"> Consulte vols</span></a></li>
	
	</ul>
	  </li>
	  <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Les logements</a>
	  <ul class="dropdown-menu ">
	<li><a href="#" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-home"> Consulte les chambres</span></a></li>
	<li><a href="#" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-home"> Gerer les hotels</span></a></li>
	</ul>
	  </li>
	 
	   <!--<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Manifest</a>
	  <ul class="dropdown-menu ">
	<li><a href="<?php echo site_url('Pelerin/Scan_pelerin'); ?>" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-user"> Scanner </span></a></li>
	<li><a href="<?php echo site_url('Pelerin/New_pelerin'); ?>" class=" btn btn-warning sm" style="color:white;"><span class="glyphicon glyphicon-user"> Manuel</span></a></li>
	</ul>
	  </li>-->
    </ul>
	<ul class="nav navbar-nav navbar-right">
	<li><a href="#"><span class="glyphicon glyphicon-phone-alt"> Support</span></a></li>
	
	<li class=""><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> SESSIONS </span></a>
	<ul class="dropdown-menu ">
	<li><a href="<?php echo site_url('Welcome/accounte/'.$_SESSION["id"]); ?>" class=" btn btn-primary sm" style="color:white;"><span class="glyphicon glyphicon-user"> <?php echo $_SESSION['nom'];?></span></a></li>
	<li><a href="<?php echo site_url('Welcome/deconnexion'); ?>" class=" btn btn-default sm" ><span class="glyphicon glyphicon-lock"> Se deconnecter</a></li>
	</ul>
	</li>
	</ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<br>
<div class="navbar pull-right"  >
	 <div id="quota"></div>
</div>
<p><br><br></p>
<!--<div class="navbar " style="background-color:#002F2F; hieght:50px; " >
    <div class="container">
	<br>
	<p style=" liste-style:none; text-decoration:none; color:white;"><strong>Tableau de bord: Acceuil</strong></p>
    </div>
</div>-->
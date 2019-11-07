<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
    <head>
        <title>eHadj 20</title>
       <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->config->item('charset'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo css_url('bootstrap'); ?>" />
    </head>
    <body   >
<div class="navbar navbar-inverse  navbar-fixed-top " style="background-color:#046380; border:0px;" >
    <div class="container">
        <div class="navbar-collapse collapse">
           <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo site_url('Welcome'); ?>"><span class="glyphicon glyphicon-home"> <?php echo $_SESSION['agence'];?></span></a></li>
      <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Partenaires</a>
	  <ul class="dropdown-menu ">
	<li><a href="<?php echo site_url('Admin/New_partenaire'); ?>" class=" btn btn-primary sm" style="color:white;"><span class="glyphicon glyphicon-user"> Nouveau partenaire</span></a></li>
	
	</ul>
	  </li>
	  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Comite</a>
	   <ul class="dropdown-menu ">
	<li><a href="<?php echo site_url('Admin/New_comite'); ?>" class=" btn btn-primary sm" style="color:white;"><span class="glyphicon glyphicon-user"> Comite</span></a></li>
	
	</ul>
	  </li>
      <li><a href="#">Nos Services</a></li>
      <li><a href="#">Contacter nous</a></li>
	  
    </ul>
	<ul class="nav navbar-nav navbar-right">
	<li><a href="#"><span class="glyphicon glyphicon-phone-alt"> Support</span></a></li>
	
	<li class=""><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> SESSIONS</span></a>
	<ul class="dropdown-menu ">
	<li><a href="<?php echo site_url('Admin/update_user'); ?>" class=" btn btn-default sm" ><span class="glyphicon glyphicon-user"> <?php echo $_SESSION['nom']; ?></span></a></li>
	<li><a href="<?php echo site_url('Admin/rappel_user'); ?>" class=" btn btn-default sm" ><span class="glyphicon glyphicon-lock"> Mot de passe Oublier</span></a></li>
	<li><a href="<?php echo site_url('Welcome/deconnexion'); ?>" class=" btn btn-default sm" ><span class="glyphicon glyphicon-lock"> Se deconnecter</a></li>
	</ul>
	</li>
	</ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<p><br></p>
<div class="navbar   " style="background-color:#002F2F; hieght:50px; " >
    <div class="container">
	<br><br>
	<p style=" liste-style:none; text-decoration:none; color:white;"><strong>Tableau de bord\ Developpement</strong></p>
    </div>
</div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
    <head>
	<title>eHadj 20</title>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->config->item('charset'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('jquery.toast.min'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo css_url('pnotify.custom.min'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo css_url('horloge'); ?>" />
<script src="<?php echo js_url('jquery.form'); ?>"></script>
 <script src="<?php echo js_url('pnotify.custom.min'); ?>"></script>
 <script src="<?php echo js_url('PNotify'); ?>"></script>
 <script src="<?php echo js_url('PNotifyButtons'); ?>"></script>
 <script src="<?php echo js_url('PNotifyMobile'); ?>"></script>
 <script src="<?php echo js_url('PNotifyConfirm'); ?>"></script>
 <script src="<?php echo js_url('PNotifyStyleMaterial'); ?>"></script>
 <script src="<?php echo js_url('jquery'); ?>" ></script>
 </head>
 <body>
  <div class="container-fluid">
  <div class="row">
    <div class="col-md-2"></div>
   <div class="col-md-8">
   <div class="panel panel-primary" >
    <div class="panel-heading "><span class="glyphicon glyphicon-th"> MENU PRINCIPAL</div>
  <div class="panel-body">
   <?php echo $info;?>
  <div class="col-md-4" >
  <div class="panel panel-primary">
    <div class="panel-heading "><span class="glyphicon glyphicon-certificate"> Nos services de prestations</div>
  <div class="panel-body">
<h4><a href="<?php echo site_url('Admin/liste_service'); ?>"><span class="glyphicon glyphicon-user">Gamme de Services<span class="badge"><?php echo $nbr_service;?></span></a></h4>
  </div>
  </div>
  </div>
  <div class="col-md-4" >
  <div class="panel panel-primary">
    <div class="panel-heading "><span class="glyphicon glyphicon-tasks"> Nos clients</div>
  <div class="panel-body">
<h4><a href="<?php echo site_url('Pelerin/liste'); ?>"><p ><span class="glyphicon glyphicon-bishop"> Les candidats <span class="badge"><?php echo $nbr_pel;?></span></p></a></h4>
  </div>
  </div>
  </div>
  <div class="col-md-4" >
  <div class="panel panel-primary">
    <div class="panel-heading "><span class="glyphicon glyphicon-euro"> Transactions financieres</div>
  <div class="panel-body">
<h4><a href="<?php echo site_url('Pelerin/liste_paie'); ?>"><p ><span class="glyphicon glyphicon-euro"> Les payements <span class="badge">5</span></p></a></h4>
  </div>
  </div>
  </div>
  <div class="col-md-4" >
  <div class="panel panel-primary">
    <div class="panel-heading "><span class="glyphicon glyphicon-bed"> Les transports</div>
  <div class="panel-body">
<h4><a href=""><p ><span class="glyphicon glyphicon-bed">  Transports <span class="badge">5</span></p></a></h4>
  </div>
  </div>
  </div>
  <div class="col-md-4" >
  <div class="panel panel-primary">
    <div class="panel-heading "><span class="glyphicon glyphicon-home"> Hebergements</div>
  <div class="panel-body">
<h4><a href=""><p ><span class="glyphicon glyphicon-home"> Les logements<span class="badge">5</span></p></a></h4>
  </div>
  </div>
  </div>
  
  <div class="col-md-4" >
  <div class="panel panel-primary">
    <div class="panel-heading "><span class="glyphicon glyphicon-envelope"> Administrations</div>
  <div class="panel-body">
<h4><a href=""><p ><span class="glyphicon glyphicon-envelope">  Administrations <span class="badge">5</span></p></a></h4>
  </div>
  </div>
  </div>
  
   
  </div>
  </div>
   
   </div>
  
  </div>
  
   <script src="<?php echo js_url('jquery'); ?>"></script>
   <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
    <script src="<?php echo js_url('jquery.toast.min'); ?>"></script>
   <script src="<?php echo js_url('PNotify'); ?>"></script>
</body>
</html>
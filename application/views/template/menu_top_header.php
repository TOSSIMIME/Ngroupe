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
      <li class="active"><a href="<?php echo site_url('Welcome'); ?>"><span class="glyphicon glyphicon-home"> M.TSOFT Sarl</span></a></li>
      <li ><a href="<?php echo site_url('Mtsoft'); ?>"id="alerte">Qui sommes nous</a></li>
      <li><a href="<?php echo site_url('Mtsoft'); ?>">Nos Services</a></li>
	  <li><a href="<?php echo site_url('Mtsoft'); ?>"> Agences </a></li>
      <li><a href="<?php echo site_url('Mtsoft'); ?>">Contacter nous</a></li>
    </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
</div>
<p><br><br><br></p>
<script type="text/javascript">

$(document).ready(function(){
	$(".alerte").click(function(e){
		e.preventDefault();
		alert("En cours de conception ||");
});});
</script>
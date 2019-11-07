<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo css_url('dataTables'); ?>"/>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('jquery.toast.min'); ?>" />
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
    <script src="<?php echo js_url('dataTables'); ?>"></script>
 <script>
     $(document).ready(function(){
		 var table=$('#tab').dataTable();
		 
	 });
      </script>
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-1"></div>
   <div class="col-md-12">
   <div class="panel panel-primary" >
    <div class="panel-heading "><center><span class="glyphicon glyphicon-th"> LISTE DES PAIEMENTS</span></center></div>
	 <?php echo $info; ?>
  <div class="panel-body">
  <?php echo $tableau;?>
  </div>
  </div>
   
   </div>
  </div>
   <script src="<?php echo js_url('jquery'); ?>"></script>
   <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
   <script src="<?php echo js_url('dataTables_element'); ?>"></script>
   
</body>
</html>
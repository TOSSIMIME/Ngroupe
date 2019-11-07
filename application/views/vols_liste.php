<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo css_url('dataTables'); ?>"/>
        <script>
            $(document).ready(function() {
                var table = $('#tab').dataTable();
            });
        </script>
  <div class="container-fluid">
  <div class="row">
   <div class="col-md-12">
   <div class="panel panel-primary" >
    <div class="panel-heading "><center><span class="glyphicon glyphicon-th"> LISTE DES VOLS</span></center></div>
  <div class="panel-body">
  <?php if($tableau){
	  echo $tableau;
  }else{
	  echo'<center><p><i>aucun vol trouve</i></p></center>';
  }?>
  </div>
  </div>
   
   </div>
  </div>
  </div>
   <script src="<?php echo js_url('jquery'); ?>"></script>
   <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
    <script src="<?php echo js_url('dataTables'); ?>"></script>
   <script src="<?php echo js_url('dataTables_element'); ?>"></script>
   
</body>
</html>
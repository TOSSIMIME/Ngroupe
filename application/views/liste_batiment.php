<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
<script src="<?php echo js_url('PNotify'); ?>"></script>
  <div class="container-fluid">
  <div class="row">
   <div class="col-md-12">
   <div class="panel panel-primary" >
    <div class="panel-heading "><center><span class="glyphicon glyphicon-th"> LISTE DE LOGEMENTS DES AGENCES</span></center></div>
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
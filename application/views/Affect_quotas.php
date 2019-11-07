<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-4" style="float:left;">
  <div class="panel panel-primary">		
    <div class="panel-heading"><center><span class="glyphicon glyphicon-cog"></span> GESTION DE QUOTAS PAR AGENCES</center></div>
	 <?php echo $info; ?>
  <div class="panel-body">
  <form method="post" action="<?php echo site_url('Agence/Affect_quotas') ?>" enctype="multipart/form-data"/>
  <?php if($quotas_edit){foreach($quotas_edit as $loop){ ?>
  <div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Quotas agence:</span>
</span>
    <input  type="hidden" id="id" placeholder="les quota general" name="id" value="<?php echo $loop->ID_QUOTA; ?>" class="form-control" required/>
	<input type="number" id="quotas"  name="quotas"  onkeypress="affect();" class="form-control" required/>
	<input type="hidden" id="quota"  name="quot"  class="form-control" required/>
</div>
 </div>
<div class="col-md-12">
 <div class="form-group input-group ">
<span class="input-group-addon ">
<span >Quotas general :</span>
</span>
	<input type="text" readonly id="nom" placeholder="les quota general" name="quota_general" value="<?php echo $loop->QUOTAS; ?>" class="form-control" required/>
</div>
 </div>

  <?php }} ?>
 
  </div>
  </div>
  
  </div>
  
   <div class="col-md-7">
   <div class="panel panel-primary" >
    <div class="panel-heading "><center><span class="glyphicon glyphicon-th"> LISTE DES QUOTAS PAR ANNEE</span></center></div>
  <div class="panel-body">
  <?php echo $tableau;?>
  <p><a href="#" onclick="toggleCheckbox('super'); return false;">Coche tout</a> / <a href="#" onclick="toggleCheckbox2('super'); return false;">Decocher tout</a></p>
    <div class="col-md-12">
 <div class="form-group input-group ">
	<input type="hidde" id="quots"  name="quotas"  class="form-control" />
</div>
 </div>
   <div class="col-md-12">
 <div class="form-group input-group  col-md-2">

	<input type="submit"  value="Affecter" class="form-control btn btn-info" required/>
</div>
 </div>
  </div>
  </div>
   
   </div>
   
   </form>
  </div>
   <script src="<?php echo js_url('jquery'); ?>"></script>
   <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
   <script>
   function toggleCheckbox(id) {
	var checkboxes = document.getElementsByTagName('input');
	var t=1;
	 for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
				 document.getElementById("quotas" ).value = t;
				 t++;
             }
		}
}
 function toggleCheckbox2(id) {
    var checkboxes = document.getElementsByTagName('input');
	 for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
		}
}
function coche_agence() {
  confirm("Veuillez selectionner au moins une agence SVP");
}
function affect() {
  document.getElementById("quots").value = (document.getElementById("quotas").value).trim();
}
      </script>
</body>
</html>
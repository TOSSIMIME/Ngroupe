<div class="container-fluid">
 <div class="container ">
  <form method="post" action="<?php echo site_url('pdf/pelevol');?>">
   <br>

 <table class="">
     <tr>
       
 </td>
 <td>
 <div class="input-group"> <span class="input-group-addon"> Choix Vol </span> 
<?php  echo form_dropdown('vol', $vols ,'', "class='form-control'  "); ?>
<?php echo form_error('vol'); ?>

 </div> 
   </td>
 <td>  
     
 <div class="input-group"> <span class="input-group-addon">Choix Villes </span> 
     
<?php echo form_dropdown('ville', array('Toutes' => 'Toutes', 'Ouagadougou' => 'Ouagadougou', 'Bobo-Dioulasso' => 'Bobo-Dioulasso'), '', "class='form-control' required"); ?> 
<?php echo form_error('ville'); ?>
 </div> 
 </td>
     <td>

  <input type="submit" name="export" class="btn form-control btn-info" value="Export Pdf"/>
 </td>
  <td>
     <input type="submit" name="export" class="btn form-control btn-info" value="Export Csv"/>
</td>
     </tr>
 </table>
</form>
     </div>  </div>  
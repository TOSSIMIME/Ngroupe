<?php 
if(!isset($_SESSION['type'])){
redirect();
}  elseif ($_SESSION['type']==0) {
include_once 'menu_top_admin.php';    
}  elseif ($_SESSION['type']==1) {
  include_once 'menu_top_comite.php';     
}elseif ($_SESSION['type']==2) {
 include_once 'menu_top_agence.php';    
}elseif($_SESSION['type']==3){
	include_once 'menu_top_user.php';
}elseif($_SESSION['type']==4){
	include_once 'menu_top_caisse.php';
}
?>

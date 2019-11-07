<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function form_radio_select($data = '', $value = '', $value_recup=''){
    if($value==$value_recup){
        return   form_radio($data, $value, TRUE);
    }else{
        return  form_radio($data, $value, FALSE);
    }
        
  
}
?>

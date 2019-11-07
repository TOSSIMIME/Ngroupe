<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function css_url($nom){
    return base_url().'assets/css/'.$nom.'.css';  
}

function js_url($nom){
    return base_url().'assets/js/'.$nom.'.js';  
}

function img_url($nom)
{
 return base_url() . 'assets/images/'.$nom;
}

function imgage_url($nom)
{
 return base_url() . 'assets/images/'.$nom;
}
function image_url($nom)
{
 return base_url() . 'images/uploads/'.$nom;
}
function image_user($nom)
{
 return base_url() . 'images/photos/'.$nom;
}
function img($nom, $alt = '')
{
 return '<img src="' . img_url($nom) . '" alt="' . $alt . '" />';
}

function url_current()
{
    $CI =& get_instance();

    $url = $CI->config->site_url($CI->uri->uri_string());
    return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
}

?>

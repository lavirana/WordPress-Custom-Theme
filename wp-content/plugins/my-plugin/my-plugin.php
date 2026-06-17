<?php
/**
 * Plugin Name: My Plugin
 * Description: This is a test Plugin.
 * Version: 1.0
 * Author: Ashish Rana
 * Author URI: https://thetechinfo.net/
 */

 if(!defined('ABSPATH')){
    header("Location: /word_theme");
    die("can't access");
 }


 function my_plugin_activation(){

 }

 registe_activation_hook(__FILE__, 'my_plugin_activation');


 function my_plugin_deactivation(){
    
 }

 register_deactivation_hook(__FILE__, 'my_plugin_deactivation');




?>
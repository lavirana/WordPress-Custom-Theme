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
    global $wpdb, $table_prefix;
    $wp_emp = $table_prefix.'emp';

    $q = "CREATE TABLE IF NOT EXISTS `$wp_emp` (`ID` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL ,
         `email` VARCHAR(100) NOT NULL , `status` BOOLEAN NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
         $wpdb->query($q);

         //$q = "INSERT INTO `$wp_emp` (`name`, `email`, `status`) VALUES ('Ashish Rana', 'ashishrana288@gmail.com', 1);";
         //$wpdb->query($q);
         $data = array(
            'name' =>  'Rahul',
            'email' => 'rahul@gmail.com',
            'status' => 1
         );
         $wpdb->insert($wp_emp, $data);
 }


 register_activation_hook(__FILE__, 'my_plugin_activation');


 function my_plugin_deactivation(){
    global $wpdb, $table_prefix;
    $wp_emp = $table_prefix.'emp';

    $q = "TRUNCATE `$wp_emp`";
    $wpdb->query($q);

 }
 register_deactivation_hook(__FILE__, 'my_plugin_deactivation');




 function my_sc_function($atts){
    return 'Function Call'. $atts['msg'];
 }

 add_shortcode('my-sc','my_sc_function');



?>
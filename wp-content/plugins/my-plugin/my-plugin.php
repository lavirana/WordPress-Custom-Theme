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
    $atts = array_change_key_case($atts, CASE_LOWER);
    $atts = shortcode_atts(array('msg' => 'I am Good'), $atts);
   
    //ob_start();
    ?>
<!---<h1>Hello Buddy</h1>-->
<?php
    //$html = ob_get_clean();
    //return 'Function Call'. $atts['msg'];
     include 'notice.php';
    //include 'slider.php';
    //return $html;
 }

 add_shortcode('my-sc','my_sc_function');



 /**
 * Properly enqueue custom scripts using the WordPress action hook
 */
function my_plugin_front_scripts() {
   // 1. Setup path relative to this plugin file location
   $path = plugins_url('js/main.js', __FILE__);
   
   // 2. Define dependencies (e.g., jQuery)
   $dep = array('jquery');
   
   // 3. Dynamic version control based on file modification timestamp
   $ver = filemtime(plugin_dir_path(__FILE__) . 'js/main.js');

   // 4. Register and queue the script file safely
   wp_enqueue_script('my-custom-js', $path, $dep, $ver, true);
}

// Crucial: Tie the function to the frontend enqueue hook event
add_action('wp_enqueue_scripts', 'my_plugin_front_scripts');



 function my_plugin_scripts() {

   $path = plugins_url('js/main.js', __FILE__);
   $dep  = array('jquery');
   $ver  = filemtime(plugin_dir_path(__FILE__) . 'js/main.js');

   wp_enqueue_script('my-custom-js', $path, $dep, $ver, true);
}

add_action('wp_enqueue_scripts', 'my_plugin_scripts');



?>
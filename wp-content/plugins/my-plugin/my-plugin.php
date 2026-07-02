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

   $js_url    = plugins_url('js/main.js', __FILE__);
   $css_url   = plugins_url('css/style.css', __FILE__);

   $js_ver    = filemtime(plugin_dir_path(__FILE__) . 'js/main.js');
   $css_ver   = filemtime(plugin_dir_path(__FILE__) . 'css/style.css');

   if ( is_page('sample-page') ) {
       wp_enqueue_style(
           'my-custom-style',
           $css_url,
           array(),
           $css_ver
       );
   }

   wp_enqueue_script(
       'my-custom-js',
       $js_url,
       array('jquery'),
       $js_ver,
       true
   );

   wp_localize_script(
       'my-custom-js',
       'my_ajax',
       array(
           'ajax_url' => admin_url('admin-ajax.php')
       )
   );
}

// Crucial: Tie the function to the frontend enqueue hook event
add_action('wp_enqueue_scripts', 'my_plugin_front_scripts');



/*
 function my_plugin_scripts() {
   $path = plugins_url('js/main.js', __FILE__);
   $dep  = array('jquery');
   $ver  = filemtime(plugin_dir_path(__FILE__) . 'js/main.js');
   wp_enqueue_script('my-custom-js', $path, $dep, $ver, true);
}
*/

add_action('wp_enqueue_scripts', 'my_plugin_scripts');

function my_theme(){
   global $wpdb, $table_prefix;
   $wp_emp = $table_prefix.'emp';

   $q = "SELECT * from `$wp_emp`";
   $results = $wpdb->get_results($q);

  ob_start();
  ?>
<table>
   <thead>
   <th>
      <td>Id</td>
      <td>Name</td>
      <td>Email</td>
      <td>Status</td>
   </th>
   </thead>
<tbody>
   <?php foreach($results as $row): ?>
   <tr>
      <td><?php echo $row->ID; ?></td>
      <td><?php echo $row->name; ?></td>
      <td><?php echo $row->email; ?></td>
      <td><?php echo $row->status; ?></td>
   </tr>
   <?php endforeach; ?>
</tbody>
</table>
<?php
$html = ob_get_clean();
return $html;
}
add_shortcode('my-theme', 'my_theme');



function my_posts(){
   $args = array(
      'post_type' => 'post',
      'posts_per_page' => 5,
      'offset' => 2,
      'orderby' => 'ID',
      'order' => 'ASC',
      'meta_query' => array(
         array(
            //'key' => 'views',
            'value' => '3',
            'compare' => '>=',
            'type'    => 'NUMERIC',
         )
      ),
      'tax_query' => array(
         'relation' => 'OR',
         array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => array('extra')
         ),
         array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => array('php')
         )
         ),
   );

   $query = new WP_Query($args);
   ob_start();
   if($query->have_posts()):
   ?>


<?php  while($query->have_posts()){
   $query->the_post();
   //echo '<a href= "'.get_the_permalink().'">'.the_title('<h2>','</h2>') .'</a> -'. the_content('<p>','</p>');
   //echo get_post_meta(get_the_ID(), 'views', true);
   //echo '<h2><a href="' . esc_url( get_the_permalink() ) . '">' . get_the_title() . '</a></h2>' . get_the_content();
   echo '<h2><a href="' . esc_url( get_the_permalink() ) . '">' . get_the_title() . '</a></h2>' . get_the_content();
}  ?>


   <?php
   endif;
   wp_reset_postdata();
   $html = ob_get_clean();
   return $html;
}
add_shortcode('my-posts','my_posts');



function head_fun(){
   if(is_single()){
      global $post;
      $views = get_post_meta($post->ID, 'views', true);

      if($views == ''){
         add_post_meta($post->ID,'views',1);
      }else{
         $views++;
         update_post_meta($post->ID, 'views', $views);
      }
   }
}

add_action('wp_head','head_fun');





add_action('admin_enqueue_scripts', 'my_plugin_admin_scripts');

function my_plugin_admin_scripts() {

    $path = plugins_url('js/main.js', __FILE__);
    $ver  = filemtime(plugin_dir_path(__FILE__) . 'js/main.js');

    wp_enqueue_script(
        'my-custom-js',
        $path,
        array('jquery'),
        $ver,
        true
    );

    wp_localize_script(
        'my-custom-js',
        'my_ajax',
        array(
            'ajax_url' => admin_url('admin-ajax.php')
        )
    );
}




function view_count() {

   if ( ! is_single() ) {
       return '';
   }

   $post_id = get_queried_object_id();

   return 'Total views: ' . get_post_meta($post_id, 'views', true);
}
add_shortcode('view-count', 'view_count');

function my_plugin_page_func(){
    include 'admin/main-page.php';
}

function my_plugin_subpage_func(){
   echo 'Sub Page';
}

function my_plugin_menu(){
   add_menu_page('My Plugin Page', 'My Plugin Page','manage_options','my-plugin-page','my_plugin_page_func','',6);

   add_submenu_page('my-plugin-page', 'My Plugin Main Page' , 'My Plugin Main Page', 'manage_options', 'my-plugin-page', 'my_plugin_page_func');

   add_submenu_page('my-plugin-page', 'My Plugin Sub Page' , 'My Plugin Sub Page', 'manage_options', 'my-plugin-subpage', 'my_plugin_subpage_func');
}

add_action('admin_menu', 'my_plugin_menu');




add_action('wp_ajax_my_search_func', 'my_search_func');
add_action('wp_ajax_nopriv_my_search_func', 'my_search_func');


function my_search_func() {
   $search_term = '';
       global $wpdb, $table_prefix;
         $wp_emp = $table_prefix.'users';
         $search_term = sanitize_text_field($_POST['search_term']);

         if(!empty($search_term)){
         $q = "SELECT * from `$wp_emp` WHERE `user_nicename` LIKE '%".$search_term."%' OR `user_email` LIKE '%".$search_term."%';";
         }else{
         $q = "SELECT * from `$wp_emp`";
         }
         $results = $wpdb->get_results($q);
     ob_start();
?>
                <?php foreach($results as $row): ?>
                <tr>
                   <td><?php echo esc_html($row->ID); ?></td>
                   <td><?php echo esc_html($row->user_nicename); ?></td>
                   <td><?php echo esc_html($row->user_email); ?></td>
                   <td><span class="status-badge"><?php echo esc_html($row->user_status); ?></span></td>
                </tr>
               <?php endforeach; 
   echo ob_get_clean();
   wp_die();
}

?>
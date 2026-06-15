<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?> | <?php  if (is_front_page()) { echo "|"; bloginfo('description'); } ?></title>
    <!-- Dynamically linking your CSS folder from the screenshot -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css?v=1.1.5">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">

<div class="logo">
<a class="logo-link" href="<?php echo site_url(); ?>">
    <?php $logoImg = get_header_image(); ?>
    <?php if ($logoImg) : ?>
        <img src="<?php echo $logoImg; ?>" alt="<?php bloginfo('name'); ?>">
    <?php else : ?>
        <h2>EduTech Academy</h2>
    <?php endif; ?>
        </a>
        </div>
   
    <nav class="main-nav">
        <!-- Your navigation menu from index.html -->
        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>

        <!--  <ul>
          <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
            <li><a href="<?php echo home_url('/about'); ?>">About</a></li>
            <li><a href="<?php echo home_url('/course'); ?>">Course</a></li>
            <li><a href="<?php echo home_url('/gallery'); ?>">Gallery</a></li>
            <li><a href="<?php echo home_url('/enquiry'); ?>">Enquiry</a></li>
            <li><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
        </ul>-->
    </nav>
</header>
<?php
/**
 * Template Name: Courses Page
 * Description: A premium 3-column academy layout displaying courses with duration badges.
 * Author: Ashish Rana
 * Author URI: https://thetechinfo.net/
 * Version: 1.0
 */
get_header(); ?>

<!-- 1. Hero Banner Section -->
<section class="course-hero">
    <h1>Our Professional Courses</h1>
    <p>Upgrade your technical skill set with industry-recognized training programs.</p>
</section>

<!-- 2. Fast Stats Bar Element -->
<div class="stats-bar-container">
    <div class="stat-item"><strong>15+</strong> Professional Modules</div>
    <div class="stat-item"><strong>5,000+</strong> Trained Students</div>
    <div class="stat-item"><strong>100%</strong> Practical Lab Training</div>
</div>

<!-- 3. Dynamic Course Grid Section -->
<div class="course-grid-container">
    

<?php $wpcourses = array('post_type'=>'all-courses','post_status'=>'publish');
$coursesquery = new WP_Query($wpcourses);
while($coursesquery->have_posts()) {
    $coursesquery->the_post();
    $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');


    
    $course_terms = get_the_terms( get_the_ID(), 'courses_category' );
    $display_categories = 'Uncategorized';
    if ( ! empty( $course_terms ) && ! is_wp_error( $course_terms ) ) {
        $term_names = array();
        foreach ( $course_terms as $term ) {
            $term_names[] = $term->name;
        }
        // Join them with a comma if a course has multiple categories assigned
        $display_categories = implode( ', ', $term_names );
    }
?>
    <!-- Card 1: Web Development -->
    <div class="course-card">
        <img src="<?php echo $imagepath[0]; ?>" alt="">
        <div style="position: relative;">
            <span class="duration-badge"><?php echo get_the_date(); ?></span>
        </div>
        <div class="course-card-body">
            <h3><?php the_title(); ?></h3>
            <p><?php the_content(); ?></p>
            <div class="course-meta">
                <span><strong>Category:</strong></span> <span style="float:right" ><?php echo esc_html($display_categories); ?></span>
            </div>
            <a href="<?php echo home_url('/enquiry'); ?>" class="enroll-btn">Enquire Now</a>
        </div>
    </div>

<?php } ?>

</div>

<?php get_footer(); ?>
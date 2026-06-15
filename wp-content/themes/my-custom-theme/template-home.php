<?php
/**
 * Template Name: Home Page
 * Description: A premium custom homepage layout featuring an academy hero banner, stats ribbon, live blog section, and a full-width category tile footer section.
 * Author: Ashish Rana
 * Author URI: https://thetechinfo.net/
 * Version: 1.2
 */
get_header(); ?>

<!-- 1. Hero Welcome Grid Banner Section -->
<section class="course-hero home-hero-height">
    <div class="home-hero-inner" style="max-width: 800px; margin: 0 auto;">
        <h1>Welcome to IYA International</h1>
        <p>Advance your professional journey with industry-expert training programs in Web Architecture, Frontend Technologies, and Essential Computing.</p>
        <div class="hero-cta-group" style="margin-top: 25px;">
            <a href="<?php echo home_url('/courses'); ?>" class="enroll-btn inline-cta">Explore Programs</a>
            <a href="<?php echo home_url('/contact-us'); ?>" class="secondary-cta">Get in Touch</a>
        </div>
    </div>
</section>

<!-- 2. Academy Stats Overview Ribbon Element -->
<div class="stats-bar-container">
    <div class="stat-item"><strong>15+</strong> Professional Modules</div>
    <div class="stat-item"><strong>5,000+</strong> Trained Students</div>
    <div class="stat-item"><strong>100%</strong> Practical Lab Training</div>
</div>

<!-- 3. Live Blog Feed Section (Moved Up) -->
<section class="home-blog-feed" style="max-width: 1200px; margin: 60px auto; padding: 0 20px;">
    
    <div class="section-header" style="text-align: center; margin-bottom: 40px;">
        <h2 style="font-size: 28px; color: #0f172a; margin-bottom: 8px;">Latest Technical Insights</h2>
        <p style="color: #64748b; font-size: 15px;">Read our newest updates, coding tips, and guides from our master classes.</p>
    </div>

    <div class="category-posts-grid">
        <?php
        $recent_posts_query = new WP_Query( array(
            'posts_per_page' => 3,
            'post_status'    => 'publish'
        ) );

        if ( $recent_posts_query->have_posts() ) :
            while ( $recent_posts_query->have_posts() ) : $recent_posts_query->the_post();
        ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('category-post-card'); ?>>
                    
                    <div class="category-card-thumb">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium_large'); ?>
                            </a>
                        <?php else : ?>
                            <div class="fallback-thumb-gradient"></div>
                        <?php endif; ?>
                    </div>

                    <div class="category-card-body">
                        <span class="category-card-date"><?php echo get_the_date('M d, Y'); ?></span>
                        <h3>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p><?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more-link">Read Article &rarr;</a>
                    </div>

                </article>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p style="text-align:center; grid-column: 1/-1; color:#64748b;">No recent articles published yet.</p>';
        endif;
        ?>
    </div>

</section>

<!-- 4. NEW POSITION & FULL WIDTH: Browse by Categories Section -->
<section class="home-categories-fullwidth">
    <div class="categories-inner-wrapper" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        
        <div class="section-header" style="text-align: center; margin-bottom: 45px;">
            <h2 style="font-size: 28px; color: #0f172a; margin-bottom: 8px;">Explore Learning Tracks</h2>
            <p style="color: #64748b; font-size: 15px;">Choose a track below to browse intensive modules grouped by topic.</p>
        </div>

        <div class="academy-category-tiles-grid">
            <?php
            $categories = get_categories( array(
                'taxonomy'   => 'category',
                'orderby'    => 'name',
                'order'      => 'ASC',
                'hide_empty' => false
            ) );

            if ( ! empty( $categories ) ) :
                foreach ( $categories as $category ) :
                    $icon_svg = '📁'; 
                    $slug = strtolower($category->slug);
                    
                    if ( $slug === 'php' || $slug === 'java' || $slug === 'technology' ) {
                        $icon_svg = '💻'; 
                    } elseif ( $slug === 'extra' || $slug === 'veritatis' ) {
                        $icon_svg = '🚀'; 
                    } elseif ( $slug === 'uncategorized' ) {
                        continue; 
                    }
                    
                    $category_link = get_category_link( $category->term_id );
                    ?>
                    
                    <a href="<?php echo esc_url( $category_link ); ?>" class="category-tile-box column-box-style">
                        <div class="category-tile-icon-frame">
                            <span class="category-icon-emoji"><?php echo $icon_svg; ?></span>
                        </div>
                        <div class="category-tile-info">
                            <h3><?php echo esc_html( $category->name ); ?></h3>
                            <p class="category-post-counter"><?php echo esc_html( $category->count ); ?> Topics</p>
                        </div>
                    </a>

                    <?php
                endforeach;
            endif;
            ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>
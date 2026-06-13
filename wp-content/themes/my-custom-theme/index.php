<?php get_header(); ?>

<!-- 1. Main Hero Section -->
<main class="hero-section">
    <div class="hero-content">
        <h1>Welcome to <br><span>IYA International</span></h1>
        <p>Your pathway to professional growth and technical learning.</p>
        <!-- FIX: Changed from course.html to dynamic WordPress link -->
        <a href="<?php echo home_url('index.php/courses'); ?>" class="cta-btn">Explore Courses</a>
    </div>
</main>

<!-- 2. Cool Latest Posts Section -->
<section class="latest-insights-section">
    <div class="section-heading-container">
        <h2>Latest Technical Insights</h2>
        <p>Stay ahead with deep dives into programming, server management, and web architectures.</p>
        <div class="heading-line"></div>
    </div>

    <div class="posts-grid-container">
        <?php 
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); 
        ?>
            <!-- Individual Cool Post Card -->
            <article class="modern-post-card">
                <div class="card-image-wrapper">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('medium_large', array('class' => 'post-card-img')); ?>
                    <?php else : ?>
                        <!-- Slick fallback gradient design if post has no image -->
                        <div class="post-card-img-fallback">
                            <span><?php the_title(); ?></span>
                        </div>
                    <?php endif; ?>
                    <span class="post-card-date"><?php echo get_the_date('M d, Y'); ?></span>
                </div>

                <div class="card-body-content">
                    <h3 class="post-card-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    
                    <p class="post-card-excerpt">
                        <?php echo wp_trim_words(get_the_excerpt(), 18, '...'); ?>
                    </p>

                    <div class="post-card-footer">
                        <span class="post-author">By <?php the_author(); ?></span>
                        <a href="<?php the_permalink(); ?>" class="read-more-link">Read Guide &rarr;</a>
                    </div>
                </div>
            </article>
        <?php 
            endwhile; 
        else : 
        ?>
            <p class="no-posts-found">No articles or tutorials have been published yet. Check back soon!</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
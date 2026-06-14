<?php get_header(); ?>

<div class="blog-detail-container">
    <?php 
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); 
    ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('premium-single-article'); ?>>
                
                <!-- 1. Post Title -->
                <h1 class="blog-post-title">
                    <?php the_title(); ?>
                </h1>
                
                <!-- 2. Post Meta Metadata -->
                <p class="blog-post-meta">
                    Published on <span><?php echo get_the_date(); ?></span> &bull; By <span><?php the_author(); ?></span>
                </p>

                <!-- 3. Dynamic Thumbnail -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="blog-post-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <!-- 4. Core Typography Body Content -->
                <div class="blog-post-content">
                    <?php the_content(); ?>
                </div>
            

                            <!-- NEW: Modern Custom Styled Comment Form Wrapper Section -->
            <div class="blog-comments-wrapper">
                <?php 
                // Settings configuration to customize the default form text details cleanly
                $comment_form_args = array(
                    'title_reply'       => 'Leave a Comment',
                    'title_reply_to'    => 'Leave a Reply to %s',
                    'label_submit'      => 'Post Comment',
                    'class_submit'      => 'comment-submit-button',
                    'comment_notes_before' => '<p class="comment-notes">Your email address will not be published.</p>',
                );
                
                comments_template(); 
                ?>
                <?php // comments_template(); ?>
            </div>

            </article>



    <?php 
        endwhile; 
    else : 
        echo '<div class="fallback-error"><p>Sorry, no post content could be found.</p></div>';
    endif; 
    ?>
</div>

<?php get_footer(); ?>
<?php get_header(); ?>

<div class="error-404-container" style="max-width: 800px; margin: 100px auto; padding: 0 20px; text-align: center;">
    
    <!-- Big Error Visual Badge -->
    <div class="error-code-badge" style="font-size: 120px; font-weight: 800; color: #1e293b; line-height: 1; margin-bottom: 20px;">
        404
    </div>

    <!-- Error Message -->
    <h1 style="font-size: 32px; color: #0f172a; margin-bottom: 15px; font-weight: 700;">
        Oops! Page Not Found
    </h1>
    
    <p style="color: #64748b; font-size: 16px; max-width: 550px; margin: 0 auto 40px auto; line-height: 1.6;">
        The page you are looking for might have been removed, had its name changed, or is temporarily unavailable. Try searching for your course or topic below.
    </p>

    <!-- Inline WordPress Search Bar Bar Section -->
    <div class="error-search-wrapper" style="max-width: 500px; margin: 0 auto 40px auto;">
        <?php get_search_form(); ?>
    </div>

    <!-- Action Navigation Buttons -->
    <div class="error-actions">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="enroll-btn" style="display: inline-block; padding: 13px 28px; text-decoration: none; font-weight: 600; border-radius: 6px;">
            &larr; Back to Home
        </a>
    </div>

</div>

<?php get_footer(); ?>
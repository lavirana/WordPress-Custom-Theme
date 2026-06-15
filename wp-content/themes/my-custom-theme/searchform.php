<?php
/**
 * Custom Search Form Template
 */
?>
<form role="search" method="get" class="search-form custom-404-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" class="search-field acad-input" placeholder="Search courses or articles..." value="<?php echo get_search_query(); ?>" name="s" />
    <button type="submit" class="search-submit acad-btn">Search</button>
</form>
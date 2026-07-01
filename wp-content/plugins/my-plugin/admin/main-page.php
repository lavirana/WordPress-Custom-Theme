<?php

global $wpdb, $table_prefix;
$wp_emp = $table_prefix.'users';
if(isset($_GET['my_search_term'])){
 $q = "SELECT * from `$wp_emp` WHERE `user_nicename` LIKE '%".$_GET['my_search_term']."%';";
}else{
 $q = "SELECT * from `$wp_emp`";
}
$results = $wpdb->get_results($q);

ob_start();
?>
<style>
    .emp-table-container {
        margin: 20px 0;
        overflow-x: auto;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }
    .emp-data-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border-radius: 8px;
        overflow: hidden;
    }
    .emp-data-table th, 
    .emp-data-table td {
        padding: 12px 15px;
        text-align: left;
    }
    .emp-data-table th {
        background-color: #2271b1; /* WordPress Blue */
        color: #ffffff;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }
    .emp-data-table tbody tr {
        border-bottom: 1px solid #f0f0f1;
        transition: background-color 0.2s ease;
    }
    .emp-data-table tbody tr:nth-of-type(even) {
        background-color: #f6f7f7;
    }
    .emp-data-table tbody tr:hover {
        background-color: #f0f6fc;
    }
    .emp-data-table tbody tr:last-of-type {
        border-bottom: 2px solid #2271b1;
    }
    /* Simple badge styling for status */
    .status-badge {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: bold;
        background-color: #e5e7eb;
        color: #374151;
    }
</style>

<div class="emp-table-container wrap">
    <h2>My Plugin Page</h2>
    <div class="my-form">
        <form action="<?php echo admin_url('admin.php'); ?>" id="my-search-form">
            <input type="hidden" name="page" value="my-plugin-page">
            <input type="text" name="my_search_term" id="my-search-term">
            <input type="submit" value="search" name="search" />
        </form>
    </div>
    <br>
    <table class="emp-data-table">
        <thead>
            <tr>
               <th>Id</th>
               <th>Name</th>
               <th>Email</th>
               <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($results)): ?>
                <?php foreach($results as $row): ?>
                <tr>
                   <td><?php echo esc_html($row->ID); ?></td>
                   <td><?php echo esc_html($row->user_nicename); ?></td>
                   <td><?php echo esc_html($row->user_email); ?></td>
                   <td><span class="status-badge"><?php echo esc_html($row->user_status); ?></span></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center;">No employees found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php
echo ob_get_clean();
?>
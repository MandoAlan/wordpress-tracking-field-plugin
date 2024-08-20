<?php
/**
 * Plugin Name: Tracking Field Plugin
 * Description: Adds a tracking field to your WordPress site.
 * Version: 1.0
 * Author: Your Name
 */

// Enqueue styles and scripts
function tfp_enqueue_assets() {
    wp_enqueue_style('tfp-style', plugins_url('style.css', __FILE__));
    wp_enqueue_script('tfp-script', plugins_url('script.js', __FILE__), array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'tfp_enqueue_assets');

// Add the tracking field to the front-end
function tfp_add_tracking_field() {
    ?>
    <form method="post" action="" id="tracking-form">
        <label for="tracking_number">Enter Tracking Number:</label>
        <input type="text" id="tracking_number" name="tracking_number">
        <input type="submit" value="Track">
        <div id="tracking-result"></div>
    </form>
    <?php
}

// Shortcode to display the tracking field
function tfp_tracking_shortcode() {
    ob_start();
    tfp_add_tracking_field();
    return ob_get_clean();
}
add_shortcode('tracking_field', 'tfp_tracking_shortcode');

// Handle the form submission
function tfp_handle_tracking_form() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tracking_number'])) {
        $tracking_number = sanitize_text_field($_POST['tracking_number']);
        echo '<p>Tracking number submitted: ' . esc_html($tracking_number) . '</p>';
    }
}
add_action('wp_footer', 'tfp_handle_tracking_form');

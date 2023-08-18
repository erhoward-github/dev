<?php
/*
Plugin Name: CMA Current Year
Plugin URI: https://cma.ismgcorp.com
Description: Current Year
Version: 1.0
Author: Elaine Howard
Author URI: http://www.elainehoward.com
*/

# shortcode
# echo do_shortcode('[cma_current_year]');

function cma_current_year_shortcode()
{
    return getdate()['year'];
}
function cma_current_year_shortcode_init()
{
    add_shortcode('cma_current_year','cma_current_year_shortcode');
}
add_action('init','cma_current_year_shortcode_init');
?>

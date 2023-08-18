<?php
/*
Plugin Name: CMA CTA Button
Plugin URI: https://cma.ismgcorp.com
Description: CTA Button
Version: 1.0
Author: Elaine Howard
Author URI: http://www.elainehoward.com
*/

function cma_cta_button_shortcode($atts)
{
    $a = shortcode_atts(array(
        'link' => '#nogo',
        'id' => 'cta_button',
        'color' => 'blue',
        'size' => '',
        'label' => 'Button',
        'target' => '_self'
    
    ), $atts);
    
    $output = <<< "__DOC__"
<p>
<a 
href="${a['link']}" 
id="${a['id']}" 
class="btn btn-info cma-cta-button" 
target="${a['target']}">
${a['label']}
</a>
</p>
__DOC__;

    return $output;
}

add_shortcode('cma_cta_button', 'cma_cta_button_shortcode');

function cma_enqueue_scripts()
{
    wp_register_style('cma-cta-button-stylesheet',  plugin_dir_url(__FILE__) . 'css/cma-cta-button.css' );
    wp_enqueue_style('cma-cta-button-stylesheet');

    # wp_register_script('cta-button-script',  plugin_dir_url(__FILE__) . 'js/script.js' );
    # wp_enqueue_script('script');
    wp_enqueue_script('cma-cta-button-script', plugin_dir_url(__FILE__) . 'js/cma-cta-button.js', array(), '1.0.0', true );

}

add_action('wp_enqueue_scripts', 'cma_enqueue_scripts');
?>

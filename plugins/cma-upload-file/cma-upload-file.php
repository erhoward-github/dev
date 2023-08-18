<?php
/*
Plugin Name: CMA Upload File
Plugin URI: https://cma.ismgcorp.com
Description: Upload File Widget
Version: 1.0
Author: Elaine Howard
Author URI: http://www.elainehoward.com
*/


function cma_upload_file_shortcode()
{
    $html = <<< "__DOC__"
<form action="upload-handler.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file-uploader" id="file-uploader" accept=".csv">
    <input type="submit" value="Upload">
</form>
__DOC__;
    return $html;
}

function cma_upload_file_shortcode_init()
{
    add_shortcode('cma_upload_file', 'cma_upload_file_shortcode');
}
add_action('init', 'cma_upload_file_shortcode_init');
?>

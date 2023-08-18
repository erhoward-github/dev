<?php
/*
Plugin Name: Custom Endpoint
Plugin URI: https://dev.local
Description: Practice develop custom endpoint plugin
Version: 1.0
Author: Elaine Howard
Author URI: http://www.elainehoward.com
*/

add_action( 'rest_api_init', 'eh_create_custon_endpoint' );

function eh_create_custon_endpoint(){
    register_rest_route(
        'wp/v1',
        '/custom-ep',
        array(
            'methods' => 'GET',
            'callback' => 'eh_get_response',
        )
    );
    register_rest_route(
        'wp/v1',
        '/custom-ep-2',
        array(
            'methods' => 'GET',
            'callback' => 'eh_get_response_2',
        )
    );
}

# usage
/*
http://dev.local/wp-json/wp/v1/custom-ep?key1=value3&key2=value4
*/
function eh_get_response(WP_REST_Request $request) 
{
    # $output = print_r($request, TRUE);
    #return 'These are your data. . .';
    $output = $request->get_param('key2');
    return $output;
    
}

# usage
/*
http://dev.local/wp-json/wp/v1/custom-ep-2?key1=value1&key2=value2
*/
function eh_get_response_2(WP_REST_Request $request) 
{
    # $output = print_r($request, TRUE);
    #return 'These are your data. . .';
    # $output = $request->get_param('key2');
    $output = array(
        "param1" => $request->get_param('key1'),
        "param2" => $request->get_param('key2'));
    return $output;
    
}
?>

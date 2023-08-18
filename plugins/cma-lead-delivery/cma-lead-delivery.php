<?php
/*
Plugin Name: CMA Lead Delivery
Plugin URI: https://cma.ismgcorp.com
Description: Lead Delivery API
Version: 1.0
Author: Elaine Howard
Author URI: http://www.elainehoward.com
*/

/*
<domain>/wp-json/cma/v1/lead-delivery
*/

add_action('rest_api_init', 'cma_create_lead_delivery_endpoint');

function cma_create_lead_delivery_endpoint()
{
    register_rest_route(
        'cma/v1',
        '/lead-delivery',
        array(
            'methods' => 'GET',
            'callback' => 'cma_lead_delivery_response',
        )
    );
}

function cma_lead_delivery_response($request) 
{
    $params = $request->get_params();
    $value = '';
    $response = '';
    if(isset($params['context']))
    {
        $response = $params['context'];
    }
    else
    {
        $response = 'no context. . .';
    }
    return rest_ensure_response($response);
}
?>

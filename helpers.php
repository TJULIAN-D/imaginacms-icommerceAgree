<?php

use Modules\Icommerceagree\Entities\Configagree;

if (! function_exists('icommerceagree_get_configuration')) {

    function icommerceagree_get_configuration()
    {

    	$configuration = new Configagree();
    	return $configuration->getData();

    }

}


// Initial Method
if (! function_exists('icommerceagree_Init')) {

    function icommerceagree_Init($products,$options){

       	$resultMethods = [];

      
        $response["price"] = 0;
        $response["priceshow"] = false;

        $response["data"] = null;
	    $response["msj"] = "success";
	    
	    return $response;

    }

}
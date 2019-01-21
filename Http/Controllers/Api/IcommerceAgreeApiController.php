<?php

namespace Modules\Icommerceagree\Http\Controllers\Api;

// Requests & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Repositories
use Modules\Icommerceagree\Repositories\IcommerceAgreeRepository;


class IcommerceAgreeApiController extends BaseApiController
{

    private $icommerceagree;
   
    public function __construct(
        IcommerceAgreeRepository $icommerceagree
    ){
        $this->icommerceagree = $icommerceagree;
    }
    
    /**
     * Init data
     * @param Requests request
     * @param Requests array(items,total)
     * @param Requests options array (countryCode,postCode,country)
     * @return route
     */
    public function init(Request $request){

        try {

            
            // Msj
            $response["msj"] = "success";

            // Items
            $response["items"] = null;

            // Price
            $response["price"] = 0;
            $response["priceshow"] = false;
            
          } catch (\Exception $e) {
            //Message Error
            $status = 500;
            $response = [
              'errors' => $e->getMessage()
            ];
        }

        return response()->json($response, $status ?? 200);

    }
    
    

}
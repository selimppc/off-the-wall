<?php

namespace App\Helpers;

class Fastway
{

	public static function freight_calculation($suburb, $postcode, $weight, $shipped_date=''){

         $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
         
		$shipped_date = Date('d/m/Y');		

		$url = "https://api.fastway.org/v3/psc/eta/SYD/".$suburb."/".$postcode."/".$weight."?pickupDate=".$shipped_date."&api_key=dcb04fae517e4cff8161f1eb13cb59e9";

        /*$url = "https://api.fastway.org/v3/psc/eta/SYD/FARRER/2607/5?pickupDate=1/4/2017&api_key=dcb04fae517e4cff8161f1eb13cb59e9";*/

    	$json = file_get_contents($url,false, stream_context_create($arrContextOptions));
    	$shipping_data = json_decode($json, true);
    

    	$response = [];

    	if(!empty($shipping_data['result'])){
    		if(!empty($shipping_data['result']['services'])){
    			if(!empty($shipping_data['result']['services'][0])){

    				$response['shipping_value'] = $shipping_data['result']['services'][0]['totalprice_normal'];
    			}
    		}
    	}else{
    		$response['error'] = $shipping_data['error'];
    	}


    	return $response;
  
	}

}
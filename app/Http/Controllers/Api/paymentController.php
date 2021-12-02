<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;

class paymentController extends Controller
{

    public $gateway;

    public function __construct() {
        $config = [
            'environment' => env('BRAINTREE_ENVIRONMENT', 'sandbox'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID', 'gs5pvzp7fw34msdt'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY', '7kzntb2kcwfvwdbc'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY', 'b88ad25dbe8c172ca9635ea7726f1750')
        ];

        $this->gateway = new Gateway($config);
    }

    public function generate(Gateway $gateway){
        $token=$gateway->clientToken()->generate();
        $data=[
            "success" => true,
            "token"=>$token, 
        ];
        return response()->json($data,200);
    }
    
    public function makePayment(Request $request,Gateway $gateway){
        //$nonceFromTheClient = $_POST["payment_method_nonce"];
        //return response()->json($request);;
        $result=$gateway->transaction()->sale([
            'amount' => '1000.00',
            'paymentMethodNonce' =>$request->token,
            // 'deviceData' => $deviceDataFromTheClient,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);
        return response()->json($result);
        if($result->success){
            $data=[
            "success" => true, 
            "message"=>"Transazione effetuata", 
        ];
            return response()->json($data,200);
        }
        else{
            $data=[
                "success" => false,
                "message"=>"Transazione fallita", 
            ];
            return response()->json($data,404);
        }
    }
}

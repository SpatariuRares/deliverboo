<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
class paymentController extends Controller
{
    public function generate(Gateway $gateway){
        $gateway = new Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'use_your_merchant_id',
            'publicKey' => 'use_your_public_key',
            'privateKey' => 'use_your_private_key'
        ]);
        echo($clientToken = $gateway->clientToken()->generate());
    }
    
    public function makePayment(Request $request,Gateway $gateway){
        $gateway = new Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'ggkpsthsy2pmfyk2',
            'publicKey' => 'c36dy8kbvswvkckk',
            'privateKey' => '982379b23c8bd93288013c530896c814'
        ]);
        $nonceFromTheClient = $_POST["payment_method_nonce"];
        $result=$gateway->transaction()->sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonceFromTheClient,
            // 'deviceData' => $deviceDataFromTheClient,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);
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
        return "MakePayment";
    }
}

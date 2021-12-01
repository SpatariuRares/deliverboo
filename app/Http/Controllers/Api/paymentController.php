<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
class paymentController extends Controller
{
    public function generate(Request $request,Gateway $gateway){
        $token=$gateway->clientToken()->generate();
        $data=[
            "success" => true,
            "token"=>$token, 
        ];
        return response()->json($data,200);
    }
    
    public function makePayment(Request $request,Gateway $gateway){
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

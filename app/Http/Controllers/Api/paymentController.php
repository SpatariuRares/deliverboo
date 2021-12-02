<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Food;
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
        $amount=0;
        foreach($request->food as $id){
            $food=Food::where('id', $id)->first();
            $amount+=$food->price;
        }
        $result=$gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' =>$request->token,
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
    }

    public function foodOrder(Request $request){
        $cart=[];
        foreach($request->food as $food ){
            $cart[] = Food::where('id', $food)->first();
        }
        $data=[
            "success" => true,
            "cart"=>$cart, 
        ];
        return response()->json($data,200);
    }
}

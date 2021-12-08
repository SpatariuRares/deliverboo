<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Food;
use App\Order;
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
    
    public function createOrder(Request $request){
        $request["email"] = $request->dataClient["email"];
        $request["address"]= $request->dataClient["address"];
        $request["fullName"]= $request->dataClient["fullName"];
        $request->validate([
            'email'=> 'required|email', //tramite email fa' validascion da solo
            'address'=>'required',
            'fullName'=>'required',
        ]);
        $request["total"]=0;
        $request["paymentStatus"]=false;
        /* unset($request["dataClient"]);
        unset($request["token"]);*/
        $data = $request->all();
        
        if(isset($data['food'])){
            foreach($data['food'] as $key => $food){
                $food = Food::where('id', $food)->first();
                $data["total"]+=$food["price"]*$data['quantity'][$key];
            }
        }
        $new_order = new Order();
        $new_order->fill($data);
        $new_order->save();
        if(isset($data['food'])){
            foreach($data['food'] as $key => $food){
                $data['foods'][$food["id"]] = [ 'quantity' => $data['quantity'][$key]];
            }
        }
        
        // dd($data['foods']);
        if(isset($data['foods'])){
            $new_order->foods()->attach($data['foods']);
        }
        return $new_order["total"];
    }

    public function makePayment(Request $request,Gateway $gateway){
        $order = $this->createOrder($request);
        $amount=$order->total;
        $result=$gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' =>$request->token,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);
        return response()->json($result);
        if($result->success){
            $order->paymentStatus=true;
            $data=[
                "success" => true, 
                "message"=>"Transazione effetuata", 
            ];
            return response()->json($data,200);
        }
        else{
            Order::where("id",$order->id)->delete();
            $data=[
                "success" => false,
                "message"=>"Transazione fallita", 
            ];
            return response()->json($data,404);
        }
    }
    

    public function foodOrder(Request $request){
        // return response()->json($request,200);
        $cart=null;
        // foreach($request->food as $food ){
        $cart = Food::where('id',$request->id)->first();
        // }
        $data=[
            "success" => true,
            "cart"=>$cart, 
        ];
        return response()->json($data,200);
    }
}

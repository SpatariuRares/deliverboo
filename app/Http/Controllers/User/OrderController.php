<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Order;
use App\Food;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        $foods = Food::where('user_id', '=', $currentUser->id)->get();
        $orders=[];
        foreach ($foods as $food){
            if($food->orders!=null){
                foreach ($food->orders as $order){
                    $orders[]=$order;
                }
            }
        }
        return view('user.orders.index', compact('orders'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function create()
    {
        $foods = Food::all();
        return view('user.orders.create',compact('foods'));
    }
    */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // validazioni 
    //     $request->validate([
    //         'total'=>'required',
    //         'email'=> 'required|email', //tramite email fa' validascion da solo
    //         'address'=>'required',
    //         'fullName'=>'required',
    //     ]);


    //     $data = $request->all();
    //     $new_order = new Order();
    //     $new_order->fill($data);
    //     $new_order->save();

    //     if(isset($data['food'])){

    //         foreach($data['food'] as $key => $food){
    //             $data['foods'][$food] = [ 'quantity' => $data['quantity'][$key]];
    //         }
    //     }
    //     // dd($data['foods']);
    //     $new_order->foods()->attach($data['foods']);
        

    //     return redirect()->route('user.orders.index')->with('inserted', 'L\'Order è stato correttamente salvato');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function show($id)
    {
        $detailOrder = Order::findOrFail($id);
        return view('user.orders.show', compact('detailOrder'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Order $order)
    // {

    //     $foods = Food::all();

    //     if(!$order) {

    //         abort(404);
    //     }
    //     return view('user.orders.edit', compact('order','foods'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Order $order)
    // {
    //     if($order->paymentStatus != 1 ){

    //         $request->validate([
    //             'total'=>'required',
    //             'email'=> 'required|email', //tramite email fa' validascion da solo
    //             'address'=>'required',
    //             'fullName'=>'required',
    //         ]);
            
    //         $data = $request->all();
    //         if(!isset($data['paymentStatus'])){            
    //             $data['paymentStatus'] = false;         
    //         }

    //         $order->update($data);

    //         $key = 0;

    //         if(isset($data['quantity'])){
    //             while(count($data['quantity']) != $key){
    //                 if($data['quantity'][$key] == null ){
    //                     array_splice($data['quantity'],$key,1);
    //                 }
    //                 else{
    //                     $key++;
    //                 }
    //             }
    //         }

    //         if(isset($data['food'])){
                
    //             foreach($data['food'] as $key => $food){
    //                 $data['foods'][$food] = [ 'quantity' => $data['quantity'][$key]];
    //             }
    //         }
            

    //         if(array_key_exists('foods', $data)){
    //             $order->foods()->sync($data['foods']);
    //         }
    //         else{
    //             $order->foods()->sync([]);
    //         }


    //         return redirect()->route('user.orders.index', $order['id'])->with('updated', 'Order correttamente aggiornato');
    //     }
    //     return redirect()->route('user.orders.index', $order['id'])->with('deleted', 'Order già pagato impossibile aggiornare l\'ordine');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Order $order)
    // {
    //     $order->foods()->detach($order->id);
    //     $order->delete();
    //     return redirect()->route('user.orders.index')->with('deleted', 'Order eliminato');
    // }
}

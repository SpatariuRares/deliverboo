<?php

namespace App\Http\Controllers\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Order;
use App\Food;
use Illuminate\Support\Facades\DB;

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
        $contatore = count($orders);
        for($i=0 ; $i<$contatore; $i++) {
            if(isset($orders[$i])){
                for($j=$i+1 ; $j<$contatore; $j++) {
                    if(isset($orders[$j])){
                        if($orders[$j]->id == $orders[$i]->id) {
                            $orders[$i]->id = $orders[$j]->id;
                            unset($orders[$j]);
                        }
                    }
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
    public function statistic()
    {
        $currentUser = Auth::user();
        $foods = Food::where('user_id', '=', $currentUser->id)->get();
        $data=[];
        foreach ($foods as $food){
            if($food->orders!=null){
                foreach ($food->orders as $order){
                    $orders[]=$order;
                }
            }
        }

        
        //$lastWeekDay = $lastweek->subWeekday()->day;
        $startdate = $currentUser->updated_at;
        $currentDate = Carbon::now();
        $startMonth = $startdate->month;
        $dateMonth=[$currentDate->month];
        while($startdate->month > $currentDate->month){
            $dateMonth[]=$currentDate->subMonths(1)->month;
        }
        $dateMonth=array_reverse($dateMonth);

        
        
        $amountMonth=[];
        $labelsMonth=[];
        if(isset($orders)){

            foreach($orders as $order){
                $month = $order->updated_at->month;
                if (!array_key_exists($month, $amountMonth)) {
                    $amountMonth[$month] = 0;
                }
                $amountMonth[$month]+=$order->total;
            }
    
            foreach($dateMonth as $key => $month){
                if (!array_key_exists($month, $amountMonth)) {
                    $labelsMonth[$key] = 0;
                }
                else{
                    $labelsMonth[$key] = $amountMonth[$month];
                }
            }
            
            
            //fine presa dati mesi
    
            $startYear = $startdate->year;
            $dateYear=[$currentDate->year];
    
            while($startdate->year > $currentDate->year){
                $dateYear[]=$currentDate->subYears(1)->year;
            }
            $dateYear=array_reverse($dateYear);
    
            
            
            $amountYear=[];
            $labelsYear=[];
            foreach($orders as $order){
                $year = $order->updated_at->year;
                if (!array_key_exists($year, $amountYear)) {
                    $amountYear[$year] = 0;
                }
                $amountYear[$year]+=$order->total;
            }
    
            foreach($dateYear as $key => $year){
                if (!array_key_exists($year, $amountYear)) {
                    $labelsYear[$key] = 0;
                }
                else{
                    $labelsYear[$key] = $amountYear[$year];
                }
            }
            
            //serve per il grafico a torta
            $foods = Food::where('user_id', '=', $currentUser->id)->get();
            $donData = [];
            $donLabels=[];
            foreach($foods as $key => $food){
                if (!in_array($food->name, $donLabels)) {
                    $donLabels[] = $food->name;
                }
                foreach($food->orders as $order){
                    if (!array_key_exists($key, $donData)) {
                        $donData[$key] = 1;
                    }
                    else{
                        $donData[$key]++;
                    }
                }
            }
            // dd($order,$food->name,$food->id,$donData);
            return view('user.orders.statistic', compact('labelsMonth',"dateMonth","donData","donLabels",'labelsYear',"dateYear",));
        }
        return view('user.orders.statistic');
    }

    public function show($id)
    {
        $foods = DB::table('foods')
        ->rightJoin('food_order', 'foods.id', '=', 'food_order.food_id')
        ->where('food_order.order_id', '=', $id)
        ->get();
        // $contatore = count($foods);
        // for($i=0 ; $i<$contatore; $i++) {
        //     if (isset($foods[$i])) {
        //         $id = $foods[$i]->order_id;
        //         $foods[$i]->order_id = [];
        //         $foods[$i]->order_id[] = $id;
        //         for($j=$i+1 ; $j<$contatore; $j++) {
        //             if($foods[$j]->id == $foods[$i]->id) {
        //                 $foods[$i]->order_id[] = $foods[$j]->order_id;
        //                 unset($foods[$j]);
        //             }
        //         }
        //     }
        // }

        $detailOrder = Order::findOrFail($id);
        return view('user.orders.show', compact("detailOrder", "foods"));
    }
}

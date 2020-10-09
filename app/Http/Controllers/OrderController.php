<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function __construct()                   // yo constructor pani hami aafaile banako
    {            
        $this->middleware('auth:user');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::all();
        return view('user.order_form')->with(compact('products','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'product_id'=> 'required',
        ]);
        //print_r($request->product_id);
      

        //$user_id= Auth::user()->id;
        //print_r($user_id);

        //$user = Auth::guard('user');
        //dd($user);
        

        $user_id= Auth::guard('user')->user()->id;
        //dd($user_id);
        
        $order = new Order;
        $order->note = $request->note;
        $order->user_id = $user_id;
        $order->product_id = $request->product_id;
        //print_r($order->product_id);
        $order->save();

        return redirect('/user/dashboard')->with('status', 'Your order has been made successfully !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $order = Order::findOrFail($id);
        //dd($order);
        $products = Product::all();


        // $data = DB::select('select * from orders where id = ?',[$id]);      // Simple SQL query to edit

        return view('user.updateorder',compact('order', 'products'));  
        //return view('user.order_form')->with(compact('products','products')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'product_id'=> 'required',
        ]);


        $user_id= Auth::guard('user')->user()->id;
        //dd($user_id);
        $order = Order::find($id);


        if($request->has('note'))
        {
            $order->note = $request->note;
        }
        else
        {
            $order->note = 'Product Ordered';
        }
        // $order->note = $request->note;
        
        $order->user_id = $user_id;
        $order->product_id = $request->product_id;
        //print_r($order->product_id);
        $order->save();

        return redirect()->route('user.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Order::findOrFail($id);
        $data->delete();
        //DB::delete('Delete From orders where id=?',[$id]);               // Simple SQL query to delete
    
        return redirect()->route('user.dashboard');
        //return redirect('/user/dashboard');   
    }

 
}

<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function __construct()                   // yo constructor pani hami aafaile banako
    {
        $this->middleware('auth:admin');             // admin guard ko base ma authentication garauna ko lagi
        
    }


    public function index()
    {
        //$user_id= Auth::guard('admin')->user()->id;

        $orders= Order::paginate(5);
        $total= Order::all();
        $delivered= Order::select("*")->where('status', 'delivered')->get();
        $pending= Order::select("*")->where('status', 'pending')->get();

        

        return view('admin.dashboard')->with(compact('orders','total', 'delivered', 'pending'));
    }

    public function customerlist()
    {
        

        $users= User::paginate(10);
        //$users = User::all();

        $total= Order::all();
        $delivered= Order::select("*")->where('status', 'delivered')->get();
        $pending= Order::select("*")->where('status', 'pending')->get();

        return view('admin.customerlist')->with(compact('users','total', 'delivered', 'pending'));
    }

    public function productlist()
    {
        //$user_id= Auth::guard('admin')->user()->id;

        $products= Product::paginate(15);
        //$users = User::all();

       
        return view('admin.products')->with(compact('products', 'products'));
    }

    public function customerdetail(Request $request, $id)
    {
    
        $user_id= $id;
        //dd($user_id);
        $user = User::find($user_id);
        //dd($user);

        $orders = $user->order; 
        //dd($orders);

        return view('admin.customerdetail')->with(compact('user', 'orders'));
        
    }

    public function customerdelete(Request $request, $id)
    {
    
        $user_id= $id;
        //dd($user_id);
        $user = User::find($user_id);
        //dd($user);
        $user->delete();
 
        return redirect()->route('admin.dashboard');
        
    }


    public function search(Request $request)
    {
        //$orders= Order::paginate(5);
        $total= Order::all();
        $delivered= Order::select("*")->where('status', 'delivered')->get();
        $pending= Order::select("*")->where('status', 'pending')->get();


        $request->validate([
            'query'=>'required | min:3'
        ]);

        $value=$request->input('query');
        //dd($value);


        //$orders=Order::where('user_id', $user_id)->where('status', $value)->get();

        $orders =Order::where([
                            ['status', '=', $value]
                        ])->paginate(5);
      
   
        //dd($order);
      
        

        return view('admin.dashboard')->with(compact('orders','total', 'delivered', 'pending'));
    }

    

}

<?php

namespace App\Http\Controllers\User;

use App\Role;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function __construct()                   // yo constructor pani hami aafaile banako
    {
        $this->middleware('auth:user');             // user guard ko base ma authentication garauna ko lagi
    }


    public function index()
    {   
        $user_id= Auth::guard('user')->user()->id;
        $user= User::find($user_id);


        $orders = $user->order;                 // specific user ko sabbai order nikalna ko lagi Eloquent Realtioship use gareko
        $count = $orders->count();
        return view('user.dashboard')->with(compact('orders','orders', 'user', 'user', 'count', 'count'));
    }

    public function setting()
    {   
        $user_id= Auth::guard('user')->user()->id;
        $user= User::find($user_id);


       
        return view('user.account_settings')->with(compact('user'));
    }

    public function accountupdate(Request $request, $id)
    {
        //
        $this->validate($request,[
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required',
            'phone'=>'required',
            'image'=>'image | nullable  | max:2047',
        ]);


        $user_id= $id;
        //dd($user_id);
        $user = User::find($user_id);


        if($request->hasFile('image'))
        {
            $fileNameWithExt= $request->file('image')->getClientOriginalName();
            //Get file name only
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //Get extension only
            $extension= $request->file('image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path=$request->file('image')->storeAs('public/profile_images',$fileNameToStore);


            $user->profile_pic= $fileNameToStore;       // yedi image aako chai vani matra databse ko profile_pic vanni field ma image ko full name basni vayo... haina vani tyo field ma pahila j naam thiyo tei basni vayo
        }
        

        // $user->profile_pic= $fileNameToStore;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
    
        $user->save();

        return redirect()->route('user.dashboard');
    }



    public function search(Request $request)
    {
        $user_id= Auth::guard('user')->user()->id;
        $user= User::find($user_id);

        $user_order = $user->order;                 // specific user ko sabbai order nikalna ko lagi Eloquent Realtioship use gareko
        $count = $user_order->count();




        $request->validate([
            'query'=>'required | min:3'
        ]);

        $value=$request->input('query');
        //dd($value);


        //$orders=Order::where('user_id', $user_id)->where('status', $value)->get();

        // $orders=Order::where([
        //                     ['user_id', '=', $user_id],
        //                     ['status', '=', $value]
        //                 ])->get();
      
        
        //dd($order);
      
        

        return view('user.dashboard')->with(compact('user', 'user', 'orders', 'orders', 'count', 'count'));
    }

}

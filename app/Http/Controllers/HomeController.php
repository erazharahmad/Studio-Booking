<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user(); 
        $query = Order::with(['user','studio']);
        if($user->user_type == 2){
            $query->where('user_id',$user->id);
        }
        $orders = $query->get();
        
        return view('home',compact('orders'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Coupon;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $orders = Auth::user()->orders;
        $coupons = Coupon::where('id', 1)->get();
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('profile', ['coupons' => $coupons, 'categories' => $categories, 'orders' => $orders]);
    }

    public function delete($id){
        $orders = Order::where('id', $id)->delete();
        //dd($orders);
        return back()->with('delete', 'One product deleted!!');
    }
}

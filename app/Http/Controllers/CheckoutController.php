<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Order;
use App\Product;
use App\ShopCart;
use App\helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Session;
use Stripe\Charge;
use Stripe\Stripe;

class CheckoutController extends Controller
{


    public function getIndex(){

    	if (!Session::has('cart')) {
    		return redirect()->route('products');
    	}
    	return view('checkout');
    }

    public function postCheckout(Request $request){
        if (!Session::has('cart')) {
            return redirect()->route('products');
        }

        $oldcart = Session::get('cart');
        $cart = new ShopCart($oldcart);
        $email = $request->input('email');

        \Stripe\Stripe::setApiKey("sk_test_6CkEXdytp0AalMclVdvc3czi");
        try{
            $token = $_POST['stripeToken'];
            $charge = \Stripe\Charge::create([
                'amount' => $this->Numbers()->get('total'),
                'currency' => 'usd',
                'description' => 'Envo E-commerce',
                'source' => $token,

            ]);

            $order = new Order;
            $order->cart = serialize($cart);
            $order->address =  $request->input('address');
            $order->name = $request->input('name');
            $order->email = $request->input('email');
            $order->phone_number = $request->input('phone_number');
            $order->payment_id = $charge->id;
            $order->discount = (string)$this->Numbers()->get('total');

            if (Auth::user()->orders()->save($order)) {

                if (Session::has('cart')) {

                    $oldcart = Session::get('cart');
                    $cart = new ShopCart($oldcart);

                    foreach ($cart->items as $item) {
                        // $item = $item['item']['quantity'];
                        // dd($item);
                        $session = Session::get('cart')->qty;
                        $id = $item['item']['id'];
                        DB::table('products')->where('id',  $id)
                        ->decrement('quantity', $session);

                        //dd($order);
                    }

                }
                $order =Order::find($id);
                // dd($order);
                Mail::to($request->user())->send(new OrderMail($order));
                
            }
            // if (Session::has('cart')) {
            //     $order = Session::get('cart');

            //     dd($order);
            //     Mail::to($request->user())->send(new OrderMail($order));
            //     # code...
            // }
            //Auth::user()->orders()->save($order);


        } catch (\Exception $e){
            return redirect()->route('postCheckout')->with('error', $e->getMessage());

        }

        

        Session::forget('cart');
        Session::forget('coupon');
        return redirect()->route('thankyou')->with('success', 'Your Order Was Successful');
    }

    public function thankyou(){
        return view('/thankyou');
    }

    private function Numbers(){
        if (session()->has('coupon')) {
            $oldcart = Session::get('cart');
            $cart = new ShopCart($oldcart);
            $newprice = $cart->totalPrice - session()->get('coupon')['discount'];
            $total = str_replace('.', '', money_format('%i', $newprice / 364));

            return collect([
                'total' => $total,
            ]);
        } else {
            $oldcart = Session::get('cart');
            $cart = new ShopCart($oldcart);
            $newprice = $cart->totalPrice;
            $total = str_replace('.', '', money_format('%i', $newprice  / 364));

            return collect([
                'total' => $total,
            ]);

        }


    }

    // private function update(){
    //     $order = Product::find('quantity');
    //     if (Session::has('cart')) {
    //     $order->quantity - Session::get('cart')->qty;

    //        return collect([
    //             'order' => $order,
    //         ]);  
    //     }



    // }
}

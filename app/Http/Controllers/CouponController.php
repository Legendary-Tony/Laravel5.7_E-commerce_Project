<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\ShopCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
	

	public function couponStore(Request $request){
		$coupon = Coupon::where('code', $request->coupon_code)->first();
    	//dd($coupon);
		if (!$coupon) {
			return redirect()->route('cart.index')->with('coupon_error', 'Invalid coupon Code, please try again!!');
		}

		$oldCart = Session::get('cart');
		$cart = new ShopCart($oldCart);
		Session()->put('coupon', [
			'name' => $request->coupon_code,
			'discount' => $coupon->discountCode($cart->totalPrice),
		]);
		return redirect()->route('cart.index')->with('success', 'Coupon code has been applied successfully!!');

	}


	public function couponDelete(){
		session()->forget('coupon');
		return redirect()->route('cart.index')->with('coupon_error', 'Coupon has been removed');
	}
}

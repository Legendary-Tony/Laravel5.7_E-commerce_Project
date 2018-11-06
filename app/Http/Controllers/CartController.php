<?php

namespace App\Http\Controllers;

use App\Category;
use App\Coupon;
use App\Product;
use App\ShopCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class CartController extends Controller
{

  public function index()
  {

    if ( !Session::has('cart')) {
      $coupon_code = Coupon::all();
      $categories = Category::all();
      $related = Product::Random()->get();
      return view('cart', ['coupon_code' => $coupon_code, 'categories' => $categories, 'related' => $related]);
    }

    $oldCart = Session::get('cart');
    $cart = new ShopCart($oldCart);
    $coupon_code = Coupon::where('type', 'fixed')->get();
    $categories = Category::all();
    $related = Product::Random()->get();
    return view('cart', ['coupon_code' => $coupon_code, 'categories' => $categories, 'related' => $related, 'products' => $cart->items, 'totalPrice' => $cart->totalPrice]);

  }


  public function AddToCart(Request $request,$id)
  {
    // dd($request->all());
    $product = Product::find($id);
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new ShopCart($oldCart);
    $cart->add($product, $product->id);
    $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
    return redirect()->route('cart.index')->with('success', 'Item added to cart!');      
  }

  public function getReduceByOne($id){
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new ShopCart($oldCart);
    $cart->reduceByOne($id);

    if (count($cart->items) > 0) {
     Session::put('cart', $cart);
   } else {
    Session::forget('cart');
  }

  return redirect()->back();
}

public function getRemoveItems(Request $request, $id){
  // $this->validate($request, [
  //   'checkbox' => 'required',
  // ]);

  if ($request->input('checkbox')) {
   $oldCart = Session::has('cart') ? Session::get('cart') : null;
   $cart = new ShopCart($oldCart);
   $cart->removeItem($id);

   if (count($cart->items) > 0) {
     Session::put('cart', $cart);
   } else {
     Session::forget('cart');

     return redirect()->back()->with('success', 'Product Removed');
   }
 } else {
     return redirect()->back()->with('delete', 'Please, select an item');
 }




}


}

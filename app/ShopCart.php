<?php

namespace App;

use App\Product;
use Illuminate\Support\Facades\Session;

class ShopCart
{

	
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;
	

	public function __construct($oldCart){
		$qty = Session::has('cart') ? Session::get('cart')->qty : '';
		if ($oldCart) {
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
			$this->qty = $oldCart->qty;
		}
	}

	public function add($items, $id){
		//dd($items->quantity);

		$qty = request()->input('quantity');
		
		//$qty++;
		//dd($qty);
		$storedItem = ['qty' => $qty, 'price' => $items->price, 'item' => $items];
		if ($this->items) {
			if (array_key_exists( $id, $this->items)) {
				$storedItem = $this->items[$id];
			}
		}
		$storedItem['qty'] ;
		$storedItem['price']  = $items->price * $storedItem['qty'];
		$this->items[$id] = $storedItem;
		$this->qty = $storedItem['qty'];
		//$this->totalQty -= $storedItem['qty'];
		$this->totalQty++;
		$this->totalPrice += $items->price * $storedItem['qty'] ;
	}

	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];

		if ($this->items[$id]['qty'] <= 0) {
			unset($this->items[$id]);
		}
	}

	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
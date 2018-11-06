<?php 

function Price($product){

	return money_format('$%i', ($product['item'] ['price']) / 364);
}

function shop($product){
	return money_format('$%i', $product->price / 364);
}

function total($totalPrice){ 

	if (session()->has('coupon')){
		$newprice = $totalPrice - session()->get('coupon')['discount'];
		return  money_format('$%i', $newprice / 364);
		
	} 
	return money_format('$%i', $totalPrice / 364);
}

function getStock($quantity){
	if ($quantity > setting('site.product_stock')) {
		$stock = '<div class="badge badge-success">In stock</div>';
	} elseif ($quantity <= setting('site.product_stock') && $quantity > 0) {
		$stock = '<div class="badge badge-warning">Low stock</div>';
	} else {
		$stock = '<div class="badge badge-danger">Out of stock</div>';
	}

	return $stock;
}

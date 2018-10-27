<?php 

function Price($product){

	return money_format('$%i', ($product['item'] ['price']) / 363.50);
}

function shop($product){
	return money_format('$%i', $product->price / 363.50);
}

function total($totalPrice){ 

	if (session()->has('coupon')){
	$newprice = $totalPrice - session()->get('coupon')['discount'];
			return  money_format('$%i', $newprice / 363.50);
		
	} 
		return money_format('$%i', $totalPrice / 363.50);
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function findByCode($code){
    	return self::where('code', $code)->first();
    }

    public function discountCode($total){
    	if ($this->type == 'fixed') {
    		return $this->value;
    	} elseif ($this->type == 'percent') {
    		return ($this->percent_off / 100) * $total;
    	} else {
    		return 0;
    	}
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public function categories(){
		return $this->belongsToMany('App\Category');
	}
	protected $fillable = [
		'image', 'price', 'size', 'color', 'description','name'
	];

	public function scopeRandom(){
		return $this->inRandomOrder()->take(3);
	}
}

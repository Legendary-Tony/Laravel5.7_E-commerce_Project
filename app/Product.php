<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class Product extends Model
{
	use Notifiable;
    use Searchable;

     public function searchableAs()
    {
        return 'users_index';
    }

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

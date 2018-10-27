<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$now = Carbon::now()->toDateTimeString();

        // $category = new App\Category;
        // $category->name = Thongs;
        // $category->slug = thongs;
        // $category->save();

        Category::insert([
        	['name' => 'Thongs', 'slug' => 'thongs', 'created_at' => $now, 'updated_at' => $now],
        	['name' => 'Seamless Panties', 'slug' => 'seamless_panties', 'created_at' => $now, 'updated_at' => $now],
        	['name' => 'Sexiest Lingerie', 'slug' => 'sexiest_lingerie', 'created_at' => $now, 'updated_at' => $now],
        	['name' => 'Shapewear', 'slug' => 'Shapewear', 'created_at' => $now, 'updated_at' => $now],
        	['name' => 'Push-Up Bras', 'slug' => 'Push_Up_Bras', 'created_at' => $now, 'updated_at' => $now],
        	['name' => 'Low-Cut Bras', 'slug' => 'Low_cut_Bras', 'created_at' => $now, 'updated_at' => $now],

        ]);
    }
}

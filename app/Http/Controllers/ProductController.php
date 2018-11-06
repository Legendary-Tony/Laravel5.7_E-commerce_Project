<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function($query){
                $query->where('slug', request()->category);
            });
            $categories = Category::all();
            $categoryName = $categories->where('slug', request()->category)->first()->name;

        } else {

            $products = Product::inRandomOrder()->take(6);
            $categories = Category::all();
            $categoryName = 'Featured Products';
        }
        return view('shop', [
            'products' => $products->paginate(6),
            'categories' => $categories,
            'categoryName' => $categoryName
        ]);
    }


    public function show($slug)
    {
        $products = Product::where('slug', $slug)->first();
        $categories = Category::all();
        $related = Product::where('slug', '!=', $slug)->Random()->get();
        $stock = getStock($products->quantity);
       
        return view('product', [
            'stock' => $stock,
            'products' => $products,
            'categories' => $categories,
            'related' => $related
        ]);
    }


}

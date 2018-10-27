<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function($query){
                $query->where('slug', request()->category);
            });
            $categories = Category::all();
            $categoryName = $categories->where('slug', request()->category)->first()->name;

        } else {

            $products = Product::take(8);
            $categories = Category::all();
            $categoryName = 'Featured Products';
        }
        return view('shop', [
            'products' => $products->paginate(6),
            'categories' => $categories,
            'categoryName' => $categoryName
        ]);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::where('id', $id)->first();
        $categories = Category::all();
        $related = Product::where('id', '!=', $id)->Random()->get();
        return view('product', [
            'products' => $products,
            'categories' => $categories,
            'related' => $related
        ]);
    }


}

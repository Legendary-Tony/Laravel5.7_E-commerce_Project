<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $products = Product::inRandomOrder()->get();
        $categories = Category::all();
         return view('header', ['products' => $products, 'categories' => $categories]);
    }

    public function about_us(){

    }

    public function contact_us(){
        return view('/contact');
    }
}

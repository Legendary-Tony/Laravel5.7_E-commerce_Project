<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::inRandomOrder()->paginate(8);
        // $products->withPath('custom/url');
        $categories = Category::all();
        return view('header', ['products' => $products, 'categories' => $categories]);
    }

    public function about_us(){
        return view('/about_us');
    }

    public function contact_us(){
        return view('/contact');
    }


    public function search(Request $request){
        $this->validate($request, [
            'search' => 'required|min:3',
        ]);
        
        $search = Input::get('search');
        $search = Product::where('name', 'LIKE', '%'.$search.'%')
        ->orWhere('description', 'LIKE', '%'.$search.'%')
        ->orWhere('color', 'LIKE', '%'.$search.'%')
        ->orWhere('price', 'LIKE', '%'.$search.'%')->paginate(10);

        // if($request->has('search')){
        //     $search = Product::search($request->get('search'))->get();  
        // }else{
        //     $search = Product::get();
        // }
        return view('/search', compact('search'))->with('delete', 'The search must be at least 3 characters!!.');

        
    }

    
}

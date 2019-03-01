<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;



class HomeController extends Controller
{
    public function index(){

       $products=Product::where('publication_status',1)->limit(9)->get();
        return view('pages.home_content',compact('products'));

    }

    public function show_product_by_category($id){

        $category=Category::find($id);

        $products=$category->products()->where('publication_status',1)->limit(18)->get();

        
    
        
          return view('pages/product_by_category',compact('products'));
    }

    public function show_product_by_brand($id){

         $brand=Brand::find($id);

         $products=$brand->products()->where('publication_status',1)->limit(18)->get();

        
    
        
          return view('pages/product_by_brand',compact('products'));
    }
}

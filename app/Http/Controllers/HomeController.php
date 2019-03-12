<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;



class HomeController extends Controller
{
    public function index(){

       $products=Product::where('publication_status',1)->paginate(6)->onEachSide(1);
        return view('pages.home_content',compact('products'));

    }

    public function show_product_by_category($id){

        $category=Category::find($id);

        $products=$category->products()->where('publication_status',1)->paginate(6)->onEachSide(1);

        
    
        
          return view('pages/product_by_category',compact('products'));
    }

    public function show_product_by_brand($id){

         $brand=Brand::find($id);

         $products=$brand->products()->where('publication_status',1)->paginate(6)->onEachSide(1);

        
    
        
          return view('pages.product_by_brand',compact('products'));
    }

    public function product_detail($id){

      $product=Product::find($id);

      return view('pages.product_detail',compact('product'));


    }

    public function search(Request $request){

      $request->validate([
         
        'query'=>'required '

      ]);

     $query=$request->input('query');

     $products=Product::where('publication_status',1)
                      ->where('product_name','like',"%$query%")
                      ->orWhere('product_short_description','like',"%$query%")
                      ->paginate(6)->onEachSide(1);

     
      
      return view('pages.search',compact('query','products'));


    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use Cart;
use App\Category;

class CartController extends Controller
{
    public function add_to_cart(Request $request){

      $product_id=$request->product_id;
      $product_quantity=$request->product_quantity;

      $product=Product::find($product_id);

      Cart::add($product->id,
      $product->product_name,
      $product_quantity,
      $product->product_price,
      ['image'=>$product->product_image]);

      return redirect('/show-cart');

    }

    
    public function show_cart(){

       $categories=Category::where('publication_status',1)->get();
       $contents=Cart::content();
        
    //    return Cart::content();  
       return view('pages.add_to_cart',compact('categories','contents'));

    }

    public function delete_from_cart($id){

         Cart::remove($id);
         return redirect('/show-cart');

    } 
    public function update_item(Request $request,$id){

        $quantity= $request->product_quantity; 
         Cart::update($id,$quantity);
         return redirect('/show-cart');

   }
   

}

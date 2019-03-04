<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class CartController extends Controller
{
    public function add_to_cart(Request $request){

      $product_id=$request->product_id;
      $product_quantity=$request->product_quantity;

      $product=Product::find($product_id);

      return view('pages.add_to_cart',compact('product','product_quantity'));

    }
}

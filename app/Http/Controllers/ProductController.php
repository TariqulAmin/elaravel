<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\Http\Requests\AddProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $products=Product::all();
        return view('admin.product.all_product',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('publication_status',1)->get();
        $brands=Brand::where('publication_status',1)->get();

        return view('admin.product.add_product',compact('categories','brands'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        // Product::create($request->all());
        //  return $request->file('product_image');

        $input=$request->all();

        if($file=$request->file('product_image')){

           $name=time().$file->getClientOriginalName();
           $file->move('images',$name);
           $input['product_image']=$name;

        }

        Product::create($input);
        $request->session()->flash('message', 'Product Added Successfully');
        return redirect('/product/create');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $categories=Category::where('publication_status',1)->get();
        $brands=Brand::where('publication_status',1)->get();
        return view('admin.product.edit_product',compact('product','categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);

        $input=$request->all();

        if($file=$request->file('product_image')){

           $name=time().$file->getClientOriginalName();
           $file->move('images',$name);
           $input['product_image']=$name;

        }

        $product->update($input);
        $request->session()->flash('message', 'Product Updated Successfully');
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $product=Product::find($id);

        $product->delete();

        $request->session()->flash('message', 'Product Deleted Sucessfully');

        return redirect('/product');
    }

    public function active(Request $request ,$id){

        $product=product::find($id);
   
        $product->update(['publication_status'=>0]);
   
        $request->session()->flash('message', 'product Made Inactive Successfully');
   
        return redirect('/product');
   
       }
   
       public function inactive( Request $request ,$id){
   
           $product=Product::find($id);
           $product->update(['publication_status'=>1]);
   
           $request->session()->flash('message', 'Product Made Active Successfully');
      
           return redirect('/product');
      
          }
}

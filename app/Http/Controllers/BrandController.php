<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddBrandRequest;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::all();
        return view('admin.brand.all_brand',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.add_brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBrandRequest $request)
    {

    //    return $request->all(); 
        Brand::create($request->all());
        $request->session()->flash('message', 'Brand Added');
        return redirect('/brand/create');
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
        $brand=Brand::find($id);
        return view('admin.brand.edit_brand',compact('brand'));
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
        $brand=Brand::find($id);

        $brand->update($request->all());

        $request->session()->flash('message', 'Brand Updated Sucessfully');

        return redirect('/brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $brand=Brand::find($id);

        $brand->delete();

        $request->session()->flash('message', 'Brand Deleted Sucessfully');

        return redirect('/brand');
    }

    
    public function active(Request $request ,$id){

        $brand=Brand::find($id);
   
        $brand->update(['publication_status'=>0]);
   
        $request->session()->flash('message', 'Brand Made Inactive Successfully');
   
        return redirect('/brand');
   
       }
   
       public function inactive( Request $request ,$id){
   
           $brand=Brand::find($id);
           $brand->update(['publication_status'=>1]);
   
           $request->session()->flash('message', 'Brand Made Active Successfully');
      
           return redirect('/brand');
      
          }
}

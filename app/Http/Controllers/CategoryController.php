<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AddCategoryRequest;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.all_category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategoryRequest $request)
    {
        Category::create($request->all());
        $request->session()->flash('message', 'Category Added');
        return redirect('/category/create');
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
        $category=Category::find($id);
        return view('admin.category.edit_category',compact('category'));
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
        
        $category=Category::find($id);

        $category->update($request->all());

        $request->session()->flash('message', 'Category Updated Sucessfully');

        return redirect('/category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $category=Category::find($id);

        $category->delete();

        $request->session()->flash('message', 'Category Deleted Sucessfully');

        return redirect('/category');
    }

    
    public function active(Request $request ,$id){

     $category=Category::find($id);

     $category->update(['publication_status'=>0]);

     $request->session()->flash('message', 'Category Made Inactive Successfully');

     return redirect('/category');

    }

    public function inactive( Request $request ,$id){

        $category=Category::find($id);
        $category->update(['publication_status'=>1]);

        $request->session()->flash('message', 'Category Made Active Successfully');
   
        return redirect('/category');
   
       }


}

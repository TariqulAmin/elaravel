@extends('admin_layout')

@section('admin_content')
    
<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">Home</a>
    <i class="icon-angle-right"></i> 
  </li>
  <li>
    <i class="icon-edit"></i>
    <a href="#">Forms</a>
  </li>
</ul>

<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>
      
    </div>
    
   @include('error')

    <div class="box-content">
    <form class="form-horizontal" method="POST" action="{{action('ProductController@update',$product->id)}}" enctype="multipart/form-data">

      @csrf
      @method('PATCH')
      
        <fieldset>
  
        <div class="control-group">
          <label class="control-label" for="date01">Product Name</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="product_name" value="{{$product->product_name}}">
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="selectError3">Product Category</label>
          <div class="controls">
            <select name="category_id" id="selectError3">
              <option value="">Select Category</option>
              @foreach ($categories as $category)
               
              <option value="{{$category->id}}">{{$category->category_name}}</option>
                  
              @endforeach
            
         
            </select>
          </div>
          </div>

          
        <div class="control-group">
          <label class="control-label" for="selectError3">Product Brand</label>
          <div class="controls">
            <select name="brand_id" id="selectError3">
                <option value="">Select Brand</option>
                @foreach ($brands as $brand)
               
              <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                    
                @endforeach
            </select>
          </div>
          </div>
         
        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">Product Short Description</label>
          <div class="controls">
          <textarea class="cleditor" name="product_short_description" rows="3">{{$product->product_short_description}}</textarea>
          </div>
        </div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">Product Long Description</label>
          <div class="controls">
          <textarea class="cleditor" name="product_long_description" rows="3">{{$product->product_short_description}}</textarea>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="date01">Product Price</label>
          <div class="controls">
          <input type="number" class="input-xlarge" name="product_price" value="{{$product->product_price}}">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="fileInput">Image Input</label>
          <div class="controls">
          <input name="product_image" class="input-file uniform_on" id="fileInput" type="file">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="date01">Product Size</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="product_size" value="{{$product->product_size}}"">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="date01">Product Color</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="product_color" value="{{$product->product_color}}">
          </div>
        </div>

         

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Edit Product</button>
          
        </div>
        </fieldset>
      </form>   

    </div>
  </div><!--/span-->

</div><!--/row-->

@endsection
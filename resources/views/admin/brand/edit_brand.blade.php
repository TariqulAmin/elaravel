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
        <h2><i class="halflings-icon edit"></i><span class="break"></span>Brand Category</h2>
        
      </div>
      
     @include('error')
  
      <div class="box-content">
      
      <form class="form-horizontal" method="POST" action="{{action('BrandController@update',$brand->id)}}">
  
        @csrf
        @method('PATCH')
        {{-- <input type="hidden" name="_method" value="PATCH"> --}}

        <input type="hidden" name="">
          <fieldset>
    
          <div class="control-group">
            <label class="control-label" for="date01">Brand Name</label>
            <div class="controls">
            <input type="text" class="input-xlarge" name="brand_name" value="{{$brand->brand_name}}">
            </div>
          </div>
           
          <div class="control-group hidden-phone">
            <label class="control-label" for="textarea2">Brand Description</label>
            <div class="controls">
            <textarea class="cleditor" name="brand_description" rows="3">
             
                {{$brand->brand_description}}

            </textarea>
            </div>
          </div>
  
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Edit Brand</button>
            
          </div>
          </fieldset>
        </form>   
  
      </div>
    </div><!--/span-->
  
  </div><!--/row-->
    
@endsection
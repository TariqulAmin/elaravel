@extends('admin_layout')

@section('admin_content')

<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">Home</a> 
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="#">Tables</a></li>
</ul>

<div class="row-fluid sortable">		
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
      </div>
    </div>

    @include('error')
    <div class="box-content">
      <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
          <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Category Name</th>
            <th>Brand Name</th>
                                    
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>   
        <tbody>

        @foreach ($products as $product)

        <tr>
            <td>{{$product->id}}</td>
            <td class="center">{{$product->product_name}}</td>
       
            <td class="center"><img height="50px" width="60px" src="images/{{$product->product_image}}" alt=""></td>
            <td class="center">{{$product->product_price}} TK.</td>
            <td class="center">{{$product->category->category_name}}</td>
            <td class="center">{{$product->brand->brand_name}}</td>
                        

            <td class="center">

              @if ($product->publication_status==1)
               
              <span class="label label-success">Active</span>
              
              @elseif($product->publication_status==0)
              
              <span class="label label-danger">Inactive</span>   
              
              @endif
              
            </td>
            
            <td class="center">

              
                @if ($product->publication_status==1)
               
                  <a class="btn btn-success" href="/product/active/{{ $product->id }}">
                    <i class="halflings-icon white thumbs-up"></i>  
                  </a>
                
                @elseif($product->publication_status==0)
                
                <a class="btn btn-danger" href="/product/inactive/{{ $product->id }}">
                    <i class="halflings-icon white thumbs-down"></i>  
                  </a>  
                
                @endif


              
            

              <a class="btn btn-info" href="{{route('product.edit',$product->id)}}">
                <i class="halflings-icon white edit"></i>  
              </a>
              
            <form id ="form-delete" class=""  method="POST" action="{{action('ProductController@destroy',$product->id)}}">
                 
                 @csrf
                 @method('DELETE')
                
                 <button type="submit" class="btn btn-danger" id="delete">
                 <i class="halflings-icon white trash"></i> 
                </button>

            </form>
            
            </td>
          </tr>
            
        @endforeach 
 
  
        </tbody>
      </table>            
    </div>
  </div><!--/span-->

</div><!--/row-->

    
@endsection
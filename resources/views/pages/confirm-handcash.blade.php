@extends('layout')
@section('content')


  <div class="container">
    <div class="row ">
      <div class="col-sm-8 col-sm-offset-2" >
        
        @if (Session::has('success'))
              
        <h2 class="text-muted"> {{Session::get('success')}} </h2>

        @endif   
        
      </div>
     
   
    </div>
  </div>


    
@endsection 
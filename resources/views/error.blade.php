@if ($message=session('message'))
						

<h2 class="alert alert-success">{{$message}}</h2>

@endif


@if ($errors->any())

    @foreach ($errors->all() as $error)
    
      <h2 class=" alert alert-danger ">{{$error}}</h2>
        
    @endforeach

   
@endif
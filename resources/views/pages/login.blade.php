@extends('layout_minus_slider')
@section('content')

<section id="form mt-5"><!--form-->
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="login-form"><!--login form-->
          @include('error')
          <h2>Login to your account</h2>
          <form method="POST" action="{{url('/customer_login_system')}}">
            @csrf
            <input type="email" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Password" />
         
            <button type="submit" class="btn btn-default">Login</button>
          </form>
        </div><!--/login form-->
      </div>
      <div class="col-sm-1">
        <h2 class="or">OR</h2>
      </div>
      <div class="col-sm-4">
        <div class="signup-form"><!--sign up form-->
          @include('error')
          <h2>New User Signup!</h2>
        <form method="POST" action="{{url('/customer-registration')}}">
            @csrf
            <input type="text" name="first_name" placeholder="First Name"/>
            <input type="text" name="last_name" placeholder="Last Name"/>

            <input type="email" name="email" placeholder="Email"/>
            <input type="password" name="password" placeholder="Password"/>
            <input type="text" name="mobile_number" placeholder="Mobile No."/>

            <button type="submit" class="btn btn-default">Signup</button>
          </form>
        </div><!--/sign up form-->
      </div>
    </div>
  </div>
</section><!--/form-->

    
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Http\Requests\AdminLoginRequest;

class AdminController extends Controller
{
    

   public function login_page(){


     session()->forget(['admin_id','admin_name']);
     return view('admin_login');

   }

   public function login(AdminLoginRequest $request){
    
     
    $email= $request->admin_email;
    $password=md5($request->admin_password);

    $admin=Admin::where('email',$email)->where('password',$password)->first();

            if ($admin) {

            session(['admin_name'=>$admin->name,'admin_id'=>$admin->id]); 
            
            // return $request->session()->all();
                
             return redirect('/dashboard');

            } else {


                $request->session()->flash('message', 'Invalid Email OR Password');
                return redirect('/admin');

            }
            
    

   }

   public function show_dashboard(){
   
    return view('admin.dashboard');

   }




                public function logout(){

                session()->forget(['admin_id','admin_name']);

                return redirect('/admin');


              }

}

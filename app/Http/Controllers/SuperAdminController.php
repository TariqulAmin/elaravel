<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function logout(){

     session()->forget(['admin_id','admin_name']);

     return redirect('/admin');


    }
}

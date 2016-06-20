<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;




class DashboardController extends Controller
{
    //
    public function index(Request $request){
        
        if($request->session()->has('id')){
          
            

            return view('dashboard');
        }else{
            return redirect('/');
        }   
    }
}

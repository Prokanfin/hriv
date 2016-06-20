<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ManageRoleController extends Controller
{
    //
    
    public function index(Request $request) {
        
        
        
        if($request->session()->has('id')){
        
            return view('secure/role');
        }else{
            return redirect('/');
        }   
    }
    


    public function listMenu(Request $request){
        
          
        if($request->session()->has('id')){

            return  $menu = DB::table('menu')->join('menu_user','menu.menu_id','=','menu_user.menu_user_id')
                                         ->where('user_id',$request->session()->get('id'))->get();
        }else{
            return redirect('/');
        }   
    }
    
     public function listMenuId(Request $request){
        
          
        if($request->session()->has('id')){

            return  $menu = DB::table('menu')->join('menu_user','menu.menu_id','=','menu_user.menu_user_id')
                                         ->where('user_id',$request->input('id'))->get();
        }else{
            return redirect('/');
        }   
    }
    
    public function listMenuAll(Request $request){

        if($request->session()->has('id')){

            return  $menu = DB::table('menu')->get();
            
        }else{
            return redirect('/');
        }   
        
    }

    public function updateId(Request $request) {
        
         if($request->session()->has('id')){

           
             
        }else{
            return redirect('/');
        }   
        
    }
    
    
}

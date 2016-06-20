<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\UserModel;
use App\EmployeeModel;
use App\CustomerModel;



class AuthenController extends Controller {

    //
    public function index(Request $request) {


        if ($request->session()->has('id')) {

            return redirect('/dashboard');
        } else {

            return redirect('/login');
        }
    }

    public function authen(Request $request) {


        if ($request->session()->has('id')) {

            return redirect('/');
        } else {

            return view('login');
        }
    }

    public function checkAuth(Request $request) {
        
        if ($result = UserModel::CheckUser($request->input('txtUsername'), md5($request->input('txtPassword')."rtgpk"))) {

              //dd($result);
          
            if ($result != 'ไม่ผ่าน') {
                  
            
                $request->session()->put('id', $result->id);
                $request->session()->put('em_id', $result->em_id);
                $request->session()->put('customer_id', $result->customer_id);
                $request->session()->put('status', $result->status);
                $request->session()->put('work_status', $result->work_status);
                $request->session()->put('role', $result->role);
                
                if(($result->em_id != NULL ) && ($result->customer_id == NULL)){
                    
                    $em = EmployeeModel::SelEmId($result->em_id);
                    
                    $request->session()->put('name',$em->em_name);
                   
                  
                    $emFile = json_decode($em->em_file);
                    
                    $request->session()->put('pic',$emFile->ePic);
                    
                    //dd($request->session()->all());
       
                }elseif (($result->em_id == NULL)&&($result->customer_id != NULL)) {
                    
                    $cus = CustomerModel::SelCusId($result->customer_id);
                    
                    
                    $request->session()->put('name',$cus->customer_status.".".$cus->customer_name);
                  
                    $cusFile = json_decode($cus->customer_file);
                    
                    $request->session()->put('pic',$cusFile->cPic);
                    
                    //dd($request->session()->all());
                }
                
               
                
                   
                
                //dd($request->session()->all());
                
                
                return redirect('/');
            } else {



                return redirect('/');
            }
        }
    }

    public function logout() {



        $data = session()->flush();



        return redirect('/');
    }

}

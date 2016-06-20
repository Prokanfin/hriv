<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //

    protected $table = 'user';

    public function scopeCheckUser($query,$username,$password){

        

        $result = $query->where('username',$username)

    			->where('password',$password)->first();

        if($result==NULL){

            $result='ไม่ผ่าน';

            return $result;

        }else{

            return $result;

        }   

    }
    
    public function scopeSelUserId($query,$id){
        
        $result = $query->where('id',$id)->addSelect('username')->get();
        return $result[0];
    }
    
   
    
   

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    //
    protected $table ='employee';
    
    public function scopeSelEmId($query,$em_id) {
        
        $result = $query->where('em_id',$em_id)->first();
        
        return $result;
    }
    
}

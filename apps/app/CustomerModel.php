<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model {

    //
    protected $table = 'customer';

    public function scopeSelCusId($query, $cus_id) {

        $result = $query->where('customer_id', $cus_id)->first();

        return $result;
    }

    public function scopeSelTaxId($query, $customerId) {

        $result = $query->where('customer_id', $customerId)
                        ->addSelect('customer_tax_id')->first();

        return $result['customer_tax_id'];
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $guarded = [];

    public function order(){
        return $this->hasOne(Order::class); //* Order'ı Customers'a bağladık.
    }

    public function bill(){
        return $this->hasOne(Bill::class, 'customer_id');
    }
}

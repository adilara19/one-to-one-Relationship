<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'billings';
    protected $fillable = ['customer_id', 'title', 'description', 'total']; 
}

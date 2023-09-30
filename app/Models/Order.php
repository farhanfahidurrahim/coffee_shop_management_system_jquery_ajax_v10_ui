<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'last_name',
        'phone',
        'address',
        'country',
        'city',
        'postcode',
        'email',
        'total_price',
        'user_id',
        'status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booktable extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'last_name',
        'date',
        'time',
        'phone',
        'message',
        'user_id',
        'status',
    ];
}

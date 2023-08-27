<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'second_name',
        'phone_number',
        'city',
        'street',
        'country'
    ];
}

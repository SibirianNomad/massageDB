<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    protected $table = 'client';
    protected $fillable=[
        'fio',
        'date_of_birth',
        'massage_type',
        'medical_background',
        'annotation',
        'last_massage',
        'created_at'
    ];
}

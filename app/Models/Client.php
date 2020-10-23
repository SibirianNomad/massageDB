<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    protected $table = 'client';
    use SoftDeletes;
    protected $fillable=[
        'fio',
        'birthday',
        'massage_type',
        'medical_background',
        'annotation',
        'last_massage',
        'created_at',
        'is_active'
    ];

}

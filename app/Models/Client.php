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
        'skin_diseases',
        'JKT_diseases',
        'adenopathia',
        'endocrine_system',
        'CDV',
        'respiratory_diseases',
        'veneral_diseases',
        'pregnant',
        'allergic_response',
        'drugs',
        'annotation',
        'last_massage',
        'created_at',
        'is_active',
        'photo'
    ];
    public function getBirthdayAttribute($valueFromObject)
    {
        return Carbon::parse($valueFromObject)->format('d.m.Y');
    }
    public function getLastMassageAttribute($valueFromObject)
    {
        return Carbon::parse($valueFromObject)->format('d.m.Y');
    }
}

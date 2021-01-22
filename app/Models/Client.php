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
        'pregnant',
        'allergic_response',
        'drugs',
        'annotation',
        'last_massage',
        'created_at',
        'is_active',
        'photo',
        'gynecological_diseases'
    ];
    public function getBirthdayAttribute($valueFromObject)
    {
        if($valueFromObject==null){
            return null;
        }else{
            return Carbon::parse($valueFromObject)->format('d.m.Y');
        }
    }
    public function getLastMassageAttribute($valueFromObject)
    {
        if($valueFromObject==null){
            return null;
        }else{
            return Carbon::parse($valueFromObject)->format('d.m.Y');
        }
    }

}

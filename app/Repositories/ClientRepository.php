<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

use App\Models\Client as Model;
use Carbon\Carbon;


class ClientRepository extends CoreRepository
{
    protected function getModelClass(){
        return Model::class;
    }
    public function getAllWithPaginate($countPage=null,$text='')
    {
        $fields=[
            'id',
            'fio',
            'birthday',
            'medical_background',
            'annotation',
            'last_massage',
            'created_at',
            'is_active',
            'photo'
        ];

        $result=$this
            ->startConditions()
            ->select($fields)
            ->where('fio','like','%'.$text.'%')
            ->orderBy('fio')
            ->paginate($countPage);

        return $result;

    }

    public function getEdit($id){
        return $this->startConditions()->find($id);
    }

    public function getAllBirthdays(){
        $birthdays=[];
        $data=Model::withTrashed()->get();
        foreach($data as $record){
            $day= Carbon::now()->diffInHours($record->birthday, false);
            if($day<48 && $day>(-15) && $record['deleted_at']==null && $record->birthday!=null){
                $birthdays[]=$record;
            }
        }
        return $birthdays;
    }
    public function getCurrentDate(){
        $day= Carbon::now('Asia/Tomsk')->format('d.m.Y');
        return $day;
    }

}


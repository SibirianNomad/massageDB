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
    public function getAllWithPaginate($countPage=null)
    {
        $fields=[
            'id',
            'fio',
            'birthday',
            'massage_type',
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
            ->toBase()
            ->paginate($countPage);

        return $result;

    }

    public function getEdit($id){
        return $this->startConditions()->find($id);
    }

    public function getBirthdays(){
        $birthdays=[];
        $data=Model::withTrashed()->get();
        $collection=collect($data->toArray());
        foreach($collection as $record){
            $birthday = Carbon::parse($record['birthday']);
            $birthday->year(date('Y'));
            $day= Carbon::now()->diffInHours($birthday, false);
            if($day<48 && $day>(-15) && $record['deleted_at']==null){
                $record['birthday']=Carbon::parse($record['birthday'])->format('d.m.Y');
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


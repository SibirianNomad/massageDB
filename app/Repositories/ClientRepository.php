<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

use App\Models\Client as Model;


class ClientRepository extends CoreRepository
{
    protected function getModelClass(){
        return Model::class;
    }
    public function getAllWithPaginate($countPage=null)
    {
        $fields=['id','fio','date_of_birth','massage_type','medical_background','last_massage','created_at'];

        $result=$this
            ->startConditions()
            ->select($fields)
            ->toBase()
            ->paginate($countPage);
        return $result;

    }


}


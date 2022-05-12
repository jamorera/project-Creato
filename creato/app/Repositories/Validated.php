<?php

namespace App\Repositories;

class Validated{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;        
    }
    
    public function exist($id){
        if ($this->model::where(["id"=>$id])->exists()) {
            $data=['code'=>200];
        }else {
            $data=['message'=>'No existe el elemento solicitado, verifique nuevamente.','code'=>404];
        }  
        return $data;
    }

}
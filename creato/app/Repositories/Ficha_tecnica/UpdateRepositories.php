<?php 

namespace App\Repositories\Ficha_tecnica;

class UpdateRepositories{

    private $model;
    private $info;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function update($id,$data){
        $this->model::findOrFail($id)->fill($data)->updateOrFail();
        $this->info = [
            'code'=>200,
            'message'=>'Datos actualizados correctamente.'
        ];
        return  $this->info;
    }
}
<?php 

namespace App\Repositories\Ficha_tecnica;

class CreateRepositories{

    private $model;
    private $solicitud;
    private $info;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create($data){
        $this->solicitud = new $this->model;
        $this->solicitud->fill($data)->saveOrFail();
        $this->info=[
            'message'=>'Datos registrados correctamente',
            'code'=>200
        ];
        return $this->info;
    }
}
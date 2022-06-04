<?php 

namespace App\Repositories\Ficha_tecnica;

class IndexRepositories{

    private $model;
    private $info;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index(){
        $data = $this->model::all();
        $this->info=[
            'message'=>'Datos generados correctamente.',
            'code'=>200,
            'data'=>$data
        ];
        return $this->info;
    }
}
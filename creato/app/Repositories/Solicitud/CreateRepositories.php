<?php 

namespace App\Repositories\Solicitud;

use App\Service\RelationsService;


class CreateRepositories{

    private $model;
    protected $solicitud;
    protected $relations;
    private $info;

    public function __construct($model)
    {
        $this->model = $model;
        $this->relations = new RelationsService();
    }

    public function create($data){
        $this->solicitud = new $this->model($data);
        $this->solicitud->saveOrFail();

        //relaciones
        $this->relations->saveRelactions($data, $this->solicitud);           

        $this->info=[
            'message'=>'Datos registrados correctamente',
            'code'=>200
        ];
        return $this->info;
    }
}
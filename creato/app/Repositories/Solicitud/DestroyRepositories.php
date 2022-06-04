<?php 

namespace App\Repositories\Solicitud;

class DestroyRepositories{

    private $model;
    private $info;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function delete($id){
        $this->model::findOrFail($id)->deleteOrFail();
        $this->info = [
            'code'=>200,
            'message'=>'Registro eliminados correctamente.'
        ];
        return $this->info;
    }
}
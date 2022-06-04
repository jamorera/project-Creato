<?php 

namespace App\Repositories\Ficha_tecnica;

class ShowRepositories{

    private $model;
    private $itemData;
    private $info;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function show($id){
        $this->itemData =$this->model::findOrFail($id);
        $this->info = ['code'=>200,
            'data'=>$this->itemData
        ];
        return $this->info;
    }
}
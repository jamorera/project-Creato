<?php

namespace App\Repositories;

use Illuminate\Support\Arr;

class Repository{

    private $model;    
    protected $validated;

    public function __construct($model)
    {
        $this->model = $model;
        $this->validated = new Validated($model);
    }
    
    public function index(){
        $data = $this->model::all();
        $info=[
            'message'=>'Datos generados correctamente.',
            'code'=>200
        ];
        $data = Arr::add($info,'data',$data);
        return $data;
    }
    public function create($data){
        $this->model::create($data);
        $info=[
            'message'=>'Datos registrados correctamente',
            'code'=>200
        ];
        return $info;
    }
    public function show($id){
        $itemData =$this->model::findOrFail($id);
        $info = ['code'=>200];
        $data = Arr::add($info,'data',$itemData);
        return $data;
    }
    public function update($id,$data){
        $this->model::findOrFail($id)->update($data);
        $info = [
            'code'=>200,
            'message'=>'Datos actualizados correctamente.'
        ];
        return  $info;
    }
    public function delete($id){
        $this->model::findOrFail($id)->delete();
        $info = [
            'code'=>200,
            'message'=>'Registro eliminados correctamente.'
        ];
        return $info;
    }
}
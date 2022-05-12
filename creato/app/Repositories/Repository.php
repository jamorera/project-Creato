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
        $data = $this->model::create($data);
        $info=[
            'message'=>'Datos registrados correctamente',
            'code'=>200
        ];
        return $info;
    }
    public function show($id){
        $itemData =$this->model::find($id);
        $validate = $this->validated->exist($id);
        $data = Arr::add($validate,'data',$itemData);
        if($validate['code']==200){
            $data;
        }else{
            $data = Arr::except($data,['data']);
        }
        return $data;
    }
    public function update($id,$data){
        $validate = $this->validated->exist($id);
        if($validate['code']==200){
            $this->model::find($id)->update($data);
            $message = 'Datos actualizados correctamente.';
            $data = Arr::add($validate,'message',$message);
        }else{
            $data = $validate;
        }
        return  $data;

    }
    public function delete($id){
        $validate = $this->validated->exist($id);
        if($validate['code']==200){
            $this->model::where(["id"=>$id])->first()->delete();
            $message = 'Registro eliminado correctamente.';
            $data = Arr::add($validate,'message',$message);
        }else{
            $data = $validate;
        }
        return $data;
    }
}
<?php

namespace App\Http\Controllers\Api\Rol;

use App\Models\Rol;
use Illuminate\Http\Request;
use App\Http\Requests\RolRules;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Http\Responsables\Response;
use App\Http\Controllers\Controller;

class RolController extends Controller
{
    protected $repository;
    protected $response;

    public function __construct()
    {
        $this->repository = new Repository(Rol::class);  
        $this->response = new Response();
    }

    public function index()
    {
        try{
            $this->data = $this->repository->index();            
        } catch (\Exception $e) {
            $this->data = [
                'message' => 'No ha sido posible traer registros, por favor verifique e intente nuevamente.',
                'code' => 500
            ];
        }  
        return $this->response->json($this->data);
    }
     
    public function create(RolRules $request){
        DB::beginTransaction();
        try { 
            $this->data = $this->repository->create($request->all());
            DB::commit();
        } catch (\Exception $e) {   
            DB::rollback();
            $this->data=[
                'message' => 'No ha sido posible registrar los datos, por favor verifique e intente nuevamente.',
                'code' => 500,
                'error' => $e->getMessage()
            ];
        }     
        return $this->response->json($this->data);
    }

    public function show($id){
        try {
            $this->data = $this->repository->show($id); 
        } catch (\Exception $e) {
            $this->data =[
                "message"=>"No ha sido posible realizar proceso, por favor verifique e intente nuevamente.",
                "code"=>500
            ];
        }  
        return $this->response->json($this->data);
    }
    public function update(RolRules $request, $id){
        DB::beginTransaction();
        try {
            $this->data = $this->repository->update($id,$request->all()); 
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $this->data =[
                "message"=>"No ha sido posible realizar proceso, por favor verifique e intente nuevamente.",
                "code"=>500
            ];
        }
        return $this->response->json($this->data);
    }
    
    public function destroy($id){
        DB::beginTransaction();
        try {
            $this->data = $this->repository->delete($id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $this->data =[
                "message"=>"No ha sido posible eliminar registro, por favor verifique e intente nuevamente.",
                "code"=>500
            ];
        }
        return $this->response->json($this->data);
    }   
}

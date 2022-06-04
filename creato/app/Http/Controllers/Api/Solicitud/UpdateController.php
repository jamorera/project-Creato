<?php

namespace App\Http\Controllers\Api\Solicitud;

use App\Models\Solicitud;
use App\Http\Responsables\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\SolicitudRules;
use App\Repositories\Solicitud\UpdateRepositories;

class UpdateController extends Controller
{
    protected $repository;
    protected $response;
    public $data;

    public function __construct()
    {
        $this->repository = new UpdateRepositories(Solicitud::class);  
        $this->response = new Response();
    }
    public function update(SolicitudRules $request, $id){
        try {
            $this->data = $this->repository->update($id,$request->all()); 
        } catch (\Exception $e) {
            $this->data =[
                "message"=>"No ha sido posible realizar proceso, por favor verifique e intente nuevamente.",
                "code"=>500,
            ];
        }
        return $this->response->json($this->data);
    }  
}

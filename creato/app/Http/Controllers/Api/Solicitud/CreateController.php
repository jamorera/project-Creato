<?php

namespace App\Http\Controllers\Api\Solicitud;

use App\Models\Solicitud;
use App\Http\Responsables\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\SolicitudRules;
use App\Repositories\Solicitud\CreateRepositories;

class CreateController extends Controller
{
    protected $repository;
    protected $response;
    public $data;

    public function __construct()
    {
        $this->repository = new CreateRepositories(Solicitud::class);  
        $this->response = new Response();
    }
    
    public function create(SolicitudRules $request){
        try {             
            $this->data = $this->repository->create($request->all());
        } catch (\Exception $e) {   
            $this->data=[
                'message' => 'No ha sido posible registrar los datos, por favor verifique e intente nuevamente.',
                'code' => 500,
                'error'=>$e
            ];
        }     
        return $this->response->json($this->data);
    }
   
}

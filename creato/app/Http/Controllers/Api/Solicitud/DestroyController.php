<?php

namespace App\Http\Controllers\Api\Solicitud;

use App\Models\Solicitud;
use App\Http\Responsables\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\SolicitudRules;
use App\Repositories\Solicitud\DestroyRepositories;

class DestroyController extends Controller
{
    protected $repository;
    protected $response;
    public $data;

    public function __construct()
    {
        $this->repository = new DestroyRepositories(Solicitud::class);  
        $this->response = new Response();
    }
    public function destroy($id){
        try {
            $this->data = $this->repository->delete($id);
        } catch (\Exception $e) {
            $this->data =[
                "message"=>"No ha sido posible eliminar registro, por favor verifique e intente nuevamente.",
                "code"=>500
            ];
        }
        return $this->response->json($this->data);
    }   
}

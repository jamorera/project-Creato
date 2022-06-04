<?php

namespace App\Http\Controllers\Api\Ficha_tecnica;

use App\Models\Solicitud;
use App\Http\Responsables\Response;
use App\Http\Controllers\Controller;
use App\Repositories\Solicitud\ShowRepositories;

class ShowController extends Controller
{
    protected $repository;
    protected $response;
    public $data;

    public function __construct()
    {
        $this->repository = new ShowRepositories(Solicitud::class);  
        $this->response = new Response();
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
}

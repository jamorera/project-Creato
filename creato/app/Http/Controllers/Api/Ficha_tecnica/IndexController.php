<?php

namespace App\Http\Controllers\Api\Ficha_tecnica;


use App\Http\Responsables\Response;
use App\Http\Controllers\Controller;
use App\Models\Ficha_tecnica;
use App\Repositories\Ficha_tecnica\IndexRepositories;

class IndexController extends Controller
{
    protected $repository;
    protected $response;
    public $data;

    public function __construct()
    {
        $this->repository = new IndexRepositories(Ficha_tecnica::class);  
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
}

<?php

namespace App\Http\Controllers\Api\Solicitud;

use App\Models\Solicitud;
use Illuminate\Support\Facades\DB;
use App\Http\Responsables\Response;
use App\Http\Controllers\Controller;
use App\Repositories\Solicitud\IndexRepositories;

class IndexController extends Controller
{
    protected $repository;
    protected $response;
    public $data;

    public function __construct()
    {
        $this->repository = new IndexRepositories(Solicitud::class);  
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

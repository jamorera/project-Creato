<?php

namespace App\Service;

class RelationsService
{
    protected $madera_lamina;
    protected $insumos;
    public function saveRelactions($data, $solicitud)
    {
        switch ($data['tipo_de_huacal']) {
            case 'madera':
            case 'jaula':
                $this->madera_lamina = [
                    $data['bloque_base'],
                    $data['tabla_base'],
                    $data['liston_costados'],
                    $data['tabla_costados']
                ];
                $this->insumos = [
                    $data['puntilla_base'],
                    $data['puntilla_costados']
                ];
                break;
            case 'carton':
            case 'triplex':
                $this->madera_lamina = [
                    $data['bloque_base'],
                    $data['tabla_base'],
                    $data['liston_costados'],
                    $data['lamina']
                ];
                $this->insumos = [
                    $data['puntilla_base'],
                    $data['grapa_costados']
                ];
                break;      
            default:
                return false;
        }
        
        $solicitud->users()->attach(auth()->user()->id);
        $solicitud->madera_laminas()->attach($this->madera_lamina);
        $solicitud->insumos()->attach($this->insumos);
    }
}
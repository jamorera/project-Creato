<?php

namespace App\Http\Responsables;

use Illuminate\Support\Arr;

class Response 
{
    public function json($data)
    {
        $filter = Arr::except($data, ['code']); 
        return response()->json(
            $filter,$data['code']
        );
    }
}
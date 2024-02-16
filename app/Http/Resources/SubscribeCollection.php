<?php

namespace App\Http\Resources;

use App\Models\Subscribe;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SubscribeCollection extends ResourceCollection
{
    public $loadDefault = 10;
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'attributes' => [
                'total' => Subscribe::count(),
                'per_page' => 10
            ],
            'filtered' => [
                'load' => $request->load ?? $this->loadDefault,
                'q' => $request->q ?? '',
                'field' => $request->field ?? '',
                'direction' => $request->direction ?? '',
            ]
        ];
    }
}

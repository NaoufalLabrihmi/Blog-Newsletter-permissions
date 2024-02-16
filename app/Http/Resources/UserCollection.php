<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public $loadDefault = 10;
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'is_admin' => $request->user()->hasRole('admin'),

            ],
            'attributes' => [
                'total' => User::count(),
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

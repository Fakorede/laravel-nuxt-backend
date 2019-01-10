<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class User extends Resource
{
    // transform the resource into an array.
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'name' => $request->name,
            'email' => $request->email,
            'created_at' => $request->created_at
        ];
    }
}

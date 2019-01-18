<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Post extends Resource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "body" => $this->body,
            "created_at" => $this->created_at->diffForHumans(),
            "updated_at" => $this->updated_at->diffForHumans(),
            "user" => $this->user
        ];
    }
}

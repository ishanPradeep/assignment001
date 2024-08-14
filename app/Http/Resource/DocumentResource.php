<?php

namespace App\Http\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
{
    public static $wrap = 'document';
    public function toArray($request)
    {
        return [
                'id'=> $this->id,
                'name'=> $this->name,
                'email'=> $this->email,
                'phone_number'=> $this->phone_number
        ];
    }
}

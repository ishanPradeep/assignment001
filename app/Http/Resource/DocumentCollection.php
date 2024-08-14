<?php

namespace App\Http\Resource;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DocumentCollection extends ResourceCollection
{
    public static $wamp = 'document_list';

    public function toArray($request){
        return [
            'document_list' => DocumentResource::collection($this->collection)
        ];
    }
}

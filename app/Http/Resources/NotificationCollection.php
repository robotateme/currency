<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @property mixed id
 * @property mixed message
 * @property mixed type
 * @property mixed created_at
 */
class NotificationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'message' => $this->message,
            'type' => $this->type,
            'created_at' => $this->created_at->format('d-m-Y')
        ];
    }
}

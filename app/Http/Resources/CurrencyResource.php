<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed iso_code
 * @property mixed date
 * @property mixed rate
 * @property mixed created_at
 * @property mixed updated_at
 */
class CurrencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'iso_code' => $this->iso_code,
            'date' => $this->date,
            'rate' => $this->rate,
        ];
    }
}

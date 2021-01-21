<?php


namespace App\Models\Dto;


use App\Models\Dto\Contracts\AbstractDataTransferObject;
use Carbon\Carbon;

class CurrencyDto extends AbstractDataTransferObject
{

    /**
     * @var string
     */
    public $rate;
    /**
     * @var string
     */
    public $iso_code;

    /**
     * @var string
     */
    public $date;

    /**
     * @param array $params
     * @return CurrencyDto
     */
    public static function fromCbr(array $params)
    {
        return new self([
            'rate' => $params['Value'],
            'iso_code' => $params['CharCode'],
            'date' => $params['Date'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

}


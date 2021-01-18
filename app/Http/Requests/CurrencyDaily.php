<?php

namespace App\Http\Requests;

use App\Http\Requests\Contracts\AbstractRequest;

class CurrencyDaily extends AbstractRequest
{
    public $routeParametersToValidate = ['date' => 'date'];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date_format:d-m-Y'
        ];
    }
}

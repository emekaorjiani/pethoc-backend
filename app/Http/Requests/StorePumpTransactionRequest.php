<?php

namespace App\Http\Requests;

use App\Models\PumpTransaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePumpTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pump_transaction_create');
    }

    public function rules()
    {
        return [
            'station_id' => [
                'required',
                'integer',
            ],
            'amount_received' => [
                'required',
            ],
            'transaction_reference' => [
                'string',
                'required',
            ],
        ];
    }
}

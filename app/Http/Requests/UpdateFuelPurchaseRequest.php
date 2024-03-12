<?php

namespace App\Http\Requests;

use App\Models\FuelPurchase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFuelPurchaseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fuel_purchase_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'product_id' => [
                'required',
                'integer',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'payment_method' => [
                'string',
                'required',
            ],
            'transaction_reference' => [
                'string',
                'nullable',
            ],
        ];
    }
}

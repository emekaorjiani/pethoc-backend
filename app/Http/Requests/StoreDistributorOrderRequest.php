<?php

namespace App\Http\Requests;

use App\Models\DistributorOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDistributorOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('distributor_order_create');
    }

    public function rules()
    {
        return [
            'distributor_id' => [
                'required',
                'integer',
            ],
            'order_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}

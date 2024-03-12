<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_create');
    }

    public function rules()
    {
        return [
            'pickup_area' => [
                'string',
                'nullable',
            ],
            'delivery_phone' => [
                'string',
                'required',
            ],
            'delivery_location' => [
                'string',
                'required',
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
            'status' => [
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'product_id' => [
                'required',
                'integer',
            ],
            'total_cost' => [
                'required',
            ],
        ];
    }
}

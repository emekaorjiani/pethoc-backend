<?php

namespace App\Http\Requests;

use App\Models\DistributorOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDistributorOrderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('distributor_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:distributor_orders,id',
        ];
    }
}

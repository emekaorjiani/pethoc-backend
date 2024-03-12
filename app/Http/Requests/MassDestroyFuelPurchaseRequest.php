<?php

namespace App\Http\Requests;

use App\Models\FuelPurchase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFuelPurchaseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('fuel_purchase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:fuel_purchases,id',
        ];
    }
}

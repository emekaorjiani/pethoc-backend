<?php

namespace App\Http\Requests;

use App\Models\PumpTransaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPumpTransactionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pump_transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pump_transactions,id',
        ];
    }
}

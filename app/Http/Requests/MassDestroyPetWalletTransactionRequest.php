<?php

namespace App\Http\Requests;

use App\Models\PetWalletTransaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPetWalletTransactionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pet_wallet_transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pet_wallet_transactions,id',
        ];
    }
}

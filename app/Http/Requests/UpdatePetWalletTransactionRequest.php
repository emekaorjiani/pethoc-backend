<?php

namespace App\Http\Requests;

use App\Models\PetWalletTransaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePetWalletTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pet_wallet_transaction_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'required',
            ],
            'transaction_type' => [
                'string',
                'nullable',
            ],
            'status' => [
                'string',
                'required',
            ],
        ];
    }
}

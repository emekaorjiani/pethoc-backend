<?php

namespace App\Http\Requests;

use App\Models\PetWalletTransaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePetWalletTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pet_wallet_transaction_create');
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

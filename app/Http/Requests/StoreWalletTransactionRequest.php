<?php

namespace App\Http\Requests;

use App\Models\WalletTransaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreWalletTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('wallet_transaction_create');
    }

    public function rules()
    {
        return [
            'amount' => [
                'required',
            ],
            'payment_method' => [
                'string',
                'required',
            ],
            'transaction_type' => [
                'string',
                'required',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}

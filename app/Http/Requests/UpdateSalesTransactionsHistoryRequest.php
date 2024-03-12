<?php

namespace App\Http\Requests;

use App\Models\SalesTransactionsHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalesTransactionsHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sales_transactions_history_edit');
    }

    public function rules()
    {
        return [
            'station_id' => [
                'required',
                'integer',
            ],
            'product_id' => [
                'required',
                'integer',
            ],
            'quantity' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'amount' => [
                'required',
            ],
            'transaction_reference' => [
                'string',
                'required',
            ],
        ];
    }
}

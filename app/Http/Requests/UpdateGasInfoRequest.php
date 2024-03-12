<?php

namespace App\Http\Requests;

use App\Models\GasInfo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGasInfoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gas_info_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'gas_level' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'low_level_notification_enabled' => [
                'string',
                'required',
            ],
            'auto_refill_enabled' => [
                'string',
                'required',
            ],
        ];
    }
}

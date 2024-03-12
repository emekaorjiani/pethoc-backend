<?php

namespace App\Http\Requests;

use App\Models\StationManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStationManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('station_management_edit');
    }

    public function rules()
    {
        return [
            'number_of_pumps' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'product_types' => [
                'string',
                'required',
            ],
            'prices' => [
                'string',
                'required',
            ],
        ];
    }
}

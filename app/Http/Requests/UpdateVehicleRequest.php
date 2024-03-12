<?php

namespace App\Http\Requests;

use App\Models\Vehicle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVehicleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'type' => [
                'string',
                'nullable',
            ],
            'plate_number' => [
                'string',
                'required',
            ],
            'is_avaliable' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'current_location' => [
                'string',
                'nullable',
            ],
        ];
    }
}

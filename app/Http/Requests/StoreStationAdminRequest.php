<?php

namespace App\Http\Requests;

use App\Models\StationAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStationAdminRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('station_admin_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}

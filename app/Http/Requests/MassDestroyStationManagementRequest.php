<?php

namespace App\Http\Requests;

use App\Models\StationManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStationManagementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('station_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:station_managements,id',
        ];
    }
}

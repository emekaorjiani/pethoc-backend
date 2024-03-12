<?php

namespace App\Http\Requests;

use App\Models\StationAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStationAdminRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('station_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:station_admins,id',
        ];
    }
}

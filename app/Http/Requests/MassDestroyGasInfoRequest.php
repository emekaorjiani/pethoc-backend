<?php

namespace App\Http\Requests;

use App\Models\GasInfo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGasInfoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('gas_info_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:gas_infos,id',
        ];
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyGasInfoRequest;
use App\Http\Requests\StoreGasInfoRequest;
use App\Http\Requests\UpdateGasInfoRequest;
use App\Models\GasInfo;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GasInfoController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('gas_info_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gasInfos = GasInfo::with(['user'])->get();

        return view('frontend.gasInfos.index', compact('gasInfos'));
    }

    public function create()
    {
        abort_if(Gate::denies('gas_info_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.gasInfos.create', compact('users'));
    }

    public function store(StoreGasInfoRequest $request)
    {
        $gasInfo = GasInfo::create($request->all());

        return redirect()->route('frontend.gas-infos.index');
    }

    public function edit(GasInfo $gasInfo)
    {
        abort_if(Gate::denies('gas_info_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gasInfo->load('user');

        return view('frontend.gasInfos.edit', compact('gasInfo', 'users'));
    }

    public function update(UpdateGasInfoRequest $request, GasInfo $gasInfo)
    {
        $gasInfo->update($request->all());

        return redirect()->route('frontend.gas-infos.index');
    }

    public function show(GasInfo $gasInfo)
    {
        abort_if(Gate::denies('gas_info_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gasInfo->load('user');

        return view('frontend.gasInfos.show', compact('gasInfo'));
    }

    public function destroy(GasInfo $gasInfo)
    {
        abort_if(Gate::denies('gas_info_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gasInfo->delete();

        return back();
    }

    public function massDestroy(MassDestroyGasInfoRequest $request)
    {
        $gasInfos = GasInfo::find(request('ids'));

        foreach ($gasInfos as $gasInfo) {
            $gasInfo->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

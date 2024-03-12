<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGasInfoRequest;
use App\Http\Requests\UpdateGasInfoRequest;
use App\Http\Resources\Admin\GasInfoResource;
use App\Models\GasInfo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GasInfoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gas_info_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GasInfoResource(GasInfo::with(['user'])->get());
    }

    public function store(StoreGasInfoRequest $request)
    {
        $gasInfo = GasInfo::create($request->all());

        return (new GasInfoResource($gasInfo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GasInfo $gasInfo)
    {
        abort_if(Gate::denies('gas_info_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GasInfoResource($gasInfo->load(['user']));
    }

    public function update(UpdateGasInfoRequest $request, GasInfo $gasInfo)
    {
        $gasInfo->update($request->all());

        return (new GasInfoResource($gasInfo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GasInfo $gasInfo)
    {
        abort_if(Gate::denies('gas_info_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gasInfo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

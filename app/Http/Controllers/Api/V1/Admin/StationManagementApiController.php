<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStationManagementRequest;
use App\Http\Requests\UpdateStationManagementRequest;
use App\Http\Resources\Admin\StationManagementResource;
use App\Models\StationManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StationManagementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('station_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StationManagementResource(StationManagement::all());
    }

    public function store(StoreStationManagementRequest $request)
    {
        $stationManagement = StationManagement::create($request->all());

        return (new StationManagementResource($stationManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StationManagement $stationManagement)
    {
        abort_if(Gate::denies('station_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StationManagementResource($stationManagement);
    }

    public function update(UpdateStationManagementRequest $request, StationManagement $stationManagement)
    {
        $stationManagement->update($request->all());

        return (new StationManagementResource($stationManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StationManagement $stationManagement)
    {
        abort_if(Gate::denies('station_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stationManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

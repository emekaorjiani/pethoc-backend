<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStationAdminRequest;
use App\Http\Requests\UpdateStationAdminRequest;
use App\Http\Resources\Admin\StationAdminResource;
use App\Models\StationAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StationAdminApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('station_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StationAdminResource(StationAdmin::with(['user', 'station'])->get());
    }

    public function store(StoreStationAdminRequest $request)
    {
        $stationAdmin = StationAdmin::create($request->all());

        return (new StationAdminResource($stationAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StationAdmin $stationAdmin)
    {
        abort_if(Gate::denies('station_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StationAdminResource($stationAdmin->load(['user', 'station']));
    }

    public function update(UpdateStationAdminRequest $request, StationAdmin $stationAdmin)
    {
        $stationAdmin->update($request->all());

        return (new StationAdminResource($stationAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StationAdmin $stationAdmin)
    {
        abort_if(Gate::denies('station_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stationAdmin->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

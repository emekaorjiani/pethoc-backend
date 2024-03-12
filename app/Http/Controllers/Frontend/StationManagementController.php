<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyStationManagementRequest;
use App\Http\Requests\StoreStationManagementRequest;
use App\Http\Requests\UpdateStationManagementRequest;
use App\Models\StationManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StationManagementController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('station_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stationManagements = StationManagement::all();

        return view('frontend.stationManagements.index', compact('stationManagements'));
    }

    public function create()
    {
        abort_if(Gate::denies('station_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.stationManagements.create');
    }

    public function store(StoreStationManagementRequest $request)
    {
        $stationManagement = StationManagement::create($request->all());

        return redirect()->route('frontend.station-managements.index');
    }

    public function edit(StationManagement $stationManagement)
    {
        abort_if(Gate::denies('station_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.stationManagements.edit', compact('stationManagement'));
    }

    public function update(UpdateStationManagementRequest $request, StationManagement $stationManagement)
    {
        $stationManagement->update($request->all());

        return redirect()->route('frontend.station-managements.index');
    }

    public function show(StationManagement $stationManagement)
    {
        abort_if(Gate::denies('station_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.stationManagements.show', compact('stationManagement'));
    }

    public function destroy(StationManagement $stationManagement)
    {
        abort_if(Gate::denies('station_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stationManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyStationManagementRequest $request)
    {
        $stationManagements = StationManagement::find(request('ids'));

        foreach ($stationManagements as $stationManagement) {
            $stationManagement->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyStationAdminRequest;
use App\Http\Requests\StoreStationAdminRequest;
use App\Http\Requests\UpdateStationAdminRequest;
use App\Models\StationAdmin;
use App\Models\StationManagement;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StationAdminController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('station_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stationAdmins = StationAdmin::with(['user', 'station'])->get();

        return view('frontend.stationAdmins.index', compact('stationAdmins'));
    }

    public function create()
    {
        abort_if(Gate::denies('station_admin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stations = StationManagement::pluck('number_of_pumps', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.stationAdmins.create', compact('stations', 'users'));
    }

    public function store(StoreStationAdminRequest $request)
    {
        $stationAdmin = StationAdmin::create($request->all());

        return redirect()->route('frontend.station-admins.index');
    }

    public function edit(StationAdmin $stationAdmin)
    {
        abort_if(Gate::denies('station_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stations = StationManagement::pluck('number_of_pumps', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stationAdmin->load('user', 'station');

        return view('frontend.stationAdmins.edit', compact('stationAdmin', 'stations', 'users'));
    }

    public function update(UpdateStationAdminRequest $request, StationAdmin $stationAdmin)
    {
        $stationAdmin->update($request->all());

        return redirect()->route('frontend.station-admins.index');
    }

    public function show(StationAdmin $stationAdmin)
    {
        abort_if(Gate::denies('station_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stationAdmin->load('user', 'station');

        return view('frontend.stationAdmins.show', compact('stationAdmin'));
    }

    public function destroy(StationAdmin $stationAdmin)
    {
        abort_if(Gate::denies('station_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stationAdmin->delete();

        return back();
    }

    public function massDestroy(MassDestroyStationAdminRequest $request)
    {
        $stationAdmins = StationAdmin::find(request('ids'));

        foreach ($stationAdmins as $stationAdmin) {
            $stationAdmin->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

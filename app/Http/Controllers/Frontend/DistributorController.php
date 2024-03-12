<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDistributorRequest;
use App\Http\Requests\StoreDistributorRequest;
use App\Http\Requests\UpdateDistributorRequest;
use App\Models\Distributor;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DistributorController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('distributor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $distributors = Distributor::with(['user'])->get();

        return view('frontend.distributors.index', compact('distributors'));
    }

    public function create()
    {
        abort_if(Gate::denies('distributor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.distributors.create', compact('users'));
    }

    public function store(StoreDistributorRequest $request)
    {
        $distributor = Distributor::create($request->all());

        return redirect()->route('frontend.distributors.index');
    }

    public function edit(Distributor $distributor)
    {
        abort_if(Gate::denies('distributor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $distributor->load('user');

        return view('frontend.distributors.edit', compact('distributor', 'users'));
    }

    public function update(UpdateDistributorRequest $request, Distributor $distributor)
    {
        $distributor->update($request->all());

        return redirect()->route('frontend.distributors.index');
    }

    public function show(Distributor $distributor)
    {
        abort_if(Gate::denies('distributor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $distributor->load('user');

        return view('frontend.distributors.show', compact('distributor'));
    }

    public function destroy(Distributor $distributor)
    {
        abort_if(Gate::denies('distributor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $distributor->delete();

        return back();
    }

    public function massDestroy(MassDestroyDistributorRequest $request)
    {
        $distributors = Distributor::find(request('ids'));

        foreach ($distributors as $distributor) {
            $distributor->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDistributorRequest;
use App\Http\Requests\UpdateDistributorRequest;
use App\Http\Resources\Admin\DistributorResource;
use App\Models\Distributor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DistributorApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('distributor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DistributorResource(Distributor::with(['user'])->get());
    }

    public function store(StoreDistributorRequest $request)
    {
        $distributor = Distributor::create($request->all());

        return (new DistributorResource($distributor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Distributor $distributor)
    {
        abort_if(Gate::denies('distributor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DistributorResource($distributor->load(['user']));
    }

    public function update(UpdateDistributorRequest $request, Distributor $distributor)
    {
        $distributor->update($request->all());

        return (new DistributorResource($distributor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Distributor $distributor)
    {
        abort_if(Gate::denies('distributor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $distributor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

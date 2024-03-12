<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFuelPurchaseRequest;
use App\Http\Requests\UpdateFuelPurchaseRequest;
use App\Http\Resources\Admin\FuelPurchaseResource;
use App\Models\FuelPurchase;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FuelPurchaseApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fuel_purchase_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FuelPurchaseResource(FuelPurchase::with(['user', 'product', 'created_by'])->get());
    }

    public function store(StoreFuelPurchaseRequest $request)
    {
        $fuelPurchase = FuelPurchase::create($request->all());

        return (new FuelPurchaseResource($fuelPurchase))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FuelPurchase $fuelPurchase)
    {
        abort_if(Gate::denies('fuel_purchase_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FuelPurchaseResource($fuelPurchase->load(['user', 'product', 'created_by']));
    }

    public function update(UpdateFuelPurchaseRequest $request, FuelPurchase $fuelPurchase)
    {
        $fuelPurchase->update($request->all());

        return (new FuelPurchaseResource($fuelPurchase))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FuelPurchase $fuelPurchase)
    {
        abort_if(Gate::denies('fuel_purchase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fuelPurchase->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

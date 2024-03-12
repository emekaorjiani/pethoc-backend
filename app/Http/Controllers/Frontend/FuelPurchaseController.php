<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyFuelPurchaseRequest;
use App\Http\Requests\StoreFuelPurchaseRequest;
use App\Http\Requests\UpdateFuelPurchaseRequest;
use App\Models\FuelPurchase;
use App\Models\Product;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FuelPurchaseController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('fuel_purchase_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fuelPurchases = FuelPurchase::with(['user', 'product', 'created_by'])->get();

        return view('frontend.fuelPurchases.index', compact('fuelPurchases'));
    }

    public function create()
    {
        abort_if(Gate::denies('fuel_purchase_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.fuelPurchases.create', compact('products', 'users'));
    }

    public function store(StoreFuelPurchaseRequest $request)
    {
        $fuelPurchase = FuelPurchase::create($request->all());

        return redirect()->route('frontend.fuel-purchases.index');
    }

    public function edit(FuelPurchase $fuelPurchase)
    {
        abort_if(Gate::denies('fuel_purchase_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fuelPurchase->load('user', 'product', 'created_by');

        return view('frontend.fuelPurchases.edit', compact('fuelPurchase', 'products', 'users'));
    }

    public function update(UpdateFuelPurchaseRequest $request, FuelPurchase $fuelPurchase)
    {
        $fuelPurchase->update($request->all());

        return redirect()->route('frontend.fuel-purchases.index');
    }

    public function show(FuelPurchase $fuelPurchase)
    {
        abort_if(Gate::denies('fuel_purchase_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fuelPurchase->load('user', 'product', 'created_by');

        return view('frontend.fuelPurchases.show', compact('fuelPurchase'));
    }

    public function destroy(FuelPurchase $fuelPurchase)
    {
        abort_if(Gate::denies('fuel_purchase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fuelPurchase->delete();

        return back();
    }

    public function massDestroy(MassDestroyFuelPurchaseRequest $request)
    {
        $fuelPurchases = FuelPurchase::find(request('ids'));

        foreach ($fuelPurchases as $fuelPurchase) {
            $fuelPurchase->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

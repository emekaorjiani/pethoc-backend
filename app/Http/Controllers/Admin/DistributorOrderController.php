<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDistributorOrderRequest;
use App\Http\Requests\StoreDistributorOrderRequest;
use App\Http\Requests\UpdateDistributorOrderRequest;
use App\Models\Distributor;
use App\Models\DistributorOrder;
use App\Models\Order;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DistributorOrderController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('distributor_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $distributorOrders = DistributorOrder::with(['distributor', 'order', 'created_by'])->get();

        return view('admin.distributorOrders.index', compact('distributorOrders'));
    }

    public function create()
    {
        abort_if(Gate::denies('distributor_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $distributors = Distributor::pluck('profile_info', 'id')->prepend(trans('global.pleaseSelect'), '');

        $orders = Order::pluck('pickup_area', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.distributorOrders.create', compact('distributors', 'orders'));
    }

    public function store(StoreDistributorOrderRequest $request)
    {
        $distributorOrder = DistributorOrder::create($request->all());

        return redirect()->route('admin.distributor-orders.index');
    }

    public function edit(DistributorOrder $distributorOrder)
    {
        abort_if(Gate::denies('distributor_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $distributors = Distributor::pluck('profile_info', 'id')->prepend(trans('global.pleaseSelect'), '');

        $orders = Order::pluck('pickup_area', 'id')->prepend(trans('global.pleaseSelect'), '');

        $distributorOrder->load('distributor', 'order', 'created_by');

        return view('admin.distributorOrders.edit', compact('distributorOrder', 'distributors', 'orders'));
    }

    public function update(UpdateDistributorOrderRequest $request, DistributorOrder $distributorOrder)
    {
        $distributorOrder->update($request->all());

        return redirect()->route('admin.distributor-orders.index');
    }

    public function show(DistributorOrder $distributorOrder)
    {
        abort_if(Gate::denies('distributor_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $distributorOrder->load('distributor', 'order', 'created_by');

        return view('admin.distributorOrders.show', compact('distributorOrder'));
    }

    public function destroy(DistributorOrder $distributorOrder)
    {
        abort_if(Gate::denies('distributor_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $distributorOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroyDistributorOrderRequest $request)
    {
        $distributorOrders = DistributorOrder::find(request('ids'));

        foreach ($distributorOrders as $distributorOrder) {
            $distributorOrder->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

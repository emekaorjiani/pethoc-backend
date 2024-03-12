<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyOrderTrackingRequest;
use App\Http\Requests\StoreOrderTrackingRequest;
use App\Http\Requests\UpdateOrderTrackingRequest;
use App\Models\Order;
use App\Models\OrderTracking;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderTrackingController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('order_tracking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderTrackings = OrderTracking::with(['order'])->get();

        return view('frontend.orderTrackings.index', compact('orderTrackings'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_tracking_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('pickup_area', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.orderTrackings.create', compact('orders'));
    }

    public function store(StoreOrderTrackingRequest $request)
    {
        $orderTracking = OrderTracking::create($request->all());

        return redirect()->route('frontend.order-trackings.index');
    }

    public function edit(OrderTracking $orderTracking)
    {
        abort_if(Gate::denies('order_tracking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('pickup_area', 'id')->prepend(trans('global.pleaseSelect'), '');

        $orderTracking->load('order');

        return view('frontend.orderTrackings.edit', compact('orderTracking', 'orders'));
    }

    public function update(UpdateOrderTrackingRequest $request, OrderTracking $orderTracking)
    {
        $orderTracking->update($request->all());

        return redirect()->route('frontend.order-trackings.index');
    }

    public function show(OrderTracking $orderTracking)
    {
        abort_if(Gate::denies('order_tracking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderTracking->load('order');

        return view('frontend.orderTrackings.show', compact('orderTracking'));
    }

    public function destroy(OrderTracking $orderTracking)
    {
        abort_if(Gate::denies('order_tracking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderTracking->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderTrackingRequest $request)
    {
        $orderTrackings = OrderTracking::find(request('ids'));

        foreach ($orderTrackings as $orderTracking) {
            $orderTracking->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderTrackingRequest;
use App\Http\Requests\UpdateOrderTrackingRequest;
use App\Http\Resources\Admin\OrderTrackingResource;
use App\Models\OrderTracking;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderTrackingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_tracking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderTrackingResource(OrderTracking::with(['order'])->get());
    }

    public function store(StoreOrderTrackingRequest $request)
    {
        $orderTracking = OrderTracking::create($request->all());

        return (new OrderTrackingResource($orderTracking))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OrderTracking $orderTracking)
    {
        abort_if(Gate::denies('order_tracking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderTrackingResource($orderTracking->load(['order']));
    }

    public function update(UpdateOrderTrackingRequest $request, OrderTracking $orderTracking)
    {
        $orderTracking->update($request->all());

        return (new OrderTrackingResource($orderTracking))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OrderTracking $orderTracking)
    {
        abort_if(Gate::denies('order_tracking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderTracking->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

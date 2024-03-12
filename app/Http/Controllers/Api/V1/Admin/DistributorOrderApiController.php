<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDistributorOrderRequest;
use App\Http\Requests\UpdateDistributorOrderRequest;
use App\Http\Resources\Admin\DistributorOrderResource;
use App\Models\DistributorOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DistributorOrderApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('distributor_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DistributorOrderResource(DistributorOrder::with(['distributor', 'order', 'created_by'])->get());
    }

    public function store(StoreDistributorOrderRequest $request)
    {
        $distributorOrder = DistributorOrder::create($request->all());

        return (new DistributorOrderResource($distributorOrder))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DistributorOrder $distributorOrder)
    {
        abort_if(Gate::denies('distributor_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DistributorOrderResource($distributorOrder->load(['distributor', 'order', 'created_by']));
    }

    public function update(UpdateDistributorOrderRequest $request, DistributorOrder $distributorOrder)
    {
        $distributorOrder->update($request->all());

        return (new DistributorOrderResource($distributorOrder))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DistributorOrder $distributorOrder)
    {
        abort_if(Gate::denies('distributor_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $distributorOrder->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

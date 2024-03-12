<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalesTransactionsHistoryRequest;
use App\Http\Requests\UpdateSalesTransactionsHistoryRequest;
use App\Http\Resources\Admin\SalesTransactionsHistoryResource;
use App\Models\SalesTransactionsHistory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalesTransactionsHistoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sales_transactions_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalesTransactionsHistoryResource(SalesTransactionsHistory::with(['station', 'product'])->get());
    }

    public function store(StoreSalesTransactionsHistoryRequest $request)
    {
        $salesTransactionsHistory = SalesTransactionsHistory::create($request->all());

        return (new SalesTransactionsHistoryResource($salesTransactionsHistory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SalesTransactionsHistory $salesTransactionsHistory)
    {
        abort_if(Gate::denies('sales_transactions_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalesTransactionsHistoryResource($salesTransactionsHistory->load(['station', 'product']));
    }

    public function update(UpdateSalesTransactionsHistoryRequest $request, SalesTransactionsHistory $salesTransactionsHistory)
    {
        $salesTransactionsHistory->update($request->all());

        return (new SalesTransactionsHistoryResource($salesTransactionsHistory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SalesTransactionsHistory $salesTransactionsHistory)
    {
        abort_if(Gate::denies('sales_transactions_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesTransactionsHistory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

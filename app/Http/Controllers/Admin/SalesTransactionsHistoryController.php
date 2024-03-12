<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySalesTransactionsHistoryRequest;
use App\Http\Requests\StoreSalesTransactionsHistoryRequest;
use App\Http\Requests\UpdateSalesTransactionsHistoryRequest;
use App\Models\Product;
use App\Models\SalesTransactionsHistory;
use App\Models\Station;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalesTransactionsHistoryController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('sales_transactions_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesTransactionsHistories = SalesTransactionsHistory::with(['station', 'product'])->get();

        return view('admin.salesTransactionsHistories.index', compact('salesTransactionsHistories'));
    }

    public function create()
    {
        abort_if(Gate::denies('sales_transactions_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stations = Station::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.salesTransactionsHistories.create', compact('products', 'stations'));
    }

    public function store(StoreSalesTransactionsHistoryRequest $request)
    {
        $salesTransactionsHistory = SalesTransactionsHistory::create($request->all());

        return redirect()->route('admin.sales-transactions-histories.index');
    }

    public function edit(SalesTransactionsHistory $salesTransactionsHistory)
    {
        abort_if(Gate::denies('sales_transactions_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stations = Station::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salesTransactionsHistory->load('station', 'product');

        return view('admin.salesTransactionsHistories.edit', compact('products', 'salesTransactionsHistory', 'stations'));
    }

    public function update(UpdateSalesTransactionsHistoryRequest $request, SalesTransactionsHistory $salesTransactionsHistory)
    {
        $salesTransactionsHistory->update($request->all());

        return redirect()->route('admin.sales-transactions-histories.index');
    }

    public function show(SalesTransactionsHistory $salesTransactionsHistory)
    {
        abort_if(Gate::denies('sales_transactions_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesTransactionsHistory->load('station', 'product');

        return view('admin.salesTransactionsHistories.show', compact('salesTransactionsHistory'));
    }

    public function destroy(SalesTransactionsHistory $salesTransactionsHistory)
    {
        abort_if(Gate::denies('sales_transactions_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesTransactionsHistory->delete();

        return back();
    }

    public function massDestroy(MassDestroySalesTransactionsHistoryRequest $request)
    {
        $salesTransactionsHistories = SalesTransactionsHistory::find(request('ids'));

        foreach ($salesTransactionsHistories as $salesTransactionsHistory) {
            $salesTransactionsHistory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

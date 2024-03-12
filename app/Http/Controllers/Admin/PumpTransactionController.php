<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPumpTransactionRequest;
use App\Http\Requests\StorePumpTransactionRequest;
use App\Http\Requests\UpdatePumpTransactionRequest;
use App\Models\PumpTransaction;
use App\Models\Station;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PumpTransactionController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('pump_transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pumpTransactions = PumpTransaction::with(['station'])->get();

        return view('admin.pumpTransactions.index', compact('pumpTransactions'));
    }

    public function create()
    {
        abort_if(Gate::denies('pump_transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stations = Station::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pumpTransactions.create', compact('stations'));
    }

    public function store(StorePumpTransactionRequest $request)
    {
        $pumpTransaction = PumpTransaction::create($request->all());

        return redirect()->route('admin.pump-transactions.index');
    }

    public function edit(PumpTransaction $pumpTransaction)
    {
        abort_if(Gate::denies('pump_transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stations = Station::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pumpTransaction->load('station');

        return view('admin.pumpTransactions.edit', compact('pumpTransaction', 'stations'));
    }

    public function update(UpdatePumpTransactionRequest $request, PumpTransaction $pumpTransaction)
    {
        $pumpTransaction->update($request->all());

        return redirect()->route('admin.pump-transactions.index');
    }

    public function show(PumpTransaction $pumpTransaction)
    {
        abort_if(Gate::denies('pump_transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pumpTransaction->load('station');

        return view('admin.pumpTransactions.show', compact('pumpTransaction'));
    }

    public function destroy(PumpTransaction $pumpTransaction)
    {
        abort_if(Gate::denies('pump_transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pumpTransaction->delete();

        return back();
    }

    public function massDestroy(MassDestroyPumpTransactionRequest $request)
    {
        $pumpTransactions = PumpTransaction::find(request('ids'));

        foreach ($pumpTransactions as $pumpTransaction) {
            $pumpTransaction->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

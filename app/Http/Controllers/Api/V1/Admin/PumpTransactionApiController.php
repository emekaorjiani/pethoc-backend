<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePumpTransactionRequest;
use App\Http\Requests\UpdatePumpTransactionRequest;
use App\Http\Resources\Admin\PumpTransactionResource;
use App\Models\PumpTransaction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PumpTransactionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pump_transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PumpTransactionResource(PumpTransaction::with(['station'])->get());
    }

    public function store(StorePumpTransactionRequest $request)
    {
        $pumpTransaction = PumpTransaction::create($request->all());

        return (new PumpTransactionResource($pumpTransaction))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PumpTransaction $pumpTransaction)
    {
        abort_if(Gate::denies('pump_transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PumpTransactionResource($pumpTransaction->load(['station']));
    }

    public function update(UpdatePumpTransactionRequest $request, PumpTransaction $pumpTransaction)
    {
        $pumpTransaction->update($request->all());

        return (new PumpTransactionResource($pumpTransaction))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PumpTransaction $pumpTransaction)
    {
        abort_if(Gate::denies('pump_transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pumpTransaction->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

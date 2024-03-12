<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWalletTransactionRequest;
use App\Http\Requests\UpdateWalletTransactionRequest;
use App\Http\Resources\Admin\WalletTransactionResource;
use App\Models\WalletTransaction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WalletTransactionsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('wallet_transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WalletTransactionResource(WalletTransaction::with(['user', 'created_by'])->get());
    }

    public function store(StoreWalletTransactionRequest $request)
    {
        $walletTransaction = WalletTransaction::create($request->all());

        return (new WalletTransactionResource($walletTransaction))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(WalletTransaction $walletTransaction)
    {
        abort_if(Gate::denies('wallet_transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WalletTransactionResource($walletTransaction->load(['user', 'created_by']));
    }

    public function update(UpdateWalletTransactionRequest $request, WalletTransaction $walletTransaction)
    {
        $walletTransaction->update($request->all());

        return (new WalletTransactionResource($walletTransaction))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(WalletTransaction $walletTransaction)
    {
        abort_if(Gate::denies('wallet_transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $walletTransaction->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

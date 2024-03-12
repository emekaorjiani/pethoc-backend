<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyWalletTransactionRequest;
use App\Http\Requests\StoreWalletTransactionRequest;
use App\Http\Requests\UpdateWalletTransactionRequest;
use App\Models\User;
use App\Models\WalletTransaction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WalletTransactionsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('wallet_transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $walletTransactions = WalletTransaction::with(['user', 'created_by'])->get();

        return view('frontend.walletTransactions.index', compact('walletTransactions'));
    }

    public function create()
    {
        abort_if(Gate::denies('wallet_transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.walletTransactions.create');
    }

    public function store(StoreWalletTransactionRequest $request)
    {
        $walletTransaction = WalletTransaction::create($request->all());

        return redirect()->route('frontend.wallet-transactions.index');
    }

    public function edit(WalletTransaction $walletTransaction)
    {
        abort_if(Gate::denies('wallet_transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $walletTransaction->load('user', 'created_by');

        return view('frontend.walletTransactions.edit', compact('users', 'walletTransaction'));
    }

    public function update(UpdateWalletTransactionRequest $request, WalletTransaction $walletTransaction)
    {
        $walletTransaction->update($request->all());

        return redirect()->route('frontend.wallet-transactions.index');
    }

    public function show(WalletTransaction $walletTransaction)
    {
        abort_if(Gate::denies('wallet_transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $walletTransaction->load('user', 'created_by');

        return view('frontend.walletTransactions.show', compact('walletTransaction'));
    }

    public function destroy(WalletTransaction $walletTransaction)
    {
        abort_if(Gate::denies('wallet_transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $walletTransaction->delete();

        return back();
    }

    public function massDestroy(MassDestroyWalletTransactionRequest $request)
    {
        $walletTransactions = WalletTransaction::find(request('ids'));

        foreach ($walletTransactions as $walletTransaction) {
            $walletTransaction->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

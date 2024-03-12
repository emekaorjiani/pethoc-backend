<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPetWalletTransactionRequest;
use App\Http\Requests\StorePetWalletTransactionRequest;
use App\Http\Requests\UpdatePetWalletTransactionRequest;
use App\Models\PetWalletTransaction;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PetWalletTransactionController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('pet_wallet_transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petWalletTransactions = PetWalletTransaction::with(['user', 'created_by'])->get();

        return view('frontend.petWalletTransactions.index', compact('petWalletTransactions'));
    }

    public function create()
    {
        abort_if(Gate::denies('pet_wallet_transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.petWalletTransactions.create', compact('users'));
    }

    public function store(StorePetWalletTransactionRequest $request)
    {
        $petWalletTransaction = PetWalletTransaction::create($request->all());

        return redirect()->route('frontend.pet-wallet-transactions.index');
    }

    public function edit(PetWalletTransaction $petWalletTransaction)
    {
        abort_if(Gate::denies('pet_wallet_transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $petWalletTransaction->load('user', 'created_by');

        return view('frontend.petWalletTransactions.edit', compact('petWalletTransaction', 'users'));
    }

    public function update(UpdatePetWalletTransactionRequest $request, PetWalletTransaction $petWalletTransaction)
    {
        $petWalletTransaction->update($request->all());

        return redirect()->route('frontend.pet-wallet-transactions.index');
    }

    public function show(PetWalletTransaction $petWalletTransaction)
    {
        abort_if(Gate::denies('pet_wallet_transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petWalletTransaction->load('user', 'created_by');

        return view('frontend.petWalletTransactions.show', compact('petWalletTransaction'));
    }

    public function destroy(PetWalletTransaction $petWalletTransaction)
    {
        abort_if(Gate::denies('pet_wallet_transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petWalletTransaction->delete();

        return back();
    }

    public function massDestroy(MassDestroyPetWalletTransactionRequest $request)
    {
        $petWalletTransactions = PetWalletTransaction::find(request('ids'));

        foreach ($petWalletTransactions as $petWalletTransaction) {
            $petWalletTransaction->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

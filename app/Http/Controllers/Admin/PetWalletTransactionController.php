<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPetWalletTransactionRequest;
use App\Http\Requests\StorePetWalletTransactionRequest;
use App\Http\Requests\UpdatePetWalletTransactionRequest;
use App\Models\PetWallet;
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

        $petWallets = PetWallet::with(['user', 'created_by'])->get();

        return view('admin.petWalletTransactions.index', compact('petWallets'));
    }

    public function create()
    {
        abort_if(Gate::denies('pet_wallet_transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.petWalletTransactions.create', compact('users'));
    }

    public function store(StorePetWalletTransactionRequest $request)
    {
        $petWallet = PetWallet::create($request->all());

        return redirect()->route('admin.pet-wallet-transactions.index');
    }

    public function edit(PetWallet $petWallet)
    {
        abort_if(Gate::denies('pet_wallet_transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $petWallet->load('user', 'created_by');

        return view('admin.petWalletTransactions.edit', compact('petWallet', 'users'));
    }

    public function update(UpdatePetWalletTransactionRequest $request, PetWallet $petWallet)
    {
        $petWallet->update($request->all());

        return redirect()->route('admin.pet-wallet-transactions.index');
    }

    public function show(PetWallet $petWallet)
    {
        abort_if(Gate::denies('pet_wallet_transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petWallet->load('user', 'created_by');

        return view('admin.petWalletTransactions.show', compact('petWallet'));
    }

    public function destroy(PetWallet $petWallet)
    {
        abort_if(Gate::denies('pet_wallet_transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petWallet->delete();

        return back();
    }

    public function massDestroy(MassDestroyPetWalletTransactionRequest $request)
    {
        $petWallets = PetWallet::find(request('ids'));

        foreach ($petWallets as $petWallet) {
            $petWallet->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

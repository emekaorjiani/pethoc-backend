<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPetWalletTransactionRequest;
use App\Http\Requests\StorePetWalletTransactionRequest;
use App\Http\Requests\UpdatePetWalletTransactionRequest;
use App\Models\Deposit;
use App\Models\PetWallet;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PetWalletTransactionController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('pet_wallet_transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = Auth::user();
        $petWalletTransactions = Deposit::where('user_id', $user->id)->get();

        return view('frontend.petWalletTransactions.index', compact('petWalletTransactions'));
    }

    public function show(Deposit $petWalletTransaction)
    {
        abort_if(Gate::denies('pet_wallet_transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.petWalletTransactions.show', compact('petWalletTransaction'));
    }

}

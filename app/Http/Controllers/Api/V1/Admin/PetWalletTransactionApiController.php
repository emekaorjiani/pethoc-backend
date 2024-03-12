<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePetWalletTransactionRequest;
use App\Http\Requests\UpdatePetWalletTransactionRequest;
use App\Http\Resources\Admin\PetWalletTransactionResource;
use App\Models\PetWalletTransaction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PetWalletTransactionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pet_wallet_transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PetWalletTransactionResource(PetWalletTransaction::with(['user', 'created_by'])->get());
    }

    public function store(StorePetWalletTransactionRequest $request)
    {
        $petWalletTransaction = PetWalletTransaction::create($request->all());

        return (new PetWalletTransactionResource($petWalletTransaction))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PetWalletTransaction $petWalletTransaction)
    {
        abort_if(Gate::denies('pet_wallet_transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PetWalletTransactionResource($petWalletTransaction->load(['user', 'created_by']));
    }

    public function update(UpdatePetWalletTransactionRequest $request, PetWalletTransaction $petWalletTransaction)
    {
        $petWalletTransaction->update($request->all());

        return (new PetWalletTransactionResource($petWalletTransaction))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PetWalletTransaction $petWalletTransaction)
    {
        abort_if(Gate::denies('pet_wallet_transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petWalletTransaction->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

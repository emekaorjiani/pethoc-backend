<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Services\PaystackService;
use Illuminate\Support\Facades\Auth;


class PaystackDepositController extends Controller
{
    protected $paystackService;

    public function __construct(PaystackService $paystackService)
    {
        $this->paystackService = $paystackService;
    }

        public function showPaystackDepositForm(Request $request)
    {
        $minDeposit = Setting::where('min_topup', '!=', null)->first()->min_topup;
        $maxDeposit = Setting::where('max_topup', '!=', null)->first()->max_topup;

        //  dd($maxDeposit, $minDeposit);

        return view('frontend.deposit', compact('minDeposit', 'maxDeposit'));
    }

    public function initiatePaystackDeposit(Request $request)
    {
        $user = Auth::user();

        $minDeposit = Setting::where('min_topup', '!=', null)->first()->min_topup;
        $maxDeposit = Setting::where('max_topup', '!=', null)->first()->max_topup;

        $amount = $request->amount;

        // Validate deposit amount against min/max settings
        if ($amount < $minDeposit || $amount > $maxDeposit) {
            session()->flash('error', 'Deposit amount must be between ' . $minDeposit . ' and ' . $maxDeposit .'(Naira)');
            return back()->withInput(); // Redirect with error message
        }

        if (!$user->petwallet) { // Check if wallet doesn't exist
            $user->createWallet(); // Create the wallet with a balance of 0
        }

        $deposit = $user->deposits()->create([
            'amount' => $amount,
            'txnref' => 'PET'.uniqid().'-'.time().'-'.'PAYSTACK',
            'pet_wallet_id' => $user->petwallet->id,
            'transaction_type' => 'Credit',
            'payment_method' => 'Paystack',
        ]);

        $paymentURL = $this->paystackService->initiatePayment([
            'amount' => $amount,
            'email' => $user->email,
            'reference' => $deposit->txnref,
            'metadata' => [
                'user_id' => $user->id,
                'deposit_id' => $deposit->id,
            ],
        ]);

        if ($paymentURL) {
            return redirect($paymentURL);
        } else {
            return redirect()->route('frontend.deposit.paystackForm')->with('error', 'Unable to initiate payment check your internet connection.');
        }
    }

    public function handleCallback(Request $request)
    {
        $paymentDetails = $this->paystackService->verifyPayment($request->reference);
        $user = Auth::user();

        if ($paymentDetails && $paymentDetails->data->status === 'success') {
            $depositId = $paymentDetails->data->metadata->deposit_id;
            $deposit = Deposit::findOrFail($depositId);
            $deposit->update(['status' => 'completed']);

            return redirect()->route('frontend.home')->with('success', 'Deposit successful!');
        } else {
            return redirect()->route('frontend.home')->with('error', 'Deposit failed. Please try again.');
        }
    }
}

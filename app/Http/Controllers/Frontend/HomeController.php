<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Deposit;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
        $user = Auth::user();

        $depositTransactions = Deposit::where('user_id', $user->id)->latest()->get();
        return view('frontend.home', compact('depositTransactions'));
//        return view('frontend.home');
    }
}

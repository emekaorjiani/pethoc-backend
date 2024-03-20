@extends('layouts.frontend')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="container grid-margin">
                <div class="mt-3 mb-3">
                    <a class="btn btn-pill text-left" href="{{ route('frontend.home') }}"> <h5 >< Back</h5></a>
                    <h2 class="text-right">Deposit Page</h2>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h1>Instructions</h1>
                                <p>Please enter the amount you wish to deposit into your PetWallet.</p>
                                <small class="text-danger">Minimum Deposit amount allowed ₦{{ number_format($minDeposit, 2 ) }}</small><br>
                                <small class="text-danger">Maximum Deposit amount allowed ₦{{ number_format( $maxDeposit ,2)}}</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h1>Deposit Funds</h1>


                                <form method="POST" action="{{ route('frontend.deposit.initiatePaystack') }}">
                                    @csrf
                                    <div>
                                        <label for="amount">Amount to Deposit (enter without commas):</label>
                                        <input type="number" id="amount" name="amount" required min="1" class="form-control">
                                        @if (session('error'))
                                            <div class="text-danger">{{ session('error') }}</div>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm mt-4">Deposit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

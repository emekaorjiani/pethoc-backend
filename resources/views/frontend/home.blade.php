@extends('layouts.frontend')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="container grid-margin">
                <div class="mt-3 mb-3">
                    <h2 class="text-right">Welcome, {{ auth()->user()->name }}</h2>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif


                <div class="row">


                    <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-muted font-weight-normal">PetWallet Balance</h6>

                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0"> ₦{{ number_format(auth()->user()->petwallet->amount ?? 0.0, 2) }} </h3>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="">

                                            <a type="button" class="btn btn-rounded btn-success" href="{{ route('frontend.deposit.paystackForm') }}" >
                                                Fund
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0">0.0kg </h3>
                                            <p class="text-danger ml-2 mb-0 font-weight-medium">(Left)</p>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success">
                                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">myGas</h6>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-9">--}}
{{--                                        <div class="d-flex align-items-center align-self-start">--}}
{{--                                            <h3 class="mb-0">Products</h3>--}}
{{--                                            <p class="text-danger ml-2 mb-0 font-weight-medium"></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-3">--}}
{{--                                        <div class="icon icon-box-success">--}}
{{--                                            <span class="mdi mdi-arrow-top-right icon-item"></span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h6 class="text-muted font-weight-normal">Total Contestants</h6>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0">₦0.00</h3>
                                            <p class="text-success ml-2 mb-0 font-weight-medium">Bonus</p>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success ">
                                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Bonus Cash Earned</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <h3>PetWallet Transactions</h3>
                        <ul class="list-group">
                            @forelse($depositTransactions as  $transaction)
                                <li class="list-group-item">
                                    {{ $transaction->created_at->format('Y-m-d H:i:s') }} - TXN ID: {{ $transaction->txnref }} -
                                    Amount: ₦{{ number_format( $transaction->amount, 2) }} - Status: {{ $transaction->status }}
                                </li>
                            @empty
                                <li class="list-group-item">No Wallet transactions yet.</li>
                            @endforelse
                        </ul>

                        <div class="mt-3">
                            <a href="{{ route('frontend.deposit.paystackForm') }}" class="btn btn-rounded btn-primary">Top Up with Paystack</a>
                        </div>
                    </div>
{{--                    <div class="col-md-6">--}}
{{--                        <h3>Vote History </h3>--}}
{{--                        <table class="table table-bordered table-hover">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th scope="col">#</th>--}}
{{--                                <th scope="col">Date</th>--}}
{{--                                <th scope="col">Votes</th>--}}
{{--                                <th scope="col">Contestant</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @forelse($voteTransactions as  $transaction)--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">{{ $loop->iteration }}</th>--}}
{{--                                    <td>--}}
{{--                                        {{ $transaction->created_at->format('Y-m-d H:i:s') }}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        {{ $transaction->votes }}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        {{ $transaction->contestant->nickname }}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @empty--}}
{{--                                <tr>--}}
{{--                                    <td class="text-center py-3" colspan="4">No Votes Given Yet </td>--}}
{{--                                </tr>--}}
{{--                            @endforelse--}}

{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        --}}{{-- <ul class="list-group">--}}
{{--                            @forelse($voteTransactions as  $transaction)--}}
{{--                                <li class="list-group-item">--}}
{{--                                    {{ $transaction->created_at->format('Y-m-d H:i:s') }} - {{ $transaction->votes }}--}}
{{--                                    Votes given to: {{ $transaction->amount }} {{ $transaction->contestant->nickname }}--}}
{{--                                </li>--}}
{{--                            @empty--}}
{{--                                <li class="list-group-item">No Votes Given Yet </li>--}}
{{--                            @endforelse--}}
{{--                        </ul> --}}

{{--                        <div class="mt-3">--}}
{{--                            <a href="{{ url('/') }}" class="btn btn-link"> Vote a Contestant</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>



            </div>
        </div>
    </div>

@endsection

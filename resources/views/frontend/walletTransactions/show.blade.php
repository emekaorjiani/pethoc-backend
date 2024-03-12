@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.walletTransaction.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.wallet-transactions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.walletTransaction.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $walletTransaction->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.walletTransaction.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $walletTransaction->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.walletTransaction.fields.amount') }}
                                    </th>
                                    <td>
                                        {{ $walletTransaction->amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.walletTransaction.fields.payment_method') }}
                                    </th>
                                    <td>
                                        {{ $walletTransaction->payment_method }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.walletTransaction.fields.transaction_type') }}
                                    </th>
                                    <td>
                                        {{ $walletTransaction->transaction_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.walletTransaction.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $walletTransaction->status }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.wallet-transactions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
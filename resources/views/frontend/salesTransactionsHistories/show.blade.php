@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.salesTransactionsHistory.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.sales-transactions-histories.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesTransactionsHistory.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $salesTransactionsHistory->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesTransactionsHistory.fields.station') }}
                                    </th>
                                    <td>
                                        {{ $salesTransactionsHistory->station->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesTransactionsHistory.fields.product') }}
                                    </th>
                                    <td>
                                        {{ $salesTransactionsHistory->product->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesTransactionsHistory.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $salesTransactionsHistory->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesTransactionsHistory.fields.amount') }}
                                    </th>
                                    <td>
                                        {{ $salesTransactionsHistory->amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesTransactionsHistory.fields.transaction_reference') }}
                                    </th>
                                    <td>
                                        {{ $salesTransactionsHistory->transaction_reference }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.sales-transactions-histories.index') }}">
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
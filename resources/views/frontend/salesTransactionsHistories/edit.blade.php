@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.salesTransactionsHistory.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.sales-transactions-histories.update", [$salesTransactionsHistory->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="station_id">{{ trans('cruds.salesTransactionsHistory.fields.station') }}</label>
                            <select class="form-control select2" name="station_id" id="station_id" required>
                                @foreach($stations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('station_id') ? old('station_id') : $salesTransactionsHistory->station->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('station'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('station') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesTransactionsHistory.fields.station_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="product_id">{{ trans('cruds.salesTransactionsHistory.fields.product') }}</label>
                            <select class="form-control select2" name="product_id" id="product_id" required>
                                @foreach($products as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $salesTransactionsHistory->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('product') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesTransactionsHistory.fields.product_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="quantity">{{ trans('cruds.salesTransactionsHistory.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', $salesTransactionsHistory->quantity) }}" step="1">
                            @if($errors->has('quantity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('quantity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesTransactionsHistory.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="amount">{{ trans('cruds.salesTransactionsHistory.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', $salesTransactionsHistory->amount) }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesTransactionsHistory.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="transaction_reference">{{ trans('cruds.salesTransactionsHistory.fields.transaction_reference') }}</label>
                            <input class="form-control" type="text" name="transaction_reference" id="transaction_reference" value="{{ old('transaction_reference', $salesTransactionsHistory->transaction_reference) }}" required>
                            @if($errors->has('transaction_reference'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('transaction_reference') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesTransactionsHistory.fields.transaction_reference_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.salesTransactionsHistory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sales-transactions-histories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="station_id">{{ trans('cruds.salesTransactionsHistory.fields.station') }}</label>
                <select class="form-control select2 {{ $errors->has('station') ? 'is-invalid' : '' }}" name="station_id" id="station_id" required>
                    @foreach($stations as $id => $entry)
                        <option value="{{ $id }}" {{ old('station_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="1">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesTransactionsHistory.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.salesTransactionsHistory.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesTransactionsHistory.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transaction_reference">{{ trans('cruds.salesTransactionsHistory.fields.transaction_reference') }}</label>
                <input class="form-control {{ $errors->has('transaction_reference') ? 'is-invalid' : '' }}" type="text" name="transaction_reference" id="transaction_reference" value="{{ old('transaction_reference', '') }}" required>
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



@endsection
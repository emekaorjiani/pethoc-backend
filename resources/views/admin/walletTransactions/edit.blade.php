@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.walletTransaction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.wallet-transactions.update", [$walletTransaction->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.walletTransaction.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $walletTransaction->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.walletTransaction.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.walletTransaction.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $walletTransaction->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.walletTransaction.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_method">{{ trans('cruds.walletTransaction.fields.payment_method') }}</label>
                <input class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" type="text" name="payment_method" id="payment_method" value="{{ old('payment_method', $walletTransaction->payment_method) }}" required>
                @if($errors->has('payment_method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.walletTransaction.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transaction_type">{{ trans('cruds.walletTransaction.fields.transaction_type') }}</label>
                <input class="form-control {{ $errors->has('transaction_type') ? 'is-invalid' : '' }}" type="text" name="transaction_type" id="transaction_type" value="{{ old('transaction_type', $walletTransaction->transaction_type) }}" required>
                @if($errors->has('transaction_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transaction_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.walletTransaction.fields.transaction_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.walletTransaction.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $walletTransaction->status) }}">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.walletTransaction.fields.status_helper') }}</span>
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
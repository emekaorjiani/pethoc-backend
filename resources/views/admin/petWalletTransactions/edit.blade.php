@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.petWalletTransaction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pet-wallet-transactions.update", [$petWalletTransaction->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.petWalletTransaction.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $petWalletTransaction->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.petWalletTransaction.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.petWalletTransaction.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $petWalletTransaction->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.petWalletTransaction.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transaction_type">{{ trans('cruds.petWalletTransaction.fields.transaction_type') }}</label>
                <input class="form-control {{ $errors->has('transaction_type') ? 'is-invalid' : '' }}" type="text" name="transaction_type" id="transaction_type" value="{{ old('transaction_type', $petWalletTransaction->transaction_type) }}">
                @if($errors->has('transaction_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transaction_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.petWalletTransaction.fields.transaction_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.petWalletTransaction.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $petWalletTransaction->status) }}" required>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.petWalletTransaction.fields.status_helper') }}</span>
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
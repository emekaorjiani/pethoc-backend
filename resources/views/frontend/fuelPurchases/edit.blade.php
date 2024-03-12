@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.fuelPurchase.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.fuel-purchases.update", [$fuelPurchase->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.fuelPurchase.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $fuelPurchase->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.fuelPurchase.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="product_id">{{ trans('cruds.fuelPurchase.fields.product') }}</label>
                            <select class="form-control select2" name="product_id" id="product_id" required>
                                @foreach($products as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $fuelPurchase->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('product') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.fuelPurchase.fields.product_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="quantity">{{ trans('cruds.fuelPurchase.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', $fuelPurchase->quantity) }}" step="1" required>
                            @if($errors->has('quantity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('quantity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.fuelPurchase.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="payment_method">{{ trans('cruds.fuelPurchase.fields.payment_method') }}</label>
                            <input class="form-control" type="text" name="payment_method" id="payment_method" value="{{ old('payment_method', $fuelPurchase->payment_method) }}" required>
                            @if($errors->has('payment_method'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_method') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.fuelPurchase.fields.payment_method_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="transaction_reference">{{ trans('cruds.fuelPurchase.fields.transaction_reference') }}</label>
                            <input class="form-control" type="text" name="transaction_reference" id="transaction_reference" value="{{ old('transaction_reference', $fuelPurchase->transaction_reference) }}">
                            @if($errors->has('transaction_reference'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('transaction_reference') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.fuelPurchase.fields.transaction_reference_helper') }}</span>
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
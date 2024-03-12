@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.payment.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.payments.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="payment_method">{{ trans('cruds.payment.fields.payment_method') }}</label>
                            <input class="form-control" type="text" name="payment_method" id="payment_method" value="{{ old('payment_method', 'cash') }}" required>
                            @if($errors->has('payment_method'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_method') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.payment_method_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_provider">{{ trans('cruds.payment.fields.payment_provider') }}</label>
                            <input class="form-control" type="text" name="payment_provider" id="payment_provider" value="{{ old('payment_provider', '') }}">
                            @if($errors->has('payment_provider'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_provider') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.payment_provider_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_code">{{ trans('cruds.payment.fields.payment_code') }}</label>
                            <input class="form-control" type="text" name="payment_code" id="payment_code" value="{{ old('payment_code', '') }}">
                            @if($errors->has('payment_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.payment_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.payment.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Payment::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', 'pending') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.status_helper') }}</span>
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
@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.orders.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="pickup_area">{{ trans('cruds.order.fields.pickup_area') }}</label>
                            <input class="form-control" type="text" name="pickup_area" id="pickup_area" value="{{ old('pickup_area', '') }}">
                            @if($errors->has('pickup_area'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pickup_area') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.pickup_area_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="delivery_phone">{{ trans('cruds.order.fields.delivery_phone') }}</label>
                            <input class="form-control" type="text" name="delivery_phone" id="delivery_phone" value="{{ old('delivery_phone', '') }}" required>
                            @if($errors->has('delivery_phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('delivery_phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.delivery_phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="delivery_location">{{ trans('cruds.order.fields.delivery_location') }}</label>
                            <input class="form-control" type="text" name="delivery_location" id="delivery_location" value="{{ old('delivery_location', '') }}" required>
                            @if($errors->has('delivery_location'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('delivery_location') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.delivery_location_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="quantity">{{ trans('cruds.order.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="1" required>
                            @if($errors->has('quantity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('quantity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="payment_method">{{ trans('cruds.order.fields.payment_method') }}</label>
                            <input class="form-control" type="text" name="payment_method" id="payment_method" value="{{ old('payment_method', '') }}" required>
                            @if($errors->has('payment_method'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_method') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.payment_method_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.order.fields.status') }}</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Order::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', 'status') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.order.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="product_id">{{ trans('cruds.order.fields.product') }}</label>
                            <select class="form-control select2" name="product_id" id="product_id" required>
                                @foreach($products as $id => $entry)
                                    <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('product') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.product_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="total_cost">{{ trans('cruds.order.fields.total_cost') }}</label>
                            <input class="form-control" type="number" name="total_cost" id="total_cost" value="{{ old('total_cost', '') }}" step="0.01" required>
                            @if($errors->has('total_cost'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total_cost') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.total_cost_helper') }}</span>
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
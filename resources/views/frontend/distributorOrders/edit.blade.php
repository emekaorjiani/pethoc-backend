@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.distributorOrder.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.distributor-orders.update", [$distributorOrder->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="distributor_id">{{ trans('cruds.distributorOrder.fields.distributor') }}</label>
                            <select class="form-control select2" name="distributor_id" id="distributor_id" required>
                                @foreach($distributors as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('distributor_id') ? old('distributor_id') : $distributorOrder->distributor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('distributor'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('distributor') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.distributorOrder.fields.distributor_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="order_id">{{ trans('cruds.distributorOrder.fields.order') }}</label>
                            <select class="form-control select2" name="order_id" id="order_id" required>
                                @foreach($orders as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('order_id') ? old('order_id') : $distributorOrder->order->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.distributorOrder.fields.order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.distributorOrder.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $distributorOrder->status) }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.distributorOrder.fields.status_helper') }}</span>
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
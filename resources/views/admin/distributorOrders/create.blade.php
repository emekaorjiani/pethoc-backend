@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.distributorOrder.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.distributor-orders.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="distributor_id">{{ trans('cruds.distributorOrder.fields.distributor') }}</label>
                <select class="form-control select2 {{ $errors->has('distributor') ? 'is-invalid' : '' }}" name="distributor_id" id="distributor_id" required>
                    @foreach($distributors as $id => $entry)
                        <option value="{{ $id }}" {{ old('distributor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <select class="form-control select2 {{ $errors->has('order') ? 'is-invalid' : '' }}" name="order_id" id="order_id" required>
                    @foreach($orders as $id => $entry)
                        <option value="{{ $id }}" {{ old('order_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
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



@endsection
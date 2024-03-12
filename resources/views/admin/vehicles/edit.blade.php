@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.vehicle.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.vehicles.update", [$vehicle->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.vehicle.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $vehicle->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type">{{ trans('cruds.vehicle.fields.type') }}</label>
                <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text" name="type" id="type" value="{{ old('type', $vehicle->type) }}">
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="plate_number">{{ trans('cruds.vehicle.fields.plate_number') }}</label>
                <input class="form-control {{ $errors->has('plate_number') ? 'is-invalid' : '' }}" type="text" name="plate_number" id="plate_number" value="{{ old('plate_number', $vehicle->plate_number) }}" required>
                @if($errors->has('plate_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('plate_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.plate_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="is_avaliable">{{ trans('cruds.vehicle.fields.is_avaliable') }}</label>
                <input class="form-control {{ $errors->has('is_avaliable') ? 'is-invalid' : '' }}" type="number" name="is_avaliable" id="is_avaliable" value="{{ old('is_avaliable', $vehicle->is_avaliable) }}" step="1" required>
                @if($errors->has('is_avaliable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_avaliable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.is_avaliable_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="current_location">{{ trans('cruds.vehicle.fields.current_location') }}</label>
                <input class="form-control {{ $errors->has('current_location') ? 'is-invalid' : '' }}" type="text" name="current_location" id="current_location" value="{{ old('current_location', $vehicle->current_location) }}">
                @if($errors->has('current_location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('current_location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.current_location_helper') }}</span>
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
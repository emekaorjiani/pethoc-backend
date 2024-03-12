@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.stationManagement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.station-managements.update", [$stationManagement->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="number_of_pumps">{{ trans('cruds.stationManagement.fields.number_of_pumps') }}</label>
                <input class="form-control {{ $errors->has('number_of_pumps') ? 'is-invalid' : '' }}" type="number" name="number_of_pumps" id="number_of_pumps" value="{{ old('number_of_pumps', $stationManagement->number_of_pumps) }}" step="1" required>
                @if($errors->has('number_of_pumps'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number_of_pumps') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.number_of_pumps_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_types">{{ trans('cruds.stationManagement.fields.product_types') }}</label>
                <input class="form-control {{ $errors->has('product_types') ? 'is-invalid' : '' }}" type="text" name="product_types" id="product_types" value="{{ old('product_types', $stationManagement->product_types) }}" required>
                @if($errors->has('product_types'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_types') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.product_types_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="prices">{{ trans('cruds.stationManagement.fields.prices') }}</label>
                <input class="form-control {{ $errors->has('prices') ? 'is-invalid' : '' }}" type="text" name="prices" id="prices" value="{{ old('prices', $stationManagement->prices) }}" required>
                @if($errors->has('prices'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prices') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationManagement.fields.prices_helper') }}</span>
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
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.stationAdmin.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.station-admins.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.stationAdmin.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationAdmin.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_id">{{ trans('cruds.stationAdmin.fields.station') }}</label>
                <select class="form-control select2 {{ $errors->has('station') ? 'is-invalid' : '' }}" name="station_id" id="station_id">
                    @foreach($stations as $id => $entry)
                        <option value="{{ $id }}" {{ old('station_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('station'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stationAdmin.fields.station_helper') }}</span>
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
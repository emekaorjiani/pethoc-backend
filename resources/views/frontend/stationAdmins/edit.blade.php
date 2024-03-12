@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.stationAdmin.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.station-admins.update", [$stationAdmin->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.stationAdmin.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $stationAdmin->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <select class="form-control select2" name="station_id" id="station_id">
                                @foreach($stations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('station_id') ? old('station_id') : $stationAdmin->station->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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

        </div>
    </div>
</div>
@endsection
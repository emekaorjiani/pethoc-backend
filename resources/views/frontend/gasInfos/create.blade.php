@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.gasInfo.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.gas-infos.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.gasInfo.fields.user') }}</label>
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
                            <span class="help-block">{{ trans('cruds.gasInfo.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="gas_level">{{ trans('cruds.gasInfo.fields.gas_level') }}</label>
                            <input class="form-control" type="number" name="gas_level" id="gas_level" value="{{ old('gas_level', '') }}" step="1" required>
                            @if($errors->has('gas_level'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gas_level') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.gasInfo.fields.gas_level_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="low_level_notification_enabled">{{ trans('cruds.gasInfo.fields.low_level_notification_enabled') }}</label>
                            <input class="form-control" type="text" name="low_level_notification_enabled" id="low_level_notification_enabled" value="{{ old('low_level_notification_enabled', 'true') }}" required>
                            @if($errors->has('low_level_notification_enabled'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('low_level_notification_enabled') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.gasInfo.fields.low_level_notification_enabled_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="auto_refill_enabled">{{ trans('cruds.gasInfo.fields.auto_refill_enabled') }}</label>
                            <input class="form-control" type="text" name="auto_refill_enabled" id="auto_refill_enabled" value="{{ old('auto_refill_enabled', 'false') }}" required>
                            @if($errors->has('auto_refill_enabled'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('auto_refill_enabled') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.gasInfo.fields.auto_refill_enabled_helper') }}</span>
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
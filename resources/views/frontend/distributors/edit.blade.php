@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.distributor.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.distributors.update", [$distributor->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.distributor.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $distributor->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.distributor.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="profile_info">{{ trans('cruds.distributor.fields.profile_info') }}</label>
                            <input class="form-control" type="text" name="profile_info" id="profile_info" value="{{ old('profile_info', $distributor->profile_info) }}">
                            @if($errors->has('profile_info'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('profile_info') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.distributor.fields.profile_info_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="kyc_verified">{{ trans('cruds.distributor.fields.kyc_verified') }}</label>
                            <input class="form-control" type="text" name="kyc_verified" id="kyc_verified" value="{{ old('kyc_verified', $distributor->kyc_verified) }}" required>
                            @if($errors->has('kyc_verified'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kyc_verified') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.distributor.fields.kyc_verified_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="status">{{ trans('cruds.distributor.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $distributor->status) }}" required>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.distributor.fields.status_helper') }}</span>
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
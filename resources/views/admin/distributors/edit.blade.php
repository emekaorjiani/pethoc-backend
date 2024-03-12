@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.distributor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.distributors.update", [$distributor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.distributor.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
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
                <input class="form-control {{ $errors->has('profile_info') ? 'is-invalid' : '' }}" type="text" name="profile_info" id="profile_info" value="{{ old('profile_info', $distributor->profile_info) }}">
                @if($errors->has('profile_info'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profile_info') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.distributor.fields.profile_info_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kyc_verified">{{ trans('cruds.distributor.fields.kyc_verified') }}</label>
                <input class="form-control {{ $errors->has('kyc_verified') ? 'is-invalid' : '' }}" type="text" name="kyc_verified" id="kyc_verified" value="{{ old('kyc_verified', $distributor->kyc_verified) }}" required>
                @if($errors->has('kyc_verified'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kyc_verified') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.distributor.fields.kyc_verified_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.distributor.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $distributor->status) }}" required>
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



@endsection
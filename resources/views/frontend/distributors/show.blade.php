@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.distributor.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.distributors.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.distributor.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $distributor->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.distributor.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $distributor->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.distributor.fields.profile_info') }}
                                    </th>
                                    <td>
                                        {{ $distributor->profile_info }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.distributor.fields.kyc_verified') }}
                                    </th>
                                    <td>
                                        {{ $distributor->kyc_verified }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.distributor.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $distributor->status }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.distributors.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
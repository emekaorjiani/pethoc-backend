@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.gasInfo.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.gas-infos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gasInfo.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $gasInfo->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gasInfo.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $gasInfo->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gasInfo.fields.gas_level') }}
                                    </th>
                                    <td>
                                        {{ $gasInfo->gas_level }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gasInfo.fields.low_level_notification_enabled') }}
                                    </th>
                                    <td>
                                        {{ $gasInfo->low_level_notification_enabled }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gasInfo.fields.auto_refill_enabled') }}
                                    </th>
                                    <td>
                                        {{ $gasInfo->auto_refill_enabled }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.gas-infos.index') }}">
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
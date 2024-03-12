@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.stationManagement.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.station-managements.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stationManagement.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $stationManagement->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stationManagement.fields.number_of_pumps') }}
                                    </th>
                                    <td>
                                        {{ $stationManagement->number_of_pumps }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stationManagement.fields.product_types') }}
                                    </th>
                                    <td>
                                        {{ $stationManagement->product_types }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stationManagement.fields.prices') }}
                                    </th>
                                    <td>
                                        {{ $stationManagement->prices }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.station-managements.index') }}">
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
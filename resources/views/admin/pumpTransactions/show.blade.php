@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pumpTransaction.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pump-transactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pumpTransaction.fields.id') }}
                        </th>
                        <td>
                            {{ $pumpTransaction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pumpTransaction.fields.station') }}
                        </th>
                        <td>
                            {{ $pumpTransaction->station->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pumpTransaction.fields.amount_received') }}
                        </th>
                        <td>
                            {{ $pumpTransaction->amount_received }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pumpTransaction.fields.transaction_reference') }}
                        </th>
                        <td>
                            {{ $pumpTransaction->transaction_reference }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pump-transactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fuelPurchase.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fuel-purchases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fuelPurchase.fields.id') }}
                        </th>
                        <td>
                            {{ $fuelPurchase->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fuelPurchase.fields.user') }}
                        </th>
                        <td>
                            {{ $fuelPurchase->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fuelPurchase.fields.product') }}
                        </th>
                        <td>
                            {{ $fuelPurchase->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fuelPurchase.fields.quantity') }}
                        </th>
                        <td>
                            {{ $fuelPurchase->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fuelPurchase.fields.payment_method') }}
                        </th>
                        <td>
                            {{ $fuelPurchase->payment_method }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fuelPurchase.fields.transaction_reference') }}
                        </th>
                        <td>
                            {{ $fuelPurchase->transaction_reference }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fuel-purchases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
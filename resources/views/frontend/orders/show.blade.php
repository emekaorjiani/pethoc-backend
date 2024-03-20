@extends('layouts.frontend')
@section('content')
    <div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.order.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.orders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $order->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.pickup_area') }}
                                    </th>
                                    <td>
                                        {{ $order->pickup_area }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.delivery_phone') }}
                                    </th>
                                    <td>
                                        {{ $order->delivery_phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.delivery_location') }}
                                    </th>
                                    <td>
                                        {{ $order->delivery_location }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $order->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.payment_method') }}
                                    </th>
                                    <td>
                                        {{ $order->payment_method }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Order::STATUS_SELECT[$order->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $order->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.product') }}
                                    </th>
                                    <td>
                                        {{ $order->product->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.total_cost') }}
                                    </th>
                                    <td>
                                        {{ $order->total_cost }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.orders.index') }}">
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

@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.petWalletTransaction.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pet-wallet-transactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.petWalletTransaction.fields.id') }}
                        </th>
                        <td>
                            {{ $petWalletTransaction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.petWalletTransaction.fields.user') }}
                        </th>
                        <td>
                            {{ $petWalletTransaction->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.petWalletTransaction.fields.amount') }}
                        </th>
                        <td>
                            {{ $petWalletTransaction->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.petWalletTransaction.fields.transaction_type') }}
                        </th>
                        <td>
                            {{ $petWalletTransaction->transaction_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.petWalletTransaction.fields.status') }}
                        </th>
                        <td>
                            {{ $petWalletTransaction->status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pet-wallet-transactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
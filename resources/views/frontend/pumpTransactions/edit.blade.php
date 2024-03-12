@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.pumpTransaction.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.pump-transactions.update", [$pumpTransaction->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="station_id">{{ trans('cruds.pumpTransaction.fields.station') }}</label>
                            <select class="form-control select2" name="station_id" id="station_id" required>
                                @foreach($stations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('station_id') ? old('station_id') : $pumpTransaction->station->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('station'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('station') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pumpTransaction.fields.station_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="amount_received">{{ trans('cruds.pumpTransaction.fields.amount_received') }}</label>
                            <input class="form-control" type="number" name="amount_received" id="amount_received" value="{{ old('amount_received', $pumpTransaction->amount_received) }}" step="0.01" required>
                            @if($errors->has('amount_received'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount_received') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pumpTransaction.fields.amount_received_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="transaction_reference">{{ trans('cruds.pumpTransaction.fields.transaction_reference') }}</label>
                            <input class="form-control" type="text" name="transaction_reference" id="transaction_reference" value="{{ old('transaction_reference', $pumpTransaction->transaction_reference) }}" required>
                            @if($errors->has('transaction_reference'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('transaction_reference') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pumpTransaction.fields.transaction_reference_helper') }}</span>
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
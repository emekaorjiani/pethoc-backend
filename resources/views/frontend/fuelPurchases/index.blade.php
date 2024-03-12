@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('fuel_purchase_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.fuel-purchases.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.fuelPurchase.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'FuelPurchase', 'route' => 'admin.fuel-purchases.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.fuelPurchase.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-FuelPurchase">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.fuelPurchase.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fuelPurchase.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fuelPurchase.fields.product') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fuelPurchase.fields.quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fuelPurchase.fields.payment_method') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fuelPurchase.fields.transaction_reference') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fuelPurchases as $key => $fuelPurchase)
                                    <tr data-entry-id="{{ $fuelPurchase->id }}">
                                        <td>
                                            {{ $fuelPurchase->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $fuelPurchase->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $fuelPurchase->product->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $fuelPurchase->quantity ?? '' }}
                                        </td>
                                        <td>
                                            {{ $fuelPurchase->payment_method ?? '' }}
                                        </td>
                                        <td>
                                            {{ $fuelPurchase->transaction_reference ?? '' }}
                                        </td>
                                        <td>
                                            @can('fuel_purchase_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.fuel-purchases.show', $fuelPurchase->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('fuel_purchase_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.fuel-purchases.edit', $fuelPurchase->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('fuel_purchase_delete')
                                                <form action="{{ route('frontend.fuel-purchases.destroy', $fuelPurchase->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('fuel_purchase_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.fuel-purchases.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-FuelPurchase:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
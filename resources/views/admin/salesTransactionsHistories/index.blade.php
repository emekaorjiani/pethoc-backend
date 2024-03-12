@extends('layouts.admin')
@section('content')
@can('sales_transactions_history_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sales-transactions-histories.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.salesTransactionsHistory.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'SalesTransactionsHistory', 'route' => 'admin.sales-transactions-histories.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.salesTransactionsHistory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SalesTransactionsHistory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.salesTransactionsHistory.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesTransactionsHistory.fields.station') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesTransactionsHistory.fields.product') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesTransactionsHistory.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesTransactionsHistory.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesTransactionsHistory.fields.transaction_reference') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salesTransactionsHistories as $key => $salesTransactionsHistory)
                        <tr data-entry-id="{{ $salesTransactionsHistory->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $salesTransactionsHistory->id ?? '' }}
                            </td>
                            <td>
                                {{ $salesTransactionsHistory->station->name ?? '' }}
                            </td>
                            <td>
                                {{ $salesTransactionsHistory->product->name ?? '' }}
                            </td>
                            <td>
                                {{ $salesTransactionsHistory->quantity ?? '' }}
                            </td>
                            <td>
                                {{ $salesTransactionsHistory->amount ?? '' }}
                            </td>
                            <td>
                                {{ $salesTransactionsHistory->transaction_reference ?? '' }}
                            </td>
                            <td>
                                @can('sales_transactions_history_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sales-transactions-histories.show', $salesTransactionsHistory->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('sales_transactions_history_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sales-transactions-histories.edit', $salesTransactionsHistory->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('sales_transactions_history_delete')
                                    <form action="{{ route('admin.sales-transactions-histories.destroy', $salesTransactionsHistory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('sales_transactions_history_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sales-transactions-histories.massDestroy') }}",
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
  let table = $('.datatable-SalesTransactionsHistory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
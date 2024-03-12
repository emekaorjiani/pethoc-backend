@extends('layouts.admin')
@section('content')
@can('wallet_transaction_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.wallet-transactions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.walletTransaction.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'WalletTransaction', 'route' => 'admin.wallet-transactions.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.walletTransaction.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-WalletTransaction">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.walletTransaction.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.walletTransaction.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.walletTransaction.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.walletTransaction.fields.payment_method') }}
                        </th>
                        <th>
                            {{ trans('cruds.walletTransaction.fields.transaction_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.walletTransaction.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($walletTransactions as $key => $walletTransaction)
                        <tr data-entry-id="{{ $walletTransaction->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $walletTransaction->id ?? '' }}
                            </td>
                            <td>
                                {{ $walletTransaction->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $walletTransaction->amount ?? '' }}
                            </td>
                            <td>
                                {{ $walletTransaction->payment_method ?? '' }}
                            </td>
                            <td>
                                {{ $walletTransaction->transaction_type ?? '' }}
                            </td>
                            <td>
                                {{ $walletTransaction->status ?? '' }}
                            </td>
                            <td>
                                @can('wallet_transaction_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.wallet-transactions.show', $walletTransaction->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('wallet_transaction_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.wallet-transactions.edit', $walletTransaction->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('wallet_transaction_delete')
                                    <form action="{{ route('admin.wallet-transactions.destroy', $walletTransaction->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('wallet_transaction_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.wallet-transactions.massDestroy') }}",
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
  let table = $('.datatable-WalletTransaction:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
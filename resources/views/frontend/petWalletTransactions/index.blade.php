@extends('layouts.frontend')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.petWalletTransaction.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-PetWalletTransaction">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.petWalletTransaction.fields.id') }}
                                    </th>

                                    <th>
                                        {{ trans('cruds.petWalletTransaction.fields.amount') }}
                                    </th>
                                    <th>
                                       Type
                                    </th>
                                    <th>
                                        Reference
                                    </th>
                                    <th>
                                        Method
                                    </th>
                                    <th>
                                        {{ trans('cruds.petWalletTransaction.fields.status') }}
                                    </th>
                                    <th>
                                        Date and Time
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($petWalletTransactions as $key => $petWalletTransaction)
                                    <tr data-entry-id="{{ $petWalletTransaction->id }}">
                                        <td>
                                            {{ $petWalletTransaction->id ?? '' }}
                                        </td>

                                        <td>
                                            ₦{{ number_format($petWalletTransaction->amount ?? 0.0, 2) }}
                                        </td>
                                        <td>
                                            {{ $petWalletTransaction->transaction_type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $petWalletTransaction->txnref ?? '' }}
                                        </td>
                                        <td>
                                            {{ $petWalletTransaction->payment_method ?? '' }}
                                        </td>
                                        <td>
                                            {{ $petWalletTransaction->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $petWalletTransaction->created_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('pet_wallet_transaction_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.pet-wallet-transactions.show', $petWalletTransaction->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
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
@can('pet_wallet_transaction_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.pet-wallet-transactions.massDestroy') }}",
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
  let table = $('.datatable-PetWalletTransaction:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection

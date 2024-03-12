@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('distributor_order_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.distributor-orders.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.distributorOrder.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'DistributorOrder', 'route' => 'admin.distributor-orders.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.distributorOrder.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-DistributorOrder">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.distributorOrder.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.distributorOrder.fields.distributor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.distributorOrder.fields.order') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.distributorOrder.fields.status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($distributorOrders as $key => $distributorOrder)
                                    <tr data-entry-id="{{ $distributorOrder->id }}">
                                        <td>
                                            {{ $distributorOrder->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $distributorOrder->distributor->profile_info ?? '' }}
                                        </td>
                                        <td>
                                            {{ $distributorOrder->order->pickup_area ?? '' }}
                                        </td>
                                        <td>
                                            {{ $distributorOrder->status ?? '' }}
                                        </td>
                                        <td>
                                            @can('distributor_order_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.distributor-orders.show', $distributorOrder->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('distributor_order_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.distributor-orders.edit', $distributorOrder->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('distributor_order_delete')
                                                <form action="{{ route('frontend.distributor-orders.destroy', $distributorOrder->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('distributor_order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.distributor-orders.massDestroy') }}",
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
  let table = $('.datatable-DistributorOrder:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
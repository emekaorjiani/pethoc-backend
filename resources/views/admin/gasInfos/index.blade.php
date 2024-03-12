@extends('layouts.admin')
@section('content')
@can('gas_info_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.gas-infos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.gasInfo.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'GasInfo', 'route' => 'admin.gas-infos.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.gasInfo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-GasInfo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.gasInfo.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.gasInfo.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.gasInfo.fields.gas_level') }}
                        </th>
                        <th>
                            {{ trans('cruds.gasInfo.fields.low_level_notification_enabled') }}
                        </th>
                        <th>
                            {{ trans('cruds.gasInfo.fields.auto_refill_enabled') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gasInfos as $key => $gasInfo)
                        <tr data-entry-id="{{ $gasInfo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $gasInfo->id ?? '' }}
                            </td>
                            <td>
                                {{ $gasInfo->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $gasInfo->gas_level ?? '' }}
                            </td>
                            <td>
                                {{ $gasInfo->low_level_notification_enabled ?? '' }}
                            </td>
                            <td>
                                {{ $gasInfo->auto_refill_enabled ?? '' }}
                            </td>
                            <td>
                                @can('gas_info_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.gas-infos.show', $gasInfo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('gas_info_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.gas-infos.edit', $gasInfo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('gas_info_delete')
                                    <form action="{{ route('admin.gas-infos.destroy', $gasInfo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('gas_info_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.gas-infos.massDestroy') }}",
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
  let table = $('.datatable-GasInfo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('station_admin_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.station-admins.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.stationAdmin.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'StationAdmin', 'route' => 'admin.station-admins.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.stationAdmin.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-StationAdmin">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stationAdmin.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stationAdmin.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stationAdmin.fields.station') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stationAdmins as $key => $stationAdmin)
                                    <tr data-entry-id="{{ $stationAdmin->id }}">
                                        <td>
                                            {{ $stationAdmin->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $stationAdmin->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $stationAdmin->station->number_of_pumps ?? '' }}
                                        </td>
                                        <td>
                                            @can('station_admin_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.station-admins.show', $stationAdmin->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('station_admin_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.station-admins.edit', $stationAdmin->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('station_admin_delete')
                                                <form action="{{ route('frontend.station-admins.destroy', $stationAdmin->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('station_admin_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.station-admins.massDestroy') }}",
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
  let table = $('.datatable-StationAdmin:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
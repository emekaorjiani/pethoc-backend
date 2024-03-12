@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('vehicle_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.vehicles.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.vehicle.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Vehicle', 'route' => 'admin.vehicles.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.vehicle.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Vehicle">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.plate_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.is_avaliable') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.current_location') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vehicles as $key => $vehicle)
                                    <tr data-entry-id="{{ $vehicle->id }}">
                                        <td>
                                            {{ $vehicle->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vehicle->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vehicle->type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vehicle->plate_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vehicle->is_avaliable ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vehicle->current_location ?? '' }}
                                        </td>
                                        <td>
                                            @can('vehicle_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.vehicles.show', $vehicle->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('vehicle_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.vehicles.edit', $vehicle->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('vehicle_delete')
                                                <form action="{{ route('frontend.vehicles.destroy', $vehicle->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('vehicle_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.vehicles.massDestroy') }}",
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
  let table = $('.datatable-Vehicle:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
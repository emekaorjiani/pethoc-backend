@extends('layouts.admin')
@section('content')
@can('distributor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.distributors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.distributor.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Distributor', 'route' => 'admin.distributors.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.distributor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Distributor">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.distributor.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.distributor.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.distributor.fields.profile_info') }}
                        </th>
                        <th>
                            {{ trans('cruds.distributor.fields.kyc_verified') }}
                        </th>
                        <th>
                            {{ trans('cruds.distributor.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($distributors as $key => $distributor)
                        <tr data-entry-id="{{ $distributor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $distributor->id ?? '' }}
                            </td>
                            <td>
                                {{ $distributor->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $distributor->profile_info ?? '' }}
                            </td>
                            <td>
                                {{ $distributor->kyc_verified ?? '' }}
                            </td>
                            <td>
                                {{ $distributor->status ?? '' }}
                            </td>
                            <td>
                                @can('distributor_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.distributors.show', $distributor->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('distributor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.distributors.edit', $distributor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('distributor_delete')
                                    <form action="{{ route('admin.distributors.destroy', $distributor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('distributor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.distributors.massDestroy') }}",
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
  let table = $('.datatable-Distributor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
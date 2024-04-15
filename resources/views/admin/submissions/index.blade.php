@extends('layouts.admin')
@section('content')
@can('submission_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.submissions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.submission.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.submission.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Submission">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.submission.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.submission.fields.store_delivery_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.submission.fields.story_delivery_employee') }}
                        </th>
                        <th>
                            {{ trans('cruds.submission.fields.deliveryid') }}
                        </th>
                        <th>
                            {{ trans('cruds.submission.fields.depoid') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($submissions as $key => $submission)
                        <tr data-entry-id="{{ $submission->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $submission->id ?? '' }}
                            </td>
                            <td>
                                {{ $submission->store_delivery_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Submission::STORY_DELIVERY_EMPLOYEE_SELECT[$submission->story_delivery_employee] ?? '' }}
                            </td>
                            <td>
                                {{ $submission->deliveryid->delivery_date ?? '' }}
                            </td>
                            <td>
                                {{ $submission->depoid->story_county ?? '' }}
                            </td>
                            <td>
                                @can('submission_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.submissions.show', $submission->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('submission_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.submissions.edit', $submission->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('submission_delete')
                                    <form action="{{ route('admin.submissions.destroy', $submission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('submission_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.submissions.massDestroy') }}",
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
  let table = $('.datatable-Submission:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
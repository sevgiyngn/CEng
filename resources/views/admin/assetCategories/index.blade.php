@extends('layouts.admin')
@section('content')
@can('asset_category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.asset-categories.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.assetCategory.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.assetCategory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AssetCategory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.assetCategory.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetCategory.fields.serial_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetCategory.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetCategory.fields.product_brand') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetCategory.fields.product_model') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetCategory.fields.product_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetCategory.fields.amountofstock') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetCategory.fields.minimum_stock') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetCategory.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetCategory.fields.sub_category') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetCategory.fields.delivery_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetCategory.fields.store') }}
                        </th>
                        <th>
                            {{ trans('cruds.store.fields.story_district') }}
                        </th>
                        <th>
                            {{ trans('cruds.assetCategory.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($categories as $key => $item)
                                    <option value="{{ $item->category_name }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($alt_kategorilers as $key => $item)
                                    <option value="{{ $item->subcategory_name }}">{{ $item->subcategory_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($stores as $key => $item)
                                    <option value="{{ $item->story_county }}">{{ $item->story_county }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\AssetCategory::STATUS_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assetCategories as $key => $assetCategory)
                        <tr data-entry-id="{{ $assetCategory->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $assetCategory->id ?? '' }}
                            </td>
                            <td>
                                {{ $assetCategory->serial_number ?? '' }}
                            </td>
                            <td>
                                {{ $assetCategory->name ?? '' }}
                            </td>
                            <td>
                                {{ $assetCategory->product_brand ?? '' }}
                            </td>
                            <td>
                                {{ $assetCategory->product_model ?? '' }}
                            </td>
                            <td>
                                {{ $assetCategory->product_description ?? '' }}
                            </td>
                            <td>
                                {{ $assetCategory->amountofstock ?? '' }}
                            </td>
                            <td>
                                {{ $assetCategory->minimum_stock ?? '' }}
                            </td>
                            <td>
                                {{ $assetCategory->category->category_name ?? '' }}
                            </td>
                            <td>
                                {{ $assetCategory->sub_category->subcategory_name ?? '' }}
                            </td>
                            <td>
                                {{ $assetCategory->delivery_date ?? '' }}
                            </td>
                            <td>
                                {{ $assetCategory->store->story_county ?? '' }}
                            </td>
                            <td>
                                {{ $assetCategory->store->story_district ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\AssetCategory::STATUS_SELECT[$assetCategory->status] ?? '' }}
                            </td>
                            <td>
                                @can('asset_category_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.asset-categories.show', $assetCategory->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('asset_category_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.asset-categories.edit', $assetCategory->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('asset_category_delete')
                                    <form action="{{ route('admin.asset-categories.destroy', $assetCategory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('asset_category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.asset-categories.massDestroy') }}",
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
  let table = $('.datatable-AssetCategory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection
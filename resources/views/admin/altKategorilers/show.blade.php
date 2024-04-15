@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.altKategoriler.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alt-kategorilers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.altKategoriler.fields.id') }}
                        </th>
                        <td>
                            {{ $altKategoriler->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.altKategoriler.fields.subcategory_name') }}
                        </th>
                        <td>
                            {{ $altKategoriler->subcategory_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.altKategoriler.fields.category') }}
                        </th>
                        <td>
                            {{ $altKategoriler->category->category_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alt-kategorilers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#sub_category_asset_categories" role="tab" data-toggle="tab">
                {{ trans('cruds.assetCategory.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="sub_category_asset_categories">
            @includeIf('admin.altKategorilers.relationships.subCategoryAssetCategories', ['assetCategories' => $altKategoriler->subCategoryAssetCategories])
        </div>
    </div>
</div>

@endsection
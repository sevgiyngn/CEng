@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.category.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.id') }}
                        </th>
                        <td>
                            {{ $category->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.category_name') }}
                        </th>
                        <td>
                            {{ $category->category_name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
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
            <a class="nav-link" href="#category_alt_kategorilers" role="tab" data-toggle="tab">
                {{ trans('cruds.altKategoriler.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#category_asset_categories" role="tab" data-toggle="tab">
                {{ trans('cruds.assetCategory.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="category_alt_kategorilers">
            @includeIf('admin.categories.relationships.categoryAltKategorilers', ['altKategorilers' => $category->categoryAltKategorilers])
        </div>
        <div class="tab-pane" role="tabpanel" id="category_asset_categories">
            @includeIf('admin.categories.relationships.categoryAssetCategories', ['assetCategories' => $category->categoryAssetCategories])
        </div>
    </div>
</div>

@endsection
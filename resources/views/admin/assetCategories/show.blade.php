@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.assetCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asset-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assetCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $assetCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetCategory.fields.serial_number') }}
                        </th>
                        <td>
                            {{ $assetCategory->serial_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetCategory.fields.name') }}
                        </th>
                        <td>
                            {{ $assetCategory->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetCategory.fields.product_brand') }}
                        </th>
                        <td>
                            {{ $assetCategory->product_brand }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetCategory.fields.product_model') }}
                        </th>
                        <td>
                            {{ $assetCategory->product_model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetCategory.fields.product_description') }}
                        </th>
                        <td>
                            {{ $assetCategory->product_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetCategory.fields.amountofstock') }}
                        </th>
                        <td>
                            {{ $assetCategory->amountofstock }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetCategory.fields.minimum_stock') }}
                        </th>
                        <td>
                            {{ $assetCategory->minimum_stock }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetCategory.fields.category') }}
                        </th>
                        <td>
                            {{ $assetCategory->category->category_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetCategory.fields.sub_category') }}
                        </th>
                        <td>
                            {{ $assetCategory->sub_category->subcategory_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetCategory.fields.delivery_date') }}
                        </th>
                        <td>
                            {{ $assetCategory->delivery_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetCategory.fields.store') }}
                        </th>
                        <td>
                            {{ $assetCategory->store->story_county ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetCategory.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\AssetCategory::STATUS_SELECT[$assetCategory->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asset-categories.index') }}">
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
            <a class="nav-link" href="#products_deliveries" role="tab" data-toggle="tab">
                {{ trans('cruds.delivery.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="products_deliveries">
            @includeIf('admin.assetCategories.relationships.productsDeliveries', ['deliveries' => $assetCategory->productsDeliveries])
        </div>
    </div>
</div>

@endsection
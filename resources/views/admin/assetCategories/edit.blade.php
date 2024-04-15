@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.assetCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.asset-categories.update", [$assetCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="serial_number">{{ trans('cruds.assetCategory.fields.serial_number') }}</label>
                <textarea class="form-control {{ $errors->has('serial_number') ? 'is-invalid' : '' }}" name="serial_number" id="serial_number" required>{{ old('serial_number', $assetCategory->serial_number) }}</textarea>
                @if($errors->has('serial_number'))
                    <span class="text-danger">{{ $errors->first('serial_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetCategory.fields.serial_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.assetCategory.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $assetCategory->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetCategory.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_brand">{{ trans('cruds.assetCategory.fields.product_brand') }}</label>
                <input class="form-control {{ $errors->has('product_brand') ? 'is-invalid' : '' }}" type="text" name="product_brand" id="product_brand" value="{{ old('product_brand', $assetCategory->product_brand) }}" required>
                @if($errors->has('product_brand'))
                    <span class="text-danger">{{ $errors->first('product_brand') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetCategory.fields.product_brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_model">{{ trans('cruds.assetCategory.fields.product_model') }}</label>
                <input class="form-control {{ $errors->has('product_model') ? 'is-invalid' : '' }}" type="text" name="product_model" id="product_model" value="{{ old('product_model', $assetCategory->product_model) }}" required>
                @if($errors->has('product_model'))
                    <span class="text-danger">{{ $errors->first('product_model') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetCategory.fields.product_model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_description">{{ trans('cruds.assetCategory.fields.product_description') }}</label>
                <input class="form-control {{ $errors->has('product_description') ? 'is-invalid' : '' }}" type="text" name="product_description" id="product_description" value="{{ old('product_description', $assetCategory->product_description) }}">
                @if($errors->has('product_description'))
                    <span class="text-danger">{{ $errors->first('product_description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetCategory.fields.product_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amountofstock">{{ trans('cruds.assetCategory.fields.amountofstock') }}</label>
                <input class="form-control {{ $errors->has('amountofstock') ? 'is-invalid' : '' }}" type="number" name="amountofstock" id="amountofstock" value="{{ old('amountofstock', $assetCategory->amountofstock) }}" step="1">
                @if($errors->has('amountofstock'))
                    <span class="text-danger">{{ $errors->first('amountofstock') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetCategory.fields.amountofstock_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="minimum_stock">{{ trans('cruds.assetCategory.fields.minimum_stock') }}</label>
                <input class="form-control {{ $errors->has('minimum_stock') ? 'is-invalid' : '' }}" type="number" name="minimum_stock" id="minimum_stock" value="{{ old('minimum_stock', $assetCategory->minimum_stock) }}" step="1">
                @if($errors->has('minimum_stock'))
                    <span class="text-danger">{{ $errors->first('minimum_stock') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetCategory.fields.minimum_stock_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.assetCategory.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $assetCategory->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetCategory.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sub_category_id">{{ trans('cruds.assetCategory.fields.sub_category') }}</label>
                <select class="form-control select2 {{ $errors->has('sub_category') ? 'is-invalid' : '' }}" name="sub_category_id" id="sub_category_id" required>
                    @foreach($sub_categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('sub_category_id') ? old('sub_category_id') : $assetCategory->sub_category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_category'))
                    <span class="text-danger">{{ $errors->first('sub_category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetCategory.fields.sub_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="delivery_date">{{ trans('cruds.assetCategory.fields.delivery_date') }}</label>
                <input class="form-control datetime {{ $errors->has('delivery_date') ? 'is-invalid' : '' }}" type="text" name="delivery_date" id="delivery_date" value="{{ old('delivery_date', $assetCategory->delivery_date) }}">
                @if($errors->has('delivery_date'))
                    <span class="text-danger">{{ $errors->first('delivery_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetCategory.fields.delivery_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="store_id">{{ trans('cruds.assetCategory.fields.store') }}</label>
                <select class="form-control select2 {{ $errors->has('store') ? 'is-invalid' : '' }}" name="store_id" id="store_id" required>
                    @foreach($stores as $id => $entry)
                        <option value="{{ $id }}" {{ (old('store_id') ? old('store_id') : $assetCategory->store->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('store'))
                    <span class="text-danger">{{ $errors->first('store') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetCategory.fields.store_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.assetCategory.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\AssetCategory::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $assetCategory->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assetCategory.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
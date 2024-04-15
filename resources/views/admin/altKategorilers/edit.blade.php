@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.altKategoriler.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.alt-kategorilers.update", [$altKategoriler->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="subcategory_name">{{ trans('cruds.altKategoriler.fields.subcategory_name') }}</label>
                <input class="form-control {{ $errors->has('subcategory_name') ? 'is-invalid' : '' }}" type="text" name="subcategory_name" id="subcategory_name" value="{{ old('subcategory_name', $altKategoriler->subcategory_name) }}" required>
                @if($errors->has('subcategory_name'))
                    <span class="text-danger">{{ $errors->first('subcategory_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.altKategoriler.fields.subcategory_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.altKategoriler.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $altKategoriler->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.altKategoriler.fields.category_helper') }}</span>
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
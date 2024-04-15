@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.store.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stores.update", [$store->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="story_county">{{ trans('cruds.store.fields.story_county') }}</label>
                <input class="form-control {{ $errors->has('story_county') ? 'is-invalid' : '' }}" type="text" name="story_county" id="story_county" value="{{ old('story_county', $store->story_county) }}">
                @if($errors->has('story_county'))
                    <span class="text-danger">{{ $errors->first('story_county') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.story_county_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="story_district">{{ trans('cruds.store.fields.story_district') }}</label>
                <input class="form-control {{ $errors->has('story_district') ? 'is-invalid' : '' }}" type="text" name="story_district" id="story_district" value="{{ old('story_district', $store->story_district) }}">
                @if($errors->has('story_district'))
                    <span class="text-danger">{{ $errors->first('story_district') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.story_district_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="story_adress">{{ trans('cruds.store.fields.story_adress') }}</label>
                <input class="form-control {{ $errors->has('story_adress') ? 'is-invalid' : '' }}" type="text" name="story_adress" id="story_adress" value="{{ old('story_adress', $store->story_adress) }}">
                @if($errors->has('story_adress'))
                    <span class="text-danger">{{ $errors->first('story_adress') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.story_adress_helper') }}</span>
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
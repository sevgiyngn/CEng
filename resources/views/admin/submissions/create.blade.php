@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.submission.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.submissions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="store_delivery_date">{{ trans('cruds.submission.fields.store_delivery_date') }}</label>
                <input class="form-control datetime {{ $errors->has('store_delivery_date') ? 'is-invalid' : '' }}" type="text" name="store_delivery_date" id="store_delivery_date" value="{{ old('store_delivery_date') }}">
                @if($errors->has('store_delivery_date'))
                    <span class="text-danger">{{ $errors->first('store_delivery_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.submission.fields.store_delivery_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.submission.fields.story_delivery_employee') }}</label>
                <select class="form-control {{ $errors->has('story_delivery_employee') ? 'is-invalid' : '' }}" name="story_delivery_employee" id="story_delivery_employee">
                    <option value disabled {{ old('story_delivery_employee', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Submission::STORY_DELIVERY_EMPLOYEE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('story_delivery_employee', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('story_delivery_employee'))
                    <span class="text-danger">{{ $errors->first('story_delivery_employee') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.submission.fields.story_delivery_employee_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="deliveryid_id">{{ trans('cruds.submission.fields.deliveryid') }}</label>
                <select class="form-control select2 {{ $errors->has('deliveryid') ? 'is-invalid' : '' }}" name="deliveryid_id" id="deliveryid_id" required>
                    @foreach($deliveryids as $id => $entry)
                        <option value="{{ $id }}" {{ old('deliveryid_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('deliveryid'))
                    <span class="text-danger">{{ $errors->first('deliveryid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.submission.fields.deliveryid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="depoid_id">{{ trans('cruds.submission.fields.depoid') }}</label>
                <select class="form-control select2 {{ $errors->has('depoid') ? 'is-invalid' : '' }}" name="depoid_id" id="depoid_id" required>
                    @foreach($depoids as $id => $entry)
                        <option value="{{ $id }}" {{ old('depoid_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('depoid'))
                    <span class="text-danger">{{ $errors->first('depoid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.submission.fields.depoid_helper') }}</span>
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
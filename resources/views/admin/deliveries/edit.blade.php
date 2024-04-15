@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.delivery.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.deliveries.update", [$delivery->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="delivery_date">{{ trans('cruds.delivery.fields.delivery_date') }}</label>
                <input class="form-control datetime {{ $errors->has('delivery_date') ? 'is-invalid' : '' }}" type="text" name="delivery_date" id="delivery_date" value="{{ old('delivery_date', $delivery->delivery_date) }}" required>
                @if($errors->has('delivery_date'))
                    <span class="text-danger">{{ $errors->first('delivery_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.delivery.fields.delivery_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="delivery_employee">{{ trans('cruds.delivery.fields.delivery_employee') }}</label>
                <input class="form-control {{ $errors->has('delivery_employee') ? 'is-invalid' : '' }}" type="text" name="delivery_employee" id="delivery_employee" value="{{ old('delivery_employee', $delivery->delivery_employee) }}" required>
                @if($errors->has('delivery_employee'))
                    <span class="text-danger">{{ $errors->first('delivery_employee') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.delivery.fields.delivery_employee_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.delivery.fields.plaka') }}</label>
                <select class="form-control {{ $errors->has('plaka') ? 'is-invalid' : '' }}" name="plaka" id="plaka" required>
                    <option value disabled {{ old('plaka', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Delivery::PLAKA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('plaka', $delivery->plaka) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('plaka'))
                    <span class="text-danger">{{ $errors->first('plaka') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.delivery.fields.plaka_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="seal_number">{{ trans('cruds.delivery.fields.seal_number') }}</label>
                <input class="form-control {{ $errors->has('seal_number') ? 'is-invalid' : '' }}" type="text" name="seal_number" id="seal_number" value="{{ old('seal_number', $delivery->seal_number) }}" required>
                @if($errors->has('seal_number'))
                    <span class="text-danger">{{ $errors->first('seal_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.delivery.fields.seal_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="products">{{ trans('cruds.delivery.fields.products') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('products') ? 'is-invalid' : '' }}" name="products[]" id="products" multiple required>
                    @foreach($products as $id => $product)
                        <option value="{{ $id }}" {{ (in_array($id, old('products', [])) || $delivery->products->contains($id)) ? 'selected' : '' }}>{{ $product }}</option>
                    @endforeach
                </select>
                @if($errors->has('products'))
                    <span class="text-danger">{{ $errors->first('products') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.delivery.fields.products_helper') }}</span>
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
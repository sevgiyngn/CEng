@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.delivery.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deliveries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.delivery.fields.id') }}
                        </th>
                        <td>
                            {{ $delivery->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delivery.fields.delivery_date') }}
                        </th>
                        <td>
                            {{ $delivery->delivery_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delivery.fields.delivery_employee') }}
                        </th>
                        <td>
                            {{ $delivery->delivery_employee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delivery.fields.plaka') }}
                        </th>
                        <td>
                            {{ App\Models\Delivery::PLAKA_SELECT[$delivery->plaka] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delivery.fields.seal_number') }}
                        </th>
                        <td>
                            {{ $delivery->seal_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delivery.fields.products') }}
                        </th>
                        <td>
                            @foreach($delivery->products as $key => $products)
                                <span class="label label-info">{{ $products->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deliveries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
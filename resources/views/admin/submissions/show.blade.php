@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.submission.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.submissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.submission.fields.id') }}
                        </th>
                        <td>
                            {{ $submission->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.submission.fields.store_delivery_date') }}
                        </th>
                        <td>
                            {{ $submission->store_delivery_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.submission.fields.story_delivery_employee') }}
                        </th>
                        <td>
                            {{ App\Models\Submission::STORY_DELIVERY_EMPLOYEE_SELECT[$submission->story_delivery_employee] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.submission.fields.deliveryid') }}
                        </th>
                        <td>
                            {{ $submission->deliveryid->delivery_date ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.submission.fields.depoid') }}
                        </th>
                        <td>
                            {{ $submission->depoid->story_county ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.submissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
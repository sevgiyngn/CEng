<?php

namespace App\Http\Requests;

use App\Models\Submission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSubmissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('submission_create');
    }

    public function rules()
    {
        return [
            'store_delivery_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'deliveryid_id' => [
                'required',
                'integer',
            ],
            'depoid_id' => [
                'required',
                'integer',
            ],
        ];
    }
}

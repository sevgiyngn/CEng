<?php

namespace App\Http\Requests;

use App\Models\Delivery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDeliveryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('delivery_edit');
    }

    public function rules()
    {
        return [
            'delivery_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'delivery_employee' => [
                'string',
                'required',
            ],
            'plaka' => [
                'required',
            ],
            'seal_number' => [
                'string',
                'required',
            ],
            'products.*' => [
                'integer',
            ],
            'products' => [
                'required',
                'array',
            ],
        ];
    }
}

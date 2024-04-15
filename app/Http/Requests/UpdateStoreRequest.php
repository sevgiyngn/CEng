<?php

namespace App\Http\Requests;

use App\Models\Store;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStoreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('store_edit');
    }

    public function rules()
    {
        return [
            'story_county' => [
                'string',
                'nullable',
            ],
            'story_district' => [
                'string',
                'nullable',
            ],
            'story_adress' => [
                'string',
                'nullable',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\AltKategoriler;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAltKategorilerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('alt_kategoriler_create');
    }

    public function rules()
    {
        return [
            'subcategory_name' => [
                'string',
                'required',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
        ];
    }
}

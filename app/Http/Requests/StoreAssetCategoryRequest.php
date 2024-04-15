<?php

namespace App\Http\Requests;

use App\Models\AssetCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssetCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_category_create');
    }

    public function rules()
    {
        return [
            'serial_number' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'product_brand' => [
                'string',
                'required',
            ],
            'product_model' => [
                'string',
                'required',
            ],
            'product_description' => [
                'string',
                'nullable',
            ],
            'amountofstock' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'minimum_stock' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'sub_category_id' => [
                'required',
                'integer',
            ],
            'delivery_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'store_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}

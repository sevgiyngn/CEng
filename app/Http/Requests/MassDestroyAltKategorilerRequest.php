<?php

namespace App\Http\Requests;

use App\Models\AltKategoriler;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAltKategorilerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('alt_kategoriler_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:alt_kategorilers,id',
        ];
    }
}

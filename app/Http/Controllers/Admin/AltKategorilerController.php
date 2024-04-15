<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAltKategorilerRequest;
use App\Http\Requests\StoreAltKategorilerRequest;
use App\Http\Requests\UpdateAltKategorilerRequest;
use App\Models\AltKategoriler;
use App\Models\Category;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AltKategorilerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('alt_kategoriler_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $altKategorilers = AltKategoriler::with(['category'])->get();

        $categories = Category::get();

        return view('admin.altKategorilers.index', compact('altKategorilers', 'categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('alt_kategoriler_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.altKategorilers.create', compact('categories'));
    }

    public function store(StoreAltKategorilerRequest $request)
    {
        $altKategoriler = AltKategoriler::create($request->all());

        return redirect()->route('admin.alt-kategorilers.index');
    }

    public function edit(AltKategoriler $altKategoriler)
    {
        abort_if(Gate::denies('alt_kategoriler_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $altKategoriler->load('category');

        return view('admin.altKategorilers.edit', compact('altKategoriler', 'categories'));
    }

    public function update(UpdateAltKategorilerRequest $request, AltKategoriler $altKategoriler)
    {
        $altKategoriler->update($request->all());

        return redirect()->route('admin.alt-kategorilers.index');
    }

    public function show(AltKategoriler $altKategoriler)
    {
        abort_if(Gate::denies('alt_kategoriler_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $altKategoriler->load('category', 'subCategoryAssetCategories');

        return view('admin.altKategorilers.show', compact('altKategoriler'));
    }

    public function destroy(AltKategoriler $altKategoriler)
    {
        abort_if(Gate::denies('alt_kategoriler_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $altKategoriler->delete();

        return back();
    }

    public function massDestroy(MassDestroyAltKategorilerRequest $request)
    {
        $altKategorilers = AltKategoriler::find(request('ids'));

        foreach ($altKategorilers as $altKategoriler) {
            $altKategoriler->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

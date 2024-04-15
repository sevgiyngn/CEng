<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssetCategoryRequest;
use App\Http\Requests\StoreAssetCategoryRequest;
use App\Http\Requests\UpdateAssetCategoryRequest;
use App\Models\AltKategoriler;
use App\Models\AssetCategory;
use App\Models\Category;
use App\Models\Store;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asset_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetCategories = AssetCategory::with(['category', 'sub_category', 'store'])->get();

        $categories = Category::get();

        $alt_kategorilers = AltKategoriler::get();

        $stores = Store::get();

        return view('admin.assetCategories.index', compact('alt_kategorilers', 'assetCategories', 'categories', 'stores'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_categories = AltKategoriler::pluck('subcategory_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stores = Store::pluck('story_county', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.assetCategories.create', compact('categories', 'stores', 'sub_categories'));
    }

    public function store(StoreAssetCategoryRequest $request)
    {
        $assetCategory = AssetCategory::create($request->all());

        return redirect()->route('admin.asset-categories.index');
    }

    public function edit(AssetCategory $assetCategory)
    {
        abort_if(Gate::denies('asset_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_categories = AltKategoriler::pluck('subcategory_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stores = Store::pluck('story_county', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assetCategory->load('category', 'sub_category', 'store');

        return view('admin.assetCategories.edit', compact('assetCategory', 'categories', 'stores', 'sub_categories'));
    }

    public function update(UpdateAssetCategoryRequest $request, AssetCategory $assetCategory)
    {
        $assetCategory->update($request->all());

        return redirect()->route('admin.asset-categories.index');
    }

    public function show(AssetCategory $assetCategory)
    {
        abort_if(Gate::denies('asset_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetCategory->load('category', 'sub_category', 'store', 'productsDeliveries');

        return view('admin.assetCategories.show', compact('assetCategory'));
    }

    public function destroy(AssetCategory $assetCategory)
    {
        abort_if(Gate::denies('asset_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetCategoryRequest $request)
    {
        $assetCategories = AssetCategory::find(request('ids'));

        foreach ($assetCategories as $assetCategory) {
            $assetCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

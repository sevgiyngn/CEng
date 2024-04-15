<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDeliveryRequest;
use App\Http\Requests\StoreDeliveryRequest;
use App\Http\Requests\UpdateDeliveryRequest;
use App\Models\AssetCategory;
use App\Models\Delivery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeliveryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('delivery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deliveries = Delivery::with(['products'])->get();

        return view('admin.deliveries.index', compact('deliveries'));
    }

    public function create()
    {
        abort_if(Gate::denies('delivery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = AssetCategory::pluck('name', 'id');

        return view('admin.deliveries.create', compact('products'));
    }

    public function store(StoreDeliveryRequest $request)
    {
        $delivery = Delivery::create($request->all());
        $delivery->products()->sync($request->input('products', []));

        return redirect()->route('admin.deliveries.index');
    }

    public function edit(Delivery $delivery)
    {
        abort_if(Gate::denies('delivery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = AssetCategory::pluck('name', 'id');

        $delivery->load('products');

        return view('admin.deliveries.edit', compact('delivery', 'products'));
    }

    public function update(UpdateDeliveryRequest $request, Delivery $delivery)
    {
        $delivery->update($request->all());
        $delivery->products()->sync($request->input('products', []));

        return redirect()->route('admin.deliveries.index');
    }

    public function show(Delivery $delivery)
    {
        abort_if(Gate::denies('delivery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $delivery->load('products');

        return view('admin.deliveries.show', compact('delivery'));
    }

    public function destroy(Delivery $delivery)
    {
        abort_if(Gate::denies('delivery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $delivery->delete();

        return back();
    }

    public function massDestroy(MassDestroyDeliveryRequest $request)
    {
        $deliveries = Delivery::find(request('ids'));

        foreach ($deliveries as $delivery) {
            $delivery->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

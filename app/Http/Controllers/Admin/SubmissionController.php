<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubmissionRequest;
use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdateSubmissionRequest;
use App\Models\Delivery;
use App\Models\Store;
use App\Models\Submission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubmissionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('submission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $submissions = Submission::with(['deliveryid', 'depoid'])->get();

        return view('admin.submissions.index', compact('submissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('submission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deliveryids = Delivery::pluck('delivery_date', 'id')->prepend(trans('global.pleaseSelect'), '');

        $depoids = Store::pluck('story_county', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.submissions.create', compact('deliveryids', 'depoids'));
    }

    public function store(StoreSubmissionRequest $request)
    {
        $submission = Submission::create($request->all());

        return redirect()->route('admin.submissions.index');
    }

    public function edit(Submission $submission)
    {
        abort_if(Gate::denies('submission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deliveryids = Delivery::pluck('delivery_date', 'id')->prepend(trans('global.pleaseSelect'), '');

        $depoids = Store::pluck('story_county', 'id')->prepend(trans('global.pleaseSelect'), '');

        $submission->load('deliveryid', 'depoid');

        return view('admin.submissions.edit', compact('deliveryids', 'depoids', 'submission'));
    }

    public function update(UpdateSubmissionRequest $request, Submission $submission)
    {
        $submission->update($request->all());

        return redirect()->route('admin.submissions.index');
    }

    public function show(Submission $submission)
    {
        abort_if(Gate::denies('submission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $submission->load('deliveryid', 'depoid');

        return view('admin.submissions.show', compact('submission'));
    }

    public function destroy(Submission $submission)
    {
        abort_if(Gate::denies('submission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $submission->delete();

        return back();
    }

    public function massDestroy(MassDestroySubmissionRequest $request)
    {
        $submissions = Submission::find(request('ids'));

        foreach ($submissions as $submission) {
            $submission->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\HospitalStoreRequest;
use App\Http\Requests\HospitalUpdateRequest;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Hospital::class);

        $search = $request->get('search', '');

        $hospitals = Hospital::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.hospitals.index', compact('hospitals', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Hospital::class);

        return view('app.hospitals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HospitalStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Hospital::class);

        $validated = $request->validated();

        $hospital = Hospital::create($validated);

        return redirect()
            ->route('hospitals.edit', $hospital)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Hospital $hospital): View
    {
        $this->authorize('view', $hospital);

        return view('app.hospitals.show', compact('hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Hospital $hospital): View
    {
        $this->authorize('update', $hospital);

        return view('app.hospitals.edit', compact('hospital'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        HospitalUpdateRequest $request,
        Hospital $hospital
    ): RedirectResponse {
        $this->authorize('update', $hospital);

        $validated = $request->validated();

        $hospital->update($validated);

        return redirect()
            ->route('hospitals.edit', $hospital)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Hospital $hospital
    ): RedirectResponse {
        $this->authorize('delete', $hospital);

        $hospital->delete();

        return redirect()
            ->route('hospitals.index')
            ->withSuccess(__('crud.common.removed'));
    }
}

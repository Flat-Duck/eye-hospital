<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TemplateStoreRequest;
use App\Http\Requests\TemplateUpdateRequest;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Template::class);

        $search = $request->get('search', '');

        $templates = Template::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.templates.index', compact('templates', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Template::class);

        return view('app.templates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TemplateStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Template::class);

        $validated = $request->validated();

        $template = Template::create($validated);

        return redirect()
            ->route('templates.edit', $template)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Template $template): View
    {
        $this->authorize('view', $template);

        return view('app.templates.show', compact('template'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Template $template): View
    {
        $this->authorize('update', $template);

        return view('app.templates.edit', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TemplateUpdateRequest $request,
        Template $template
    ): RedirectResponse {
        $this->authorize('update', $template);

        $validated = $request->validated();

        $template->update($validated);

        return redirect()
            ->route('templates.edit', $template)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Template $template
    ): RedirectResponse {
        $this->authorize('delete', $template);

        $template->delete();

        return redirect()
            ->route('templates.index')
            ->withSuccess(__('crud.common.removed'));
    }
}

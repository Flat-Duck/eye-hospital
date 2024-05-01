@extends('layouts.app', ['page' => 'templates'])
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('templates.index') }}" class="mr-4"
            ><i class="ti ti-arrow-back"></i
        ></a>
        <h3 class="card-title">@lang('crud.templates.show_title')</h3>
    </div>

    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.templates.inputs.title')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $template->title ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.templates.inputs.text')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $template->text ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.templates.inputs.after')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $template->after ?? '-' }}"
                                disabled=""
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <div class="d-flex">
            <a
                href="{{ route('templates.index') }}"
                class="btn btn-outline-secondary"
                >@lang('crud.common.back')</a
            >

            @can('create', App\Models\Template::class)
            <a href="{{ route('templates.create') }}" class="btn btn-primary">
                @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </div>
</div>

@endsection

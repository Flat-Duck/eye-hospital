@extends('layouts.app', ['page' => 'hospitals'])
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('hospitals.index') }}" class="mr-4"
            >رجوع</a>
        <h3 class="card-title">@lang('crud.hospitals.show_title')</h3>
    </div>

    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.hospitals.inputs.name')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $hospital->name ?? '-' }}"
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
                href="{{ route('hospitals.index') }}"
                class="btn btn-outline-secondary"
                >@lang('crud.common.back')</a
            >

            @can('create', App\Models\Hospital::class)
            <a href="{{ route('hospitals.create') }}" class="btn btn-primary">
                @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </div>
</div>

@endsection

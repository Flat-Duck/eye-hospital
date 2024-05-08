@extends('layouts.app', ['page' => 'diagnoses'])
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('diagnoses.index') }}" class="mr-4"
            ><i class="ti ti-arrow-back"></i
        ></a>
        <h3 class="card-title">@lang('crud.diagnoses.show_title')</h3>
    </div>

    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.patient_id')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ optional($diagnose->patient)->name ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.eye')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $diagnose->eye ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.BCVA')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $diagnose->BCVA ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.IOP')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $diagnose->IOP ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.LID')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $diagnose->LID ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.conjunctiva')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $diagnose->conjunctiva ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.cornea')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $diagnose->cornea ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.AC')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $diagnose->AC ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.IrisPupil')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $diagnose->IrisPupil ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.lens')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $diagnose->lens ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.fundus')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $diagnose->fundus ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.remarks')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $diagnose->remarks ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.diagnosis')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $diagnose->diagnosis ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.OCT')</label
                            >
                            @if($diagnose->OCT)
                            <a
                                href="{{ \Storage::url($diagnose->OCT) }}"
                                target="blank"
                                ><i class="ti ti-cloud-download"></i
                                >&nbsp;Download</a
                            >
                            @else - @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.US')</label
                            >
                            @if($diagnose->US)
                            <a
                                href="{{ \Storage::url($diagnose->US) }}"
                                target="blank"
                                ><i class="ti ti-cloud-download"></i
                                >&nbsp;Download</a
                            >
                            @else - @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.diagnoses.inputs.pantacam')</label
                            >
                            @if($diagnose->pantacam)
                            <a
                                href="{{ \Storage::url($diagnose->pantacam) }}"
                                target="blank"
                                ><i class="ti ti-cloud-download"></i
                                >&nbsp;Download</a
                            >
                            @else - @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <div class="d-flex">
            <a
                href="{{ route('diagnoses.index') }}"
                class="btn btn-outline-secondary"
                >@lang('crud.common.back')</a
            >

            @can('create', App\Models\Diagnose::class)
            <a href="{{ route('diagnoses.create') }}" class="btn btn-primary">
                @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </div>
</div>

@endsection

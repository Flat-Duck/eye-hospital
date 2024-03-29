@extends('layouts.app', ['page' => 'patients'])
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('patients.index') }}" class="mr-4"
            ><i class="ti ti-arrow-back"></i
        ></a>
        <h3 class="card-title">@lang('crud.patients.show_title')</h3>
    </div>

    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.patients.inputs.name')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $patient->name ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.patients.inputs.birth_date')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $patient->birth_date ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.patients.inputs.n_id')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $patient->n_id ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.patients.inputs.gender')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $patient->gender ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.patients.inputs.phone')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $patient->phone ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.patients.inputs.escort_phone')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $patient->escort_phone ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.patients.inputs.city')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $patient->city ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.patients.inputs.category')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $patient->category ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.patients.inputs.hospital_id')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ optional($patient->hospital)->name ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.patients.inputs.CO')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $patient->CO ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.patients.inputs.PMH')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $patient->PMH ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.patients.inputs.PSH')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $patient->PSH ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.patients.inputs.DM')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $patient->DM ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.patients.inputs.BP')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $patient->BP ?? '-' }}"
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
                href="{{ route('patients.index') }}"
                class="btn btn-outline-secondary"
                >@lang('crud.common.back')</a
            >

            @can('create', App\Models\Patient::class)
            <a href="{{ route('patients.create') }}" class="btn btn-primary">
                @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </div>
</div>

@endsection

@extends('layouts.app', ['page' => 'patients'])

@section('content')
<form
    method="POST"
    action="{{ route('patients.update', $patient) }}"
    class="card"
>
    @csrf @method('PUT')
    <div class="card-header">
        <a href="{{ route('patients.index') }}" class="mr-4"
            >رجوع</a>
        <h3 class="card-title">@lang('crud.patients.edit_title')</h3>
    </div>
    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        @include('app.patients.form-inputs')
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
            <a href="{{ route('patients.create') }}" class="btn btn-link">
                @lang('crud.common.create')
            </a>
            @endcan
            <button type="submit" class="btn btn-primary">
                </i> @lang('crud.common.update')
            </button>
        </div>
    </div>
</form>

@can('view-any', App\Models\Diagnose::class)
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Diagnoses</h3>
    </div>
    <div class="card-body">
        <livewire:patient-diagnoses-detail :patient="$patient" />
    </div>
</div>
@endcan @endsection

@extends('layouts.app', ['page' => 'templates'])

@section('content')
<form
    method="POST"
    action="{{ route('templates.update', $template) }}"
    class="card"
>
    @csrf @method('PUT')
    <div class="card-header">
        <a href="{{ route('templates.index') }}" class="mr-4"
            ><i class="ti ti-arrow-back"></i
        ></a>
        <h3 class="card-title">@lang('crud.templates.edit_title')</h3>
    </div>
    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        @include('app.templates.form-inputs')
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
            <a href="{{ route('templates.create') }}" class="btn btn-link">
                @lang('crud.common.create')
            </a>
            @endcan
            <button type="submit" class="btn btn-primary">
                <i class="ti ti-device-floppy"></i> @lang('crud.common.update')
            </button>
        </div>
    </div>
</form>

@endsection

@extends('layouts.app', ['page' => 'cities'])

@section('content')
<form method="POST" action="{{ route('cities.update', $city) }}" class="card">
    @csrf @method('PUT')
    <div class="card-header">
        <a href="{{ route('cities.index') }}" class="mr-4"
            >رجوع</a>
        <h3 class="card-title">@lang('crud.cities.edit_title')</h3>
    </div>
    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        @include('app.cities.form-inputs')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <div class="d-flex">
            <a
                href="{{ route('cities.index') }}"
                class="btn btn-outline-secondary"
                >@lang('crud.common.back')</a
            >
            @can('create', App\Models\City::class)
            <a href="{{ route('cities.create') }}" class="btn btn-link">
                @lang('crud.common.create')
            </a>
            @endcan
            <button type="submit" class="btn btn-primary">
                </i> @lang('crud.common.update')
            </button>
        </div>
    </div>
</form>

@endsection

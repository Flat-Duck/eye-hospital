@extends('layouts.app', ['page' => 'cities'])

@section('content')
<form method="POST" action="{{ route('cities.store') }}" class="card">
    @csrf
    <div class="card-header">
        <a href="{{ route('cities.index') }}" class="mr-4"
            >رجوع</a>
        <h3 class="card-title">@lang('crud.cities.create_title')</h3>
    </div>
    <div class="card-body">
        <div class="col-6">@include('app.cities.form-inputs')</div>
    </div>
    <div class="card-footer text-end">
        <div class="d-flex">
            <a
                href="{{ route('cities.index') }}"
                class="btn btn-outline-secondary"
                >@lang('crud.common.back')</a
            >
            <button type="submit" class="btn btn-primary">
                @lang('crud.common.create')
            </button>
        </div>
    </div>
</form>
@endsection

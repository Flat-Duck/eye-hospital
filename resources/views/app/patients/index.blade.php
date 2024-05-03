@extends('layouts.app', ['page' => 'patients'])
@section('content')
<div class="card">
    <div class="card-body border-bottom py-3">
        <div class="d-flex">
            <form>
                <div class="row g-2">
                    <div class="input-icon col">
                        <span class="input-icon-addon">
                            <i class="ti ti-search"></i>
                        </span>
                        <input
                            id="indexSearch"
                            name="search"
                            type="text"
                            value=""
                            class="form-control"
                            placeholder="Search…"
                            aria-label="Search..."
                            spellcheck="false"
                            data-ms-editor="true"
                            autocomplete="off"
                        />
                    </div>
                    <div class="col-auto">
                        <button
                            class="btn btn-icon btn-primary"
                            aria-label="Button"
                        >
                            <i class="ti ti-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="col-auto ms-auto d-print-none">
                @can('create', App\Models\Patient::class)
                <a
                    data-bs-original-title="إنشاء"
                    data-bs-placement="top"
                    data-bs-toggle="tooltip"
                    class="pull-right btn btn-primary"
                    href="{{ route('patients.create') }}"
                >
                    <i class="ti ti-plus"></i>
                    @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
                <tr>
                    <th class="text-left">
                        @lang('crud.patients.inputs.name')
                    </th>
                    <th class="text-left">
                        @lang('crud.patients.inputs.birth_date')
                    </th>
                    <th class="text-left">
                        @lang('crud.patients.inputs.n_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.patients.inputs.gender')
                    </th>
                    <th class="text-left">
                        @lang('crud.patients.inputs.phone')
                    </th>
                    <th class="text-left">
                        @lang('crud.patients.inputs.escort_phone')
                    </th>
                    <th class="text-left">
                        @lang('crud.patients.inputs.city')
                    </th>
                    <th class="text-left">
                        @lang('crud.patients.inputs.category')
                    </th>
                    <th class="text-left">
                        @lang('crud.patients.inputs.hospital_id')
                    </th>
                    <th class="text-center">@lang('crud.common.actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($patients as $patient)
                <tr>
                    <td>{{ $patient->name ?? '-' }}</td>
                    <td>{{ $patient->birth_date->format('Y-m-d') ?? '-' }}</td>
                    <td>{{ $patient->n_id ?? '-' }}</td>
                    <td>{{ $patient->gender ?? '-' }}</td>
                    <td>{{ $patient->phone ?? '-' }}</td>
                    <td>{{ $patient->escort_phone ?? '-' }}</td>
                    <td>{{ $patient->city ?? '-' }}</td>
                    <td>{{ $patient->category ?? '-' }}</td>
                    <td>{{ optional($patient->hospital)->name ?? '-' }}</td>
                    <td class="text-center" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="btn-group"
                        >
                            @can('update', $patient)
                            <a
                                href="{{ route('patients.edit', $patient) }}"
                                class="btn btn-icon btn-outline-warinig ms-1"
                            >
                                <i class="ti ti-edit"></i>
                            </a>
                            @endcan @can('view', $patient)
                            <a
                                href="{{ route('patients.show', $patient) }}"
                                class="btn btn-icon btn-outline-info ms-1"
                            >
                                <i class="ti ti-eye"></i>
                            </a>
                            @endcan @can('delete', $patient)
                            <form
                                action="{{ route('patients.destroy', $patient) }}"
                                method="POST"
                                class="inline pointer ms-1"
                                onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                            >
                                @csrf @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-icon btn-outline-danger"
                                >
                                    <i class="ti ti-trash-x"></i>
                                </button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10">@lang('crud.common.no_items_found')</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer d-flex align-items-left">
        {!! $patients->render() !!}
    </div>
</div>
@endsection

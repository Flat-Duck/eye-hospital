@extends('layouts.app', ['page' => 'diagnoses'])
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
                @can('create', App\Models\Diagnose::class)
                <a
                    data-bs-original-title="إنشاء"
                    data-bs-placement="top"
                    data-bs-toggle="tooltip"
                    class="pull-right btn btn-primary"
                    href="{{ route('diagnoses.create') }}"
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
                        @lang('crud.diagnoses.inputs.patient_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.diagnoses.inputs.eye')
                    </th>
                    <th class="text-left">
                        @lang('crud.diagnoses.inputs.BCVA')
                    </th>
                    <th class="text-left">
                        @lang('crud.diagnoses.inputs.IOP')
                    </th>
                    <th class="text-left">
                        @lang('crud.diagnoses.inputs.LID')
                    </th>
                    <th class="text-left">
                        @lang('crud.diagnoses.inputs.conjunctiva')
                    </th>
                    <th class="text-left">
                        @lang('crud.diagnoses.inputs.cornea')
                    </th>
                    <th class="text-left">@lang('crud.diagnoses.inputs.AC')</th>
                    <th class="text-left">
                        @lang('crud.diagnoses.inputs.IrisPupil')
                    </th>
                    <th class="text-left">
                        @lang('crud.diagnoses.inputs.lens')
                    </th>
                    <th class="text-left">
                        @lang('crud.diagnoses.inputs.fundus')
                    </th>
                    <th class="text-left">
                        @lang('crud.diagnoses.inputs.remarks')
                    </th>
                    <th class="text-left">
                        @lang('crud.diagnoses.inputs.diagnosis')
                    </th>
                    <th class="text-left">
                        @lang('crud.diagnoses.inputs.OCT')
                    </th>
                    <th class="text-left">@lang('crud.diagnoses.inputs.US')</th>
                    <th class="text-left">
                        @lang('crud.diagnoses.inputs.pantacam')
                    </th>
                    <th class="text-center">@lang('crud.common.actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($diagnoses as $diagnose)
                <tr>
                    <td>{{ optional($diagnose->patient)->name ?? '-' }}</td>
                    <td>{{ $diagnose->eye ?? '-' }}</td>
                    <td>{{ $diagnose->BCVA ?? '-' }}</td>
                    <td>{{ $diagnose->IOP ?? '-' }}</td>
                    <td>{{ $diagnose->LID ?? '-' }}</td>
                    <td>{{ $diagnose->conjunctiva ?? '-' }}</td>
                    <td>{{ $diagnose->cornea ?? '-' }}</td>
                    <td>{{ $diagnose->AC ?? '-' }}</td>
                    <td>{{ $diagnose->IrisPupil ?? '-' }}</td>
                    <td>{{ $diagnose->lens ?? '-' }}</td>
                    <td>{{ $diagnose->fundus ?? '-' }}</td>
                    <td>{{ $diagnose->remarks ?? '-' }}</td>
                    <td>{{ $diagnose->diagnosis ?? '-' }}</td>
                    <td>
                        @if($diagnose->OCT)
                        <a
                            href="{{ \Storage::url($diagnose->OCT) }}"
                            target="blank"
                            ><i class="ti ti-cloud-download"></i
                            >&nbsp;Download</a
                        >
                        @else - @endif
                    </td>
                    <td>
                        @if($diagnose->US)
                        <a
                            href="{{ \Storage::url($diagnose->US) }}"
                            target="blank"
                            ><i class="ti ti-cloud-download"></i
                            >&nbsp;Download</a
                        >
                        @else - @endif
                    </td>
                    <td>
                        @if($diagnose->pantacam)
                        <a
                            href="{{ \Storage::url($diagnose->pantacam) }}"
                            target="blank"
                            ><i class="ti ti-cloud-download"></i
                            >&nbsp;Download</a
                        >
                        @else - @endif
                    </td>
                    <td class="text-center" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="btn-group"
                        >
                            @can('update', $diagnose)
                            <a
                                href="{{ route('diagnoses.edit', $diagnose) }}"
                                class="btn btn-icon btn-outline-warinig ms-1"
                            >
                                <i class="ti ti-edit"></i>
                            </a>
                            @endcan @can('view', $diagnose)
                            <a
                                href="{{ route('diagnoses.show', $diagnose) }}"
                                class="btn btn-icon btn-outline-info ms-1"
                            >
                                <i class="ti ti-eye"></i>
                            </a>
                            @endcan @can('delete', $diagnose)
                            <form
                                action="{{ route('diagnoses.destroy', $diagnose) }}"
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
                    <td colspan="17">@lang('crud.common.no_items_found')</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer d-flex align-items-left">
        {!! $diagnoses->render() !!}
    </div>
</div>
@endsection

@extends('layouts.app', ['page' => 'templates'])
@section('content')
<div class="card">
    <div class="card-body border-bottom py-3">
        <div class="d-flex">
            <form>
                <div class="row g-2">
                    <div class="input-icon col">
                        <span class="input-icon-addon">
                            بحث
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
                            بحث
                        </button>
                    </div>
                </div>
            </form>
            <div class="col-auto ms-auto d-print-none">
                @can('create', App\Models\Template::class)
                <a
                    data-bs-original-title="إنشاء"
                    data-bs-placement="top"
                    data-bs-toggle="tooltip"
                    class="pull-right btn btn-primary"
                    href="{{ route('templates.create') }}"
                >
                    
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
                        @lang('crud.templates.inputs.title')
                    </th>
                    <th class="text-left">
                        @lang('crud.templates.inputs.text')
                    </th>
                    <th class="text-right">
                        @lang('crud.templates.inputs.after')
                    </th>
                    <th class="text-center">@lang('crud.common.actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($templates as $template)
                <tr>
                    <td>{{ $template->title ?? '-' }}</td>
                    <td>{{ $template->text ?? '-' }}</td>
                    <td>{{ $template->after ?? '-' }}</td>
                    <td class="text-center" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="btn-group"
                        >
                            @can('update', $template)
                            <a
                                href="{{ route('templates.edit', $template) }}"
                                class="btn btn-icon btn-outline-warinig ms-1"
                            >
                                تعديل
                            </a>
                            @endcan @can('view', $template)
                            <a
                                href="{{ route('templates.show', $template) }}"
                                class="btn btn-icon btn-outline-info ms-1"
                            >
                                عرض
                            </a>
                            @endcan @can('delete', $template)
                            <form
                                action="{{ route('templates.destroy', $template) }}"
                                method="POST"
                                class="inline pointer ms-1"
                                onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                            >
                                @csrf @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-icon btn-outline-danger"
                                >
                                    حذف
                                </button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">@lang('crud.common.no_items_found')</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer d-flex align-items-left">
        {!! $templates->render() !!}
    </div>
</div>
@endsection

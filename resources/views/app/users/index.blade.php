@extends('layouts.app', ['page' => 'users'])
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
                @can('create', App\Models\User::class)
                <a
                    data-bs-original-title="إنشاء"
                    data-bs-placement="top"
                    data-bs-toggle="tooltip"
                    class="pull-right btn btn-primary"
                    href="{{ route('users.create') }}"
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
                    <th class="text-left">@lang('crud.users.inputs.name')</th>
                    <th class="text-left">@lang('crud.users.inputs.phone')</th>
                    <th class="text-left">@lang('crud.users.inputs.email')</th>
                    <th class="text-left">
                        @lang('crud.users.inputs.hospital_id')
                    </th>
                    <th class="text-left">@lang('crud.users.inputs.active')</th>
                    <th class="text-center">@lang('crud.common.actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->name ?? '-' }}</td>
                    <td>{{ $user->phone ?? '-' }}</td>
                    <td>{{ $user->email ?? '-' }}</td>
                    <td>{{ optional($user->hospital)->name ?? '-' }}</td>
                    <td>
                        @if ($user->active)
                        <span class="badge bg-lime text-lime-fg">مفعل</span>
                        @else
                        <span class="badge bg-red text-red-fg">غير مفعل</span>                        
                        @endif
                    </td>
                    <td class="text-center" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="btn-group"
                        >
                            @can('update', $user)
                            <a
                                href="{{ route('users.edit', $user) }}"
                                class="btn btn-icon btn-outline-warinig ms-1"
                            >
                                تعديل
                            </a>
                            @endcan @can('view', $user)
                            <a
                                href="{{ route('users.show', $user) }}"
                                class="btn btn-icon btn-outline-info ms-1"
                            >
                                عرض
                            </a>
                            @endcan @can('delete', $user)
                            <form
                                action="{{ route('users.destroy', $user) }}"
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
                            <form
                            action="{{ route('users.activation', $user) }}"
                            method="POST"
                            class="inline pointer ms-1"                                
                            onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                        >
                            @csrf 
                            <button
                                type="submit"
                                class="btn btn-icon btn-outline-{{ $user->active? 'danger':'success' }}"
                                Show password data-bs-toggle="tooltip"
                                title="{{ $user->active? 'إلغاء تفعيل':'تفعيل' }}"
                            >
                            @if ($user->active)
                            <i class="ti ti-lock"></i>                                
                            @else
                            <i class="ti ti-lock-open"></i>
                            @endif
                            </button>
                        </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">@lang('crud.common.no_items_found')</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer d-flex align-items-left">
        {!! $users->render() !!}
    </div>
</div>
@endsection

@extends('layouts.app', ['page' => 'dashboard'])
@section('content')
<div class="container">
    <div class="row justify-content-center d-print-none">
        <x-state color="bg-blue" icon="plus" title="إضافة حالات" subtitle="حالة جديدة" link="{{route('patients.create')}}" />
        <x-state color="bg-green" icon="check" title="الحالات" subtitle="" />
        <x-state color="bg-red" icon="progress-alert" title="الحالات المعلقة" subtitle="بدون تشخيص" />
        <x-state color="bg-yellow" icon="user" title="الاعضاء" subtitle="إدارة المستخدم" />
        <x-state color="bg-blue" icon="building-bridge-2" title="إضافة مدينة" subtitle="مدينة جديدة" link="{{route('cities.create')}}"/>
        <x-state color="bg-red" icon="activity-heartbeat" title="مسار الحالة" subtitle="بيانات الحالة" />
    </div>
    <div class="row justify-content-center d-print-none">
        <x-state color="bg-green-lt" icon="circle-check" title="مكتمل" subtitle="{{ \App\Models\Patient::complete()->count() }}" />
        <x-state color="bg-blue-lt" icon="man" title="رجال" subtitle="{{ \App\Models\Patient::men()->count() }}" />
        <x-state color="bg-pink-lt" icon="woman" title="نساء" subtitle="{{ \App\Models\Patient::women()->count() }}" />
        <x-state color="bg-azure-lt" icon="baby-carriage" title="اطفال" subtitle="{{ \App\Models\Patient::children()->count() }}" />
        {{-- <x-state color="bg-yellow" title="" subtitle="4" link="{{route('roles.index')}}"  /> --}}
    </div>
</div>
@endsection
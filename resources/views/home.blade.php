@extends('layouts.app', ['page' => 'dashboard'])
@section('content')
<div class="container">
    <div class="row justify-content-center d-print-none">
        <x-state color="bg-green-lt" icon="circle-check" title="حالات مكتملة" subtitle="{{ \App\Models\Patient::complete()->count() }}" />
        <x-state color="bg-red-lt" icon="circle-x" title="حالات غير مكتملة" subtitle="{{ \App\Models\Patient::complete()->count() }}" />
        <x-state color="bg-blue-lt" icon="man" title="رجال" subtitle="{{ \App\Models\Patient::men()->count() }}" />
        <x-state color="bg-pink-lt" icon="woman" title="نساء" subtitle="{{ \App\Models\Patient::women()->count() }}" />
        <x-state color="bg-azure-lt" icon="baby-carriage" title="اطفال" subtitle="{{ \App\Models\Patient::children()->count() }}" />
    </div>
    <div class="row justify-content-center d-print-none">
        <x-state color="bg-yellow" icon="user" title="الاعضاء" subtitle="{{ \App\Models\User::count() }}" link="{{route('users.index')}}"/>
        <x-state color="bg-red" icon="building-hospital" title="المستشفيات" subtitle="{{ \App\Models\Hospital::count() }}" link="{{route('hospitals.index')}}"/>
        <x-state color="bg-blue" icon="building-bridge-2" title="المدن" subtitle="{{ \App\Models\City::count() }}" link="{{route('cities.index')}}"/>
    </div>
</div>
@endsection
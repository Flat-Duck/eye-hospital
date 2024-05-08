@props([
    'name',
    'label',
])

@if($label ?? null)
    @include('components.inputs.partials.label')
@endif

<textarea 
    id="{{ $name }}"
    name="{{ $name }}"
    rows="3"
    {{ ($required ?? false) ? 'required' : '' }}
    {{ $attributes->class(['form-control', 'is-invalid'=> $errors->has($name)]) }}
    autocomplete="off"
>{{$slot}}</textarea>

@error($name)
    @include('components.inputs.partials.error')
@enderror
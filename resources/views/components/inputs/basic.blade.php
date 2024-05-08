@props([
    'name',
    'label',
    'value',
    'type' => 'text',
    'min' => null,
    'max' => null,
    'step' => null,
])

@if($label ?? null)
    @include('components.inputs.partials.label')
@endif

<input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value ?? '') }}" {{ ($required ?? false) ? 'required' : '' }}
    {{ $min ? "min={$min}" : '' }}
    {{ $max ? "max={$max}" : '' }}
    {{ $step ? "step={$step}" : '' }}
    {{ $attributes->class(['form-control', 'is-invalid'=> $errors->has($name)]) }}
    autocomplete="off" >

@error($name)
    @include('components.inputs.partials.error')
@enderror
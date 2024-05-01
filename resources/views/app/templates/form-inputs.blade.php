@php $editing = isset($template) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="title"
            label="العنوان"
            :value="old('title', ($editing ? $template->title : ''))"
            maxlength="255"
            placeholder="العنوان"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="text" label="النص" maxlength="255" required
            >{{ old('text', ($editing ? $template->text : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="after"
            label="بعد عدد ايام"
            :value="old('after', ($editing ? $template->after : ''))"
            max="255"
            placeholder="بعد عدد ايام"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>

@php $editing = isset($diagnose) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="patient_id" label="Patient" required>
            @php $selected = old('patient_id', ($editing ? $diagnose->patient_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Patient</option>
            @foreach($patients as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="eye" label="Eye">
            @php $selected = old('eye', ($editing ? $diagnose->eye : 'Left')) @endphp
            <option value="Left" {{ $selected == 'Left' ? 'selected' : '' }} >Left</option>
            <option value="Right" {{ $selected == 'Right' ? 'selected' : '' }} >Right</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="BCVA"
            label="{{trans('crud.diagnoses.inputs.Bcva')}}"
            :value="old('BCVA', ($editing ? $diagnose->BCVA : ''))"
            maxlength="255"
            placeholder="Bcva"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="IOP"
            label="Iop"
            :value="old('IOP', ($editing ? $diagnose->IOP : ''))"
            maxlength="255"
            placeholder="Iop"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="LID"
            label="Lid"
            :value="old('LID', ($editing ? $diagnose->LID : ''))"
            maxlength="255"
            placeholder="Lid"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="conjunctiva"
            label="Conjunctiva"
            :value="old('conjunctiva', ($editing ? $diagnose->conjunctiva : ''))"
            maxlength="255"
            placeholder="Conjunctiva"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="cornea"
            label="Cornea"
            :value="old('cornea', ($editing ? $diagnose->cornea : ''))"
            maxlength="255"
            placeholder="Cornea"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="AC"
            label="Ac"
            :value="old('AC', ($editing ? $diagnose->AC : ''))"
            maxlength="255"
            placeholder="Ac"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="IrisPupil"
            label="Iris Pupil"
            :value="old('IrisPupil', ($editing ? $diagnose->IrisPupil : ''))"
            maxlength="255"
            placeholder="Iris Pupil"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="lens"
            label="Lens"
            :value="old('lens', ($editing ? $diagnose->lens : ''))"
            maxlength="255"
            placeholder="Lens"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="fundus"
            label="Fundus"
            :value="old('fundus', ($editing ? $diagnose->fundus : ''))"
            maxlength="255"
            placeholder="Fundus"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="remarks" label="Remarks" maxlength="255"
            >{{ old('remarks', ($editing ? $diagnose->remarks : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="diagnosis" label="Diagnosis" maxlength="255"
            >{{ old('diagnosis', ($editing ? $diagnose->diagnosis : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.partials.label
            name="OCT"
            label="Oct"
        ></x-inputs.partials.label
        ><br />

        <input type="file" name="OCT" id="OCT" class="form-control-file" />

        @if($editing && $diagnose->OCT)
        <div class="mt-2">
            <a href="{{ \Storage::url($diagnose->OCT) }}" target="_blank"
                ><i class="icon ion-md-download"></i>&nbsp;تحميل</a
            >
        </div>
        @endif @error('OCT') @include('components.inputs.partials.error')
        @enderror
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.partials.label name="US" label="Us"></x-inputs.partials.label
        ><br />

        <input type="file" name="US" id="US" class="form-control-file" />

        @if($editing && $diagnose->US)
        <div class="mt-2">
            <a href="{{ \Storage::url($diagnose->US) }}" target="_blank"
                ><i class="icon ion-md-download"></i>&nbsp;تحميل</a
            >
        </div>
        @endif @error('US') @include('components.inputs.partials.error')
        @enderror
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.partials.label
            name="pantacam"
            label="Pantacam"
        ></x-inputs.partials.label
        ><br />

        <input
            type="file"
            name="pantacam"
            id="pantacam"
            class="form-control-file"
        />

        @if($editing && $diagnose->pantacam)
        <div class="mt-2">
            <a href="{{ \Storage::url($diagnose->pantacam) }}" target="_blank"
                ><i class="icon ion-md-download"></i>&nbsp;تحميل</a
            >
        </div>
        @endif @error('pantacam') @include('components.inputs.partials.error')
        @enderror
    </x-inputs.group>
</div>

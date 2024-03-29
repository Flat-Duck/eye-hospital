@php $editing = isset($patient) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $patient->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="birth_date"
            label="Birth Date"
            value="{{ old('birth_date', ($editing ? optional($patient->birth_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="n_id"
            label="N Id"
            :value="old('n_id', ($editing ? $patient->n_id : ''))"
            maxlength="255"
            placeholder="N Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="gender" label="Gender">
            @php $selected = old('gender', ($editing ? $patient->gender : '')) @endphp
            <option value="male" {{ $selected == 'male' ? 'selected' : '' }} >Male</option>
            <option value="female" {{ $selected == 'female' ? 'selected' : '' }} >Female</option>
            <option value="other" {{ $selected == 'other' ? 'selected' : '' }} >Other</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="phone"
            label="Phone"
            :value="old('phone', ($editing ? $patient->phone : ''))"
            maxlength="255"
            placeholder="Phone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="escort_phone"
            label="Escort Phone"
            :value="old('escort_phone', ($editing ? $patient->escort_phone : ''))"
            maxlength="255"
            placeholder="Escort Phone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="city"
            label="City"
            :value="old('city', ($editing ? $patient->city : ''))"
            maxlength="255"
            placeholder="City"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="category"
            label="Category"
            :value="old('category', ($editing ? $patient->category : ''))"
            maxlength="255"
            placeholder="Category"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="hospital_id" label="Hospital" required>
            @php $selected = old('hospital_id', ($editing ? $patient->hospital_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Hospital</option>
            @foreach($hospitals as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="CO"
            label="Co"
            :value="old('CO', ($editing ? $patient->CO : ''))"
            maxlength="255"
            placeholder="Co"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="PMH"
            label="Pmh"
            :value="old('PMH', ($editing ? $patient->PMH : ''))"
            maxlength="255"
            placeholder="Pmh"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="PSH"
            label="Psh"
            :value="old('PSH', ($editing ? $patient->PSH : ''))"
            maxlength="255"
            placeholder="Psh"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="DM"
            label="Dm"
            :value="old('DM', ($editing ? $patient->DM : ''))"
            maxlength="255"
            placeholder="Dm"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="BP"
            label="Bp"
            :value="old('BP', ($editing ? $patient->BP : ''))"
            maxlength="255"
            placeholder="Bp"
        ></x-inputs.text>
    </x-inputs.group>
</div>

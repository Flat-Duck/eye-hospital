@php $editing = isset($patient) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="إسم الحالة"
            :value="old('name', ($editing ? $patient->name : ''))"
            maxlength="255"
            placeholder="إسم الحالة"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="birth_date"
            label="تاريخ  الميلاد"
            value="{{ old('birth_date', ($editing ? optional($patient->birth_date)->format('Y-m-d') : '')) }}"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="n_id"
            label="الرقم الوطني"
            :value="old('n_id', ($editing ? $patient->n_id : ''))"
            maxlength="255"
            placeholder="الرقم الوطني"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="gender" label="الجنس">
            @php $selected = old('gender', ($editing ? $patient->gender : '')) @endphp
            <option value="male" {{ $selected == 'male' ? 'selected' : '' }} >Male</option>
            <option value="female" {{ $selected == 'female' ? 'selected' : '' }} >Female</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="phone"
            label="رقم الهاتف"
            :value="old('phone', ($editing ? $patient->phone : ''))"
            placeholder="رقم الهاتف"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="escort_phone"
            label="رقم هاتف المرافق"
            :value="old('escort_phone', ($editing ? $patient->escort_phone : ''))"
            placeholder="رقم هاتف المرافق"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="city_id" label="المدينة" required>
            @php $selected = old('city_id', ($editing ? $patient->city_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>الرجاء اختيار المدينة</option>
            @foreach($cities as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    {{-- <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="city"
            label="City"
            :value="old('city', ($editing ? $patient->city : ''))"
            maxlength="255"
            placeholder="City"
            required
        ></x-inputs.text>
    </x-inputs.group> --}}

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="category"
            label="تصنيف الحالة"
            :value="old('category', ($editing ? $patient->category : ''))"
            maxlength="255"
            placeholder="تصنيف الحالة"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="hospital_id" label="المستشفى" required>
            @php $selected = old('hospital_id', ($editing ? $patient->hospital_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Hospital</option>
            @foreach($hospitals as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>

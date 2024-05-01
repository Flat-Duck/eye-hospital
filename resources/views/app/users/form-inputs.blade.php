@php $editing = isset($user) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="الاسم"
            :value="old('name', ($editing ? $user->name : ''))"
            maxlength="255"
            placeholder="الاسم"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="phone"
            label="رقم الهاتف"
            :value="old('phone', ($editing ? $user->phone : ''))"
            maxlength="255"
            placeholder="رقم الهاتف"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="البريد الإلكتروني"
            :value="old('email', ($editing ? $user->email : ''))"
            maxlength="255"
            placeholder="البريد الإلكتروني"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.password
            name="password"
            label="كلمة المرور"
            maxlength="255"
            placeholder="كلمة المرور"
            :required="!$editing"
        ></x-inputs.password>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="hospital_id" label="المستشفى" required>
            @php $selected = old('hospital_id', ($editing ? $user->hospital_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>الرجاء اختيار المستشفى</option>
            @foreach($hospitals as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.checkbox
            name="active"
            label="الحالة"
            :checked="old('active', ($editing ? $user->active : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <div class="form-group col-sm-12 mt-4">
        <h4>تعيين الصلاحيات</h4>

        @foreach ($roles as $role)
        <div>
            <x-inputs.checkbox
                id="role{{ $role->id }}"
                name="roles[]"
                label="{{ ucfirst($role->name) }}"
                value="{{ $role->id }}"
                :checked="isset($user) ? $user->hasRole($role) : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
</div>

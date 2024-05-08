@extends('layouts.guest')
@section('content')
    <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">{{ __('إنشاء حساب جديد') }}</h2>
            <form action="{{ route('register') }}" method="POST" autocomplete="off" novalidate>
                @csrf
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label class="form-label required">{{ __('الإسم') }}</label>
                    <input type="text" placeholder="الرجاء ادخال الاسم" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <x-inputs.group class="col-sm-12">
                    <x-inputs.select name="hospital_id" label="المستشفى" required>                        
                        <option disabled selected >الرجاء اختيار المستشفى</option>
                        @foreach($hospitals as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-inputs.select>
                </x-inputs.group>
            
                <div class="mb-3">
                    <label class="form-label required">{{ __('البريد الالكتروني') }}</label>
                    <input type="email" placeholder="الرجاء ادخال البريد الإلكتروني" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">{{ __('رقم الهاتف') }}</label>
                    <input type="text" placeholder="الرجاء ادخال رقم الهاتف" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                    @error('phone')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required ">{{ __('كلمة المرور') }}</label>
                    <div class="input-group input-group-flat @error('password') is-invalid @enderror">
                        <input type="password" placeholder="إدخل كلمة المرور" id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="عرض كلمة المرور" data-bs-toggle="tooltip">
                                عرض
                            </a>
                        </span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required">{{ __('تأكيد كلمة المرور') }}
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" placeholder="تأكيد كلمة المرور" id="password-confirm" class="form-control" name="password_confirmation" value="{{ old('password-confirm') }}" required autocomplete="new-password" autofocus>
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="عرض كلمة المرور" data-bs-toggle="tooltip">
                                عرض
                            </a>
                        </span>
                    </div>
                    @error('password_confirmation')
                        <span class="invalid-feedback" >
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                        <span class="form-check-label">Agree the <a href="./terms-of-service.html" tabindex="-1">terms and policy</a>.</span>
                    </label>
                </div> --}}
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">{{ __('تسجيل حساب جديد') }}</button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center text-secondary mt-3">
        لديك حساب مسبقاً؟<a href="{{ route('login') }}" tabindex="-1">تسجيل دخول</a>
    </div>
@endsection
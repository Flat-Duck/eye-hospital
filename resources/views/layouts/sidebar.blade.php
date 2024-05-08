<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}" >
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-home"></i>
                                </span>
                                <span class="nav-link-title">
                                    الرئيسية
                                </span>
                            </a>
                        </li>
                            @can('view-any', App\Models\User::class)
                                <li class="nav-item {{ $page == 'users'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('users.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Users -->
                                            <i class="ti ti-users"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            المستخدمين
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Hospital::class)
                                <li class="nav-item {{ $page == 'hospitals'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('hospitals.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Hospitals -->
                                            <i class="ti ti-building-hospital"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            المستشفيات
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Patient::class)
                                <li class="nav-item {{ $page == 'patients'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('patients.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Patients -->
                                            <i class="ti ti-emergency-bed"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            الحالات
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            {{-- @can('view-any', App\Models\Diagnose::class)
                                <li class="nav-item {{ $page == 'diagnoses'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('diagnoses.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Diagnoses -->
                                            <i class="ti ti-eye-cog"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            التشخيصات
                                        </span>
                                    </a>
                                </li>
                            @endcan --}}
                            @can('view-any', App\Models\City::class)
                                <li class="nav-item {{ $page == 'cities'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('cities.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Templates -->
                                            <!-- Templates Icon -->
                                            <i class="ti ti-building-bridge-2"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            المدن
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Template::class)
                                <li class="nav-item {{ $page == 'templates'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('templates.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Templates -->
                                            <!-- Templates Icon -->
                                            <i class="ti ti-template"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            القوالب
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                            Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#navbar-access" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-lock-access"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            الصلاحيات
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        @can('view-any', Spatie\Permission\Models\Role::class)
                                            <a class="dropdown-item" href="{{ route('roles.index') }}" rel="noopener">
                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                    <i class="ti ti-user-check"></i>
                                                </span>
                                                <span class="nav-link-title">
                                                    Roles
                                                </span>
                                            </a>
                                        @endcan
                                        @can('view-any', Spatie\Permission\Models\Permission::class)
                                            <a class="dropdown-item" href="{{ route('permissions.index') }}">
                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                    <i class="ti ti-key"></i>
                                                </span>
                                                <span class="nav-link-title">
                                                    Permissions
                                                </span>
                                            </a>
                                        @endcan
                                    </div>
                                </li>
                            @endif
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</header>
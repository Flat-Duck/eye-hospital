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
                                    Dashboard
                                </span>
                            </a>
                        </li>
                            @can('view-any', App\Models\User::class)
                                <li class="nav-item {{ $page == 'users'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('users.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Users -->
                                            <!-- Users Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            Users
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Hospital::class)
                                <li class="nav-item {{ $page == 'hospitals'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('hospitals.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Hospitals -->
                                            <!-- Hospitals Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            Hospitals
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Patient::class)
                                <li class="nav-item {{ $page == 'patients'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('patients.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Patients -->
                                            <!-- Patients Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            Patients
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Diagnose::class)
                                <li class="nav-item {{ $page == 'diagnoses'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('diagnoses.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Diagnoses -->
                                            <!-- Diagnoses Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            Diagnoses
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
                                            Access Management
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
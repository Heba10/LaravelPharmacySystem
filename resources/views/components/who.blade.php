

@if ( Auth::guard('web')->check() )

    {{-- <a class="nav-link" href="{{ route('user.logout') }}">
        {{ __('Logout') }}
    </a>   --}}
    <a href="{{ route('user.logout') }}" class="dropdown-item">
        Logout as user
    </a>

@endif


@if ( Auth::guard('admin')->check() )
    
    {{-- <a class="nav-link" href="{{ route('admin.logout') }}">
        {{ __('Logout') }}
    </a> --}}

    <a href="{{ route('admin.logout') }}" class="dropdown-item">
        Logout as admin
    </a>

@endif


@if ( Auth::guard('doctor')->check() )

    {{-- <a class="nav-link" href="{{ route('doctors.logout') }}">
        {{ __('Logout') }}
    </a> --}}

    <a href="{{ route('doctors.logout') }}" class="dropdown-item">
        Logout as doctor
    </a>

@endif


@if ( Auth::guard('pharmacy')->check() )

    {{-- <a class="nav-link" href="{{ route('pharmacy.logout') }}">
        {{ __('Logout') }}
    </a> --}}

    <a href="{{ route('pharmacy.logout') }}" class="dropdown-item">
        Logout as pharmacy
    </a>
@endif
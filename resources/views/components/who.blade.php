

@if ( Auth::guard('web')->check() )

    <a href="{{ route('user.logout') }}" class="dropdown-item">
        Logout as user
    </a>

@endif


@if ( Auth::guard('admin')->check() )
    
    <a href="{{ route('admin.logout') }}" class="dropdown-item">
        Logout as admin
    </a>

@endif


@if ( Auth::guard('doctor')->check() )

    <a href="{{ route('doctors.logout') }}" class="dropdown-item">
        Logout as doctor
    </a>

@endif


@if ( Auth::guard('pharmacy')->check() )

    <a href="{{ route('pharmacy.logout') }}" class="dropdown-item">
        Logout as pharmacy
    </a>
    
@endif
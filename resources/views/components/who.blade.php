

@if ( Auth::guard('web')->check() )

    <a class="nav-link" href="{{ route('admin.logout') }}">
        {{ __('Logout') }}
    </a>  

@endif


@if ( Auth::guard('admin')->check() )
    
    <a class="nav-link" href="{{ route('admin.logout') }}">
        {{ __('Logout') }}
    </a>

@endif


@if ( Auth::guard('doctor')->check() )
    Admin 
@endif


@if ( Auth::guard('pharmacy')->check() )
    Admin 
@endif
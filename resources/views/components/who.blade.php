@if ( Auth::guard('web')->check() )
    Normal User  
@endif

@if ( Auth::guard('admin')->check() )
    Admin 
@endif
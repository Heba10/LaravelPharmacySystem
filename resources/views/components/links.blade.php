

@if ( Auth::guard('admin')->check() )
  <li class="nav-item">
    <a href="{{ route('pharmacy.index') }}" class="nav-link">
      <i class="nav-icon fas fa-th"></i>
      <p>
        Pharmacies
      </p>
    </a>
  </li>
@endif

@if ( Auth::guard('admin')->check() | Auth::guard('pharmacy')->check())
  <li class="nav-item">
    <a href="{{ route('doctors.index') }}" class="nav-link">
      <i class="nav-icon fas fa-th"></i>
      <p>
        Doctors
      </p>
    </a>
  </li>
@endif

@if ( Auth::guard('admin')->check() | Auth::guard('pharmacy')->check() | Auth::guard('doctor')->check())
  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-th"></i>
      <p>
        Orders
      </p>
    </a>
  </li>
@endif

<header class="bg-light py-4 border-bottom top-header">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ asset('assets/images/UGV-Logo-01.png') }}" alt="Logo" style="width: 300px;">
        </a>
        <!-- Menu Button for Mobile -->
        <button class="btn btn-outline-dark d-md-none" type="button" data-bs-toggle="offcanvas" style="width: 100px;"
            data-bs-target="#mobileMenu" aria-controls="mobileMenu">
            <i class="fas fa-bars"></i> Menu
        </button>
        <!-- Search Bar -->
        <div class="position-relative searchbar mt-3 mt-md-0">
            <form action="{{ route('search') }}" method="GET">
                <input class="form-control border-dark" type="search" placeholder="Search" aria-label="Search"
                    name="query" style="height: 42px; padding-right: 50px; width: 100%;">
                <button type="submit" class="btn btn-dark position-absolute top-0 end-0"
                    style="height: 42px; width: 42px; border-radius: 0 0.375rem 0.375rem 0;">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
</header>

@php
    $faculties = App\Models\Faculty::all();
  
    // $menu = Biostate\FilamentMenuBuilder\DTO\Menu::where('slug', 'navbar')->first();
    // dd($menu);


@endphp

<header class="bg-danger sticky-top d-none d-md-block">
    <div class="container">
        <nav class="d-flex align-items-center">
            <x-filament-menu-builder::menu slug="navbar" view="filament-menu-builder::components.bootstrap5.menu"/>
            {{-- <ul class="nav mt-0" style="margin-left: 0;">
                <li class="nav-item m-0 border-right px-1">
                    <a href="{{ route('home') }}" class="nav-link text-white px-3 py-4"
                        style="transition: background 0.3s;">
                        <i class="fas fa-home me-2"></i>Home
                    </a>
                </li>
                <li class="nav-item dropdown m-0 border-right px-1">
                    <a href="#" class="nav-link dropdown-toggle text-white px-3 py-4" id="adminDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false"
                        style="transition: background 0.3s;">
                        <i class="fas fa-cogs me-2"></i>Administration
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                        <li><a class="dropdown-item" href="#">Administration Overview</a></li>
                        <li><a class="dropdown-item" href="#">Policies</a></li>
                        <li><a class="dropdown-item" href="#">Leadership</a></li>
                    </ul>
                </li>

                <!-- Courses with Submenu -->
                <li class="nav-item dropdown m-0 border-right px-1">
                    <a href="#" class="nav-link dropdown-toggle text-white px-3 py-4" id="coursesDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false"
                        style="transition: background 0.3s;">
                        <i class="fas fa-book me-2"></i>Courses
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="coursesDropdown">
                        <li><a class="dropdown-item" href="#">Undergraduate</a></li>
                        <li><a class="dropdown-item" href="#">Postgraduate</a></li>
                        <li><a class="dropdown-item" href="#">Short Courses</a></li>
                    </ul>
                </li>

                <!-- Departments with Submenu -->
                <li class="nav-item dropdown m-0 border-right px-1">
                    <a href="#" class="nav-link dropdown-toggle text-white px-3 py-4" id="departmentsDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false"
                        style="transition: background 0.3s;">
                        <i class="fas fa-building me-2"></i>Departments
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="departmentsDropdown">
                        @foreach ($faculties as $faculty)
                            <li><a class="dropdown-item"
                                    href="{{ route('faculty', $faculty) }}">{{ $faculty->name }}</a></li>
                        @endforeach


                    </ul>
                </li>
                <li class="nav-item m-0 border-right px-1">
                    <a href="" class="nav-link text-white px-3 py-4" style="transition: background 0.3s;">
                        <i class="fas fa-user-tie me-2"></i>Faculty & Staff
                    </a>
                </li>
                <li class="nav-item m-0 border-right px-1">
                    <a href="" class="nav-link text-white px-3 py-4" style="transition: background 0.3s;">
                        <i class="fas fa-money-check-alt me-2"></i>Fee & Finance
                    </a>
                </li>

                <li class="nav-item m-0 border-right px-1">
                    <a href="{{ route('events') }}" class="nav-link text-white px-3 py-4"
                        style="transition: background 0.3s;">
                        <i class="fas fa-calendar-alt me-2"></i>Events
                    </a>
                </li>
                <li class="nav-item m-0 border-right px-1">
                    <a href="" class="nav-link text-white px-3 py-4" style="transition: background 0.3s;">
                        <i class="fas fa-phone-alt me-2"></i>Contact
                    </a>
                </li>
                <li class="nav-item m-0 border-right px-1">
                    <a href="" class="nav-link text-white px-3 py-4" style="transition: background 0.3s;">
                        <i class="fas fa-user-plus me-2"></i>How to Apply
                    </a>
                </li>
            </ul> --}}
        </nav>
    </div>
</header>
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileMenuLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Administration</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Courses</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Departments</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Faculty & Staff</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Fee & Finance</a></li>
            <li class="nav-item"><a href="{{ route('events') }}" class="nav-link">Events</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="#" class="nav-link">How to Apply</a></li>
        </ul>
    </div>
</div>

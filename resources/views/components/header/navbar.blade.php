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
            <form onsubmit="return searchGoogle();">
                <input id="search-query" class="form-control border-dark" type="search" placeholder="Search"
                    aria-label="Search" style="height: 42px; padding-right: 50px; width: 100%;">
                <button type="submit" class="btn btn-dark position-absolute top-0 end-0"
                    style="height: 42px; width: 42px; border-radius: 0 0.375rem 0.375rem 0;">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

    </div>
</header>


<header class="bg-danger sticky-top d-none d-md-block">
    <div class="container">
        <nav class="d-flex align-items-center">
            <x-filament-menu-builder::menu slug="navbar" view="filament-menu-builder::components.bootstrap5.menu" />

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
            <x-filament-menu-builder::menu slug="navbar" view="filament-menu-builder::components.bootstrap5.menu" />

        </ul>
    </div>
</div>

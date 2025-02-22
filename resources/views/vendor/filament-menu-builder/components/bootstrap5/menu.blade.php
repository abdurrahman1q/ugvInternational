<ul class="nav mt-0" style="margin-left: 0;">
        @if ($menuItems && $menuItems->isNotEmpty())
            @foreach ($menuItems as $menuItem)
                @include('filament-menu-builder::components.bootstrap5.menu-item', ['item' => $menuItem])
            @endforeach
        @endif
</ul>

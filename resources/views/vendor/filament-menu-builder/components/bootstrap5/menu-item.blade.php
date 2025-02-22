<li class="nav-item m-0 border-right px-1 {{ $item->wrapper_class }} @if (!$item->children->isEmpty()) dropdown @endif">
    @if ($item->children->isEmpty())
        <a target="{{ $item->target }}" class="nav-link text-white px-3 py-4 {{ $item->link_class }}"
            href="{{ $item->link }}" style="font-size: 14px">
            @if ($item->parameters->has('icon'))
                <i class="{{ $item->parameters['icon'] }} me-2"></i>
            @endif
            {{ $item->name }}
        </a>
    @else
        <a class="nav-link text-white px-3 py-4 dropdown-toggle {{ $item->link_class }}" href="{{ $item->link }}"
            style="font-size: 14px" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="{{ $item->parameters['icon'] }} me-2"></i> {{ $item->name }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($item->children as $child)
                @include('filament-menu-builder::components.bootstrap5.menu-sub-item', ['item' => $child])
            @endforeach
        </ul>
    @endif
</li>

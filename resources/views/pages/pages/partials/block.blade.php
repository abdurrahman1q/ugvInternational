@if ($block['type'] === 'text')
    <p>{{ $block['data']['content'] }}</p>
@elseif ($block['type'] === 'image')
    <div class="text-center">
        <img src="{{ asset('storage/' . $block['data']['image']) }}" class="img-fluid rounded">
        @if (!empty($block['data']['caption']))
            <p class="text-muted mt-2">{{ $block['data']['caption'] }}</p>
        @endif
    </div>
@endif

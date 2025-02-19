<div style="display: flex; gap: 10px;">
    @if (isset($images) && count($images))
        @foreach ($images as $img)
            @if (isset($img['image']))
                <img src="{{ $img['image'] }}" alt="{{ $img['caption'] ?? 'Gallery image' }}" style="max-width: 100px;">
            @endif
        @endforeach
    @else
        <p>No images in gallery.</p>
    @endif
</div>

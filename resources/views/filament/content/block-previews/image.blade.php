<div>
    @if(isset($image))
        <img src="{{ $image }}" alt="{{ $caption ?? 'Image' }}" style="max-width: 100%;">
    @else
        <p>No image uploaded.</p>
    @endif
</div>

<div>
    <h3>Slider (Autoplay: {{ $autoplay ?? 'yes' }})</h3>
    @if (isset($slides) && count($slides))
        <div style="display: flex; gap: 10px;">
            @foreach ($slides as $slide)
                @if (isset($slide['image']))
                    <img src="{{ $slide['image'] }}" alt="{{ $slide['caption'] ?? 'Slide' }}" style="max-width: 100px;">
                @endif
            @endforeach
        </div>
    @else
        <p>No slides added.</p>
    @endif
</div>

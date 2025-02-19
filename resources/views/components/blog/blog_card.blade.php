<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="rts__single--event v__2">
        <div class="rts__single--event--thumb">
            <a href="{{ route('blog.details', $blog) }}">         
                <img src="{{ $blog->getImage() }}" alt="event" width="360" height="260"
                    style="aspect-ratio: 360/260;">
            </a>
        </div>
        <div class="rts__single--event--meta">
            <div class="rts__single--event--meta--dl">
                <span class="date">
                    <img src="assets/images/icon/calendar.svg" alt="">
                    <span>{{ $blog->published_at->format('d M Y') }}</span>
                </span>
                {{-- <span class="location">
                    <i class="fa-sharp fa-light fa-location-dot"></i>
                    <span>{{ $blog->location ?? 'Barishal, barishal' }}</span>
                </span> --}}
            </div>
            <h5 class="rts__single--event--meta--title">
                <a href="{{ route('blog.details', $blog) }}">
                    {{ $blog->title }}</a>
            </h5>
            <a href="{{ route('blog.details', $blog) }}" class="rts__round--btn">
                <i class="fa-light fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

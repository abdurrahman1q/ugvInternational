<div>
    @if(isset($video_url))
        <a href="{{ $video_url }}" target="_blank">View Video</a>
    @else
        <p>No video URL provided.</p>
    @endif
</div>

<x-layouts.master>
    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg"
        style="background-image: url({{ asset('assets/images/banner/breadcrumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Events Details</li>
                        </ul>
                        <h2 class="section-title">{{ $event->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->



    <!-- event details -->
    <div class="rts-event-details pt--120">
        <div class="container">
            <div class="row justify-content-md-center justify-content-start">
                <div class="col-lg-7 col-md-10">
                    <div class="event-details">
                        <div class="event-details__content">
                            <div class="event-details__content--thumb">
                                <img src="{{ $event->getImage() }}" alt="event details">
                            </div>
                            <div class="event-details__content--text">
                                <div class="rts-section">
                                    <h4 class="rts-section-title">About The Event</h4>
                                    <p class="description">
                                        {!! $event->description !!}
                                    </p>
                                </div>
                            </div>
            
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-10">
                    <div class="event-sidebar">
                     
                        <div class="event-venue mt--50">
                            <h5 class="rts-section-title">Event Information</h5>
                            <div class="event-venu-information">
                                @if ($event->start_date)
                                    <div class="event-count-down mb-3">
                                        <div class="count-item">
                                            <p><span id="days"></span>day</p>
                                        </div>
                                        <div class="count-item">
                                            <p><span id="hours"></span>hours</p>
                                        </div>
                                        <div class="count-item">
                                            <p><span id="minutes"></span>minute</p>
                                        </div>
                                        <div class="count-item">
                                            <p><span id="seconds"></span>second</p>
                                        </div>
                                    </div>
                                @endif

                                <div class="single-info">
                                    <div class="info-repeat">
                                        <div class="left-side">
                                            <span><i class="fa-regular fa-calendar-week"></i></span>
                                            Date:
                                        </div>
                                        <div class="right-side">
                                            <span class="desc">{{ $event->start_date->format('F d, Y') }}</span>
                                            @if ($event->end_date)
                                                - {{ $event->end_date->format('F d, Y') }}
                                            @endif
                                        </div>
                                    </div>

                                    @if ($event->venue_name)
                                        <div class="info-repeat">
                                            <div class="left-side bold">Venue:</div>
                                            <div class="right-side">
                                                <span class="desc">{{ $event->venue_name }}</span>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($event->location)
                                        <div class="info-repeat">
                                            <div class="left-side bold">Location:</div>
                                            <div class="right-side">
                                                <span class="desc location">{{ $event->location }}</span>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($event->phone)
                                        <div class="info-repeat">
                                            <div class="left-side bold">Phone Number:</div>
                                            <div class="right-side">
                                                <span class="desc"><a
                                                        href="tel:{{ preg_replace('/[^0-9+]/', '', $event->phone) }}">{{ $event->phone }}</a></span>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($event->website || $event->social_links)
                                        <div class="info-repeat">
                                            <div class="left-side bold">Web Site:</div>
                                            <div class="right-side">
                                                <span class="desc">
                                                    @if ($event->website)
                                                        <a href="{{ $event->website }}" target="_blank">
                                                            {{ parse_url($event->website, PHP_URL_HOST) }}
                                                        </a>
                                                    @endif


                                                    @if ($event->social_links)
                                                        @php
                                                            $socialLinks = $event->social_links;
                                                        @endphp
                                                        @if ($socialLinks)
                                                            <span class="social-links">
                                                                @if (isset($socialLinks['facebook']))
                                                                    <a href="{{ $socialLinks['facebook'] }}"
                                                                        target="_blank"><i
                                                                            class="fa-brands fa-facebook"></i></a>
                                                                @endif
                                                                @if (isset($socialLinks['instagram']))
                                                                    <a href="{{ $socialLinks['instagram'] }}"
                                                                        target="_blank"><i
                                                                            class="fa-brands fa-instagram"></i></a>
                                                                @endif
                                                                @if (isset($socialLinks['linkedin']))
                                                                    <a href="{{ $socialLinks['linkedin'] }}"
                                                                        target="_blank"><i
                                                                            class="fa-brands fa-linkedin"></i></a>
                                                                @endif
                                                                @if (isset($socialLinks['pinterest']))
                                                                    <a href="{{ $socialLinks['pinterest'] }}"
                                                                        target="_blank"><i
                                                                            class="fa-brands fa-pinterest"></i></a>
                                                                @endif
                                                                @if (isset($socialLinks['youtube']))
                                                                    <a href="{{ $socialLinks['youtube'] }}"
                                                                        target="_blank"><i
                                                                            class="fa-brands fa-youtube"></i></a>
                                                                @endif
                                                            </span>
                                                        @endif
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
       
            @if ($event->map_embed_url)
                <div class="row">
                    <div class="event-location mt--60">
                        <div class="rts-section">
                            <h3 class="rts-section-title">
                                The Event Location
                            </h3>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="event-location-map">
                            <iframe class="event-location-map-iframe" src="{{ $event->map_embed_url }}"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- event details end -->


    <!-- university event list -->
    <div class="rts-event rts-section-padding">
        <div class="container">
            <div class="row">
                <div class="rts-section mb--40">
                    <h3 class="rts-section-title">Related Event</h3>
                </div>
            </div>
            <div class="row justify-content-center justify-content-md-start g-5">

                @foreach ($related_events as $event)
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="single-event">
                            <div class="event single-event__content">
                                <div class="event__thumb">
                                    <img src="{{ $event->getImage() }}" alt="{{ $event->title }}">
                                </div>
                                <div class="event__meta">
                                    <div class="event__meta--da">
                                        <div class="event-date">
                                            <span><i class="fal fa-calendar"></i></span>
                                            <span>{{ $event->start_date->format('d M Y') }}</span>
                                        </div>
                                        <div class="event-time">
                                            <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                                            <span>{{ $event->start_date->format('H:i:a') }}</span>
                                        </div>
                                    </div>
                                    <h5 class="event__title"> <a
                                            href="{{ route('event.details', $event) }}">{{ $event->title }}</a></h5>
                                </div>
                                <div class="event-place">
                                    <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                                    <span>{{ $event->location }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- university event list end -->
    {{-- @dd($event->start_date) --}}

    @push('script')
        <script>
            console.log("{{ $event->start_date }}");

            // Countdown Timer
            function updateCountdown() {
                const eventDate = new Date("{{ $event->start_date }}").getTime();
                const now = new Date().getTime();
                const distance = eventDate - now;

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("days").innerHTML = days;
                document.getElementById("hours").innerHTML = hours;
                document.getElementById("minutes").innerHTML = minutes;
                document.getElementById("seconds").innerHTML = seconds;

                if (distance < 0) {
                    clearInterval(countdownTimer);
                    document.querySelector(".event-count-down").style.display = "none";
                }
            }

            const countdownTimer = setInterval(updateCountdown, 1000);
            updateCountdown();
        </script>
    @endpush
</x-layouts.master>

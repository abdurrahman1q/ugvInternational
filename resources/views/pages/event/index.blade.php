<x-layouts.master>
    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg"
        style="background-image: url({{ asset('assets/images/banner/breadcrumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Events</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->

    <!-- university event list -->
    <div class="rts-event rts-section-padding">
        <div class="container">
            <div class="row justify-content-sm-center justify-content-md-start g-5">
                <!-- single event item -->
                @foreach ($events as $event)
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="single-event">
                            <div class="event single-event__content">
                                <div class="event__thumb">
                                    <img src="{{ $event->getImage() }}" alt="event thumbnail" height="250"
                                        style="aspect-ratio: 360/260;">
                                </div>
                                <div class="event__meta">
                                    <div class="event__meta--da">
                                        <div class="event-date">
                                            <span><i class="fal fa-calendar"></i></span>
                                            <span>{{ $event->start_date->format('d M Y') }}</span>
                                        </div>
                                        <div class="event-time">
                                            <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                                            <span>{{ $event->start_date->format('g:i:a') }}</span>
                                        </div>
                                    </div>
                                    <h5 class="event__title"> <a
                                            href="{{ route('event.details', $event) }}">{{ $event->title }}</a></h5>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- single event item end -->


            </div>
            <div class="rts-load-more-btn rt-center mt--60">
                {{ $events->links() }}
                {{-- <a href="#" class="rts-theme-btn primary primary lh-100">Load More</a> --}}
            </div>
        </div>
    </div>
    <!-- university event list end -->

</x-layouts.master>

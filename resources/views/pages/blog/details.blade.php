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
                            <li class="breadcrumb-item active" aria-current="page">blogs</li>
                        </ul>
                        <h2 class="section-title">{{ $blog->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->

    <!-- breadcrumb end -->

    <!-- blog details -->
    <div class="rts-blog-details rts-section-padding">
        <div class="container">
            <div class="row sticky-coloum-wrap justify-content-center g-5">
                <div class="col-lg-8 col-md-10">
                    <article class="blog-details">
                        <div class="blog-details__featured-image">
                            <img src="{{ $blog->getImage() }}" alt="{{ $blog->title }}"
                                style="width: 100%; height: 100%;">
                        </div>
                        <div class="blog-details__article-meta mt--40">
                            <span><span><i
                                        class="fa-light fa-clock"></i></span>{{ $blog->published_at->format('d M Y H:i:a') }}</span>
                        </div>
                        <h3 class="blog-title">{{ $blog->title }}</h3>
                        <p>{{ $blog->content }}</p>
                    </article>
                    <div class="blog-info">
                        {{-- <div class="blog-tags">
                            <div class="tags-title">tags:</div>
                            <div class="blog-tags__list">
                                <a href="#">Education</a>
                                <a href="#">Admission</a>
                                <a href="#">Study</a>
                                <a href="#">Scholarship</a>
                            </div>
                        </div> --}}
                        <div class="blog-share">
                            <div class="share">Share:</div>
                            <div class="social__media--list">
                                <a href="#" class="media"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#" class="media"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#" class="media"><i class="fa-brands fa-linkedin"></i></a>
                                <a href="#" class="media"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#" class="media"><i class="fa-brands fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="blog-author">
                        <div class="blog-author__info">
                            <div class="author-image">
                                <img src="{{ asset('assets/images/author/02.png') }}" alt="">
                            </div>
                            <div class="author-content">
                                <a href="#">Maria Sara Khan</a>
                                <p>Unipix University brings expertise, passion, and dedication to shaping future minds.
                                </p>
                                <div class="social__media--list">
                                    <a href="#" class="media"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="#" class="media"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#" class="media"><i class="fa-brands fa-linkedin"></i></a>
                                    <a href="#" class="media"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="media"><i class="fa-brands fa-behance"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="mt-3">
                        <h4>Related Blogs</h4>
                        <div class="row row-cols-1 row-cols-md-3 g-4 ">
                            @foreach ($related_blogs as $blog)
                                <div class="col">
                                    <div class="card h-100 shadow-sm border-0">
                                        <img src="{{ $blog->getImage() }}" class="card-img-top"
                                            alt="{{ $blog->title }}" style="object-fit: cover; height: 150px;">
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <a href="{{ route('blog.details', $blog) }}"
                                                    class="text-dark text-decoration-none">
                                                    {{ Str::limit($blog->title, 50) }}
                                                </a>
                                            </h6>
                                            <p class="card-text text-muted">{{ Str::limit($blog->description, 80) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
                <div class="col-lg-4 col-md-10 sticky-coloum-item">
                    <div class="program-sidebar">
                        <!-- curriculum -->
                        {{-- <div class="program-curriculum">
                            <h6 class="heading-title">Category</h6>
                            <div class="program-menu">
                                <ul class="list-unstyled">
                                    <li><a href="#"><span><i class="fa-light fa-arrow-right"></i></span>Course
                                            Curriculum</a></li>
                                    <li><a href="#"><span><i class="fa-light fa-arrow-right"></i></span>Program
                                            Faculty</a></li>
                                    <li><a href="#"><span><i class="fa-light fa-arrow-right"></i></span>Study
                                            Aboard</a></li>
                                    <li><a href="#"><span><i
                                                    class="fa-light fa-arrow-right"></i></span>Scholarship </a></li>
                                    <li><a href="#"><span><i
                                                    class="fa-light fa-arrow-right"></i></span>Education Expo</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- contact info -->
                        <div class="program-info">
                            <h5>Department Contact Info</h5>
                            <p>B.A. in Africana Studies</p>
                            <div class="contact-info">
                                <h5>Contact:</h5>
                                <a href="mailto:barry.Unipix@info.com">barry.Unipix@info.com</a>
                                <a href="callto:121">664-254-251</a>
                            </div>
                            <div class="social-info">
                                <h5>Social Info:</h5>
                                <div class="social-info-link">
                                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                </div>
                            </div>
                        </div> --}}

                        <!-- join event -->
                        <div class="program-event">
                            <div class="program-event-content">
                                <p>Join New Event
                                </p>
                                <h4 class="event-title">{{ $random_upcoming_event->title }}</h4>
                                <div class="single-event-content-meta">
                                    <div class="event-time">
                                        <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                                        <span>{{ $random_upcoming_event->start_date->format('H:i:a') }}</span>
                                    </div>
                                    <div class="event-place">
                                        <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                                        <span>{{ $random_upcoming_event->location }}</span>
                                    </div>
                                    <div class="event-date">
                                        <span><i class="fal fa-calendar"></i></span>
                                        <span>{{ $random_upcoming_event->start_date->format('d M Y') }}</span>
                                    </div>
                                </div>
                                <a href="{{ route('event.details', $random_upcoming_event) }}"
                                    class="rts-theme-btn with-arrow btn-white lh-100">Joint Now <span><i
                                            class="fa-thin fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog details end -->
</x-layouts.master>

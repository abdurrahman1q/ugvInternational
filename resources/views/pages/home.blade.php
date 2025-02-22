@push('style')
    <style>
        .notice-card {
            border: none;
            border-radius: 12px;
            padding: 1.25rem;
            background: #dc3545;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 5px;
        }

        .notice-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .date-widget {
            width: 70px;
            height: 70px;
            background: #fff;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .date-widget::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(13, 110, 253, 0.1));
            transform: rotate(45deg);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .notice-card:hover .date-widget::before {
            opacity: 1;
        }

        .date-day {
            font-size: 1.75rem;
            font-weight: 700;
            color: #0d6efd;
            line-height: 1;
            transition: color 0.3s ease;
        }

        .date-month {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6c757d;
            transition: color 0.3s ease;
        }

        .notice-card:hover .date-day {
            color: #0b5ed7;
        }

        .notice-card:hover .date-month {
            color: #495057;
        }

        .notice-content {
            flex: 1;
        }

        .notice-title {
            font-weight: 500;
            margin-bottom: 0.25rem;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            color: white
        }

        @media (max-width: 768px) {
            .notice-grid {
                grid-template-columns: 1fr;
            }
        }

        .notice-slider {
            padding: 20px 0;
        }


        .viewAllNotices {
            font-size: 2rem;
            font-weight: 500;
            color: #0d6efd;
            transition: color 0.3s ease;
        }
    </style>
@endpush
<x-layouts.master>

    <x-banner />
    <section class="rts-notice rts-section-padding rts-section-padding">
        <div class="container">
            <div class="row gy-5 gy-lg-0 justify-content-md-center">
                <div class="col-md-11 col-lg-7">
                    <div class="rts-event-section">
                        <div class="rts-section rt-between pb--25 rts-border-bottom-2">
                            <h4 class="rts-section-title">Events</h4>
                            <a href="{{ route('events') }}" class="rts-arrow">View All <span><i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                        </div>
                        <div class="rts-event-section-content">
                            <ul class="list-unstyled rts-counter">
                                @foreach ($events as $event)
                                    <li class="single-event">
                                        <div class="single-event-counter">
                                            <div class="count-number rt-clip-text"></div>
                                        </div>
                                        <div class="single-event-content">
                                            <a href="{{ route('event.details', $event) }}">
                                                <h5 class="event-title">{{ $event->title }}</h5>
                                            </a>
                                            <div class="single-event-content-meta">
                                                <div class="event-date">
                                                    <span><i class="fal fa-calendar"></i></span>
                                                    <span>{{ $event->start_date->format('d M Y') }}</span>
                                                </div>
                                                <div class="event-time">
                                                    <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                                                    <span>{{ $event->start_date->format('h:i A') }}</span>

                                                </div>
                                                <div class="event-place">
                                                    <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                                                    <span>{{ $event->location ?? '' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-11 col-lg-5">
                    <div class="rts-notice-section">
                        <div class="rts-section rt-between pb--25 rts-border-bottom-2">
                            <h4 class="rts-section-title">Notice</h4>
                            <a href="{{ route('notices') }}" class="rts-arrow">View All
                                <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                            </a>
                        </div>

                        <div class="rts-tab">
                            <ul class="nav nav-pills pb--30" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">Latest</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Exam</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Admission</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <ul class="list-unstyled notice-content-box">
                                        @foreach ($notices->where('type', 'general') as $notice)
                                            <li class="single-notice">
                                                <div class="single-notice-item">
                                                    @if ($notice->published_at)
                                                        <div class="notice-date">
                                                            {{ $notice->published_at->format('d') }}
                                                            <span>{{ $notice->published_at->format('M') }}</span>
                                                        </div>
                                                    @else
                                                        <div class="notice-date">
                                                            --- <span>---</span>
                                                        </div>
                                                    @endif
                                                    <div class="notice-content">
                                                        <p>
                                                            <a href="{{ route('notices.show', $notice) }}">
                                                                {{ $notice->title }}
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <ul class="list-unstyled notice-content-box">
                                        @foreach ($notices->where('type', 'exam') as $notice)
                                            <li class="single-notice">
                                                <div class="single-notice-item">
                                                    @if ($notice->published_at)
                                                        <div class="notice-date">
                                                            {{ $notice->published_at->format('d') }}
                                                            <span>{{ $notice->published_at->format('M') }}</span>
                                                        </div>
                                                    @else
                                                        <div class="notice-date">
                                                            --- <span>---</span>
                                                        </div>
                                                    @endif
                                                    <div class="notice-content">
                                                        <p>
                                                            <a href="{{ route('notices.show', $notice) }}">
                                                                {{ $notice->title }}
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <ul class="list-unstyled notice-content-box">
                                        @foreach ($notices->where('type', 'admission') as $notice)
                                            <li class="single-notice">
                                                <div class="single-notice-item">
                                                    @if ($notice->published_at)
                                                        <div class="notice-date">
                                                            {{ $notice->published_at->format('d') }}
                                                            <span>{{ $notice->published_at->format('M') }}</span>
                                                        </div>
                                                    @else
                                                        <div class="notice-date">
                                                            --- <span>---</span>
                                                        </div>
                                                    @endif
                                                    <div class="notice-content">
                                                        <p>
                                                            <a href="{{ route('notices.show', $notice) }}">
                                                                {{ $notice->title }}
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="program rts-section-padding">
        <div class="container">
            <div class="row rt-center">
                <div class="col-sm-12">
                    <div class="rts__section--wrapper v__5">
                        <h2 class="rts__section--title">Academics & Program</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center g-0">
                <div class="col-lg-6 col-md-10">

                    <div class="program__single--item">
                        <div class="program__single--item--bg">
                            <img src="assets/images/program/program__bg.jpg" alt="">
                        </div>
                        {{-- <h5 class="program__single--item--title">Academic Programs</h5> --}}

                        <ul class="program__single--item--list">
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Bachelor of Business Administration
                                    (BBA)
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Bachelor of Arts (Hon's) in English
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Masters of Business Administration
                                    (MBA)
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Master of Public Health (MPH)
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Executive Masters of Business
                                    Administration (EMBA)
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10">
                    <div class="program__single--item">
                        <div class="program__single--item--bg">
                            <img src="assets/images/program/program__bg.jpg" alt="">
                        </div>
                        {{-- <h5 class="program__single--item--title">Graduate & Other Programs</h5> --}}

                        <ul class="program__single--item--list">
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">BSc in Computer Science & Engineering
                                    (CSE)
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">BSc in Electrical & Electronics
                                    Engineering (EEE)
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">BSc in Civil Engineering (CE)
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">B.Sc Mechanical Engineering (ME)
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="program__single--item--list--item">
                                <a href="program-single.html" class="link__list">Diploma in Cyber Security
                                    <span><i class="fa-regular fa-arrow-right"></i></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- <div class="rts-campus pt--100 rts-campus-bg mobile-padding moving">
        <div class="container">
            <div class="row justify-content-sm-center justify-content-lg-start">
                <div class="col-lg-6 col-xl-5 col-md-10 col-sm-11">
                    <div class="rts-left-section">
                        <h2 class="section-title rt-white mb--55">
                            Embark on a Journey: Unveiling the Story of University of Global Village
                        </h2>
                        <a href="" class="about-btn rts-nbg-btn btn-arrow 
                rt-white">Learn
                            More <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>

                    </div>
                </div>
                <div class="col-lg-6 col-xl-7 col-md-10 col-sm-11">
                    <div class="rts-right-section rt-relative">
                        <p class="rt-white mb--40">Embark on a journey of knowledge, discovery, and growth at University
                            of Global Village. Our admissions process is designed to identify bright, motivated
                            individuals who
                            are
                            eager to contribute to our dynamic academic community.</p>
                        <img class="round" src="assets/images/feature/01.jpg" alt="campus images">
                        <div class="rts-round-shape"></div>
                    </div>
                </div>
            </div>
            <div class="bottom-text rt-clip-text">About University</div>
            <div class="rt-shape">
                <img class="rt-shape__1" data-speed="0.04" src="assets/images/feature/shape/01.png" alt="">
                <img class="shape rt-shape__2" data-speed="0.04" src="assets/images/feature/shape/02.png"
                    alt="">
                <img class="shape rt-shape__3" data-speed="0.04" src="assets/images/feature/shape/03.png"
                    alt="">
                <img class="shape rt-shape__4" data-speed="0.04" src="assets/images/feature/shape/04.png"
                    alt="">
            </div>
        </div>
    </div>

    <section class="tution v__2 rts-section-padding">
        <div class="container">
            <div class="row justify-content-sm-center justify-content-md-start align-items-center g-5">
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="rts__section--wrapper v__7">
                        <h2 class="rts__section--title">Tuition Fees at
                            University of Global Village</h2>
                        <p class="rts__section--description">
                            At University of Global Village Name we are committed to providing a high-quality education
                            that is
                            accessible to a diverse range of students.
                        </p>
                        <a href="" class="rts-theme-btn btn-arrow">Plan Details
                            <span><i class="fa-regular fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
                <x-cards.tuition_fee />
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="tution__single--box">
                        <h5 class="tution__single--box--title">Graduate Programs</h5>
                        <h6 class="tution__single--box--faculty">Graduate School/Department</h6>
                        <ul class="tution__single--box--feature">
                            <li>Full-Time Tuition (per semester): $241</li>
                            <li>Part-Time Tuition (per credit): $141</li>
                        </ul>
                        <h6 class="tution__single--box--faculty">Additional Fees</h6>
                        <ul class="tution__single--box--feature">
                            <li>Technology Fee: $149 per semester</li>
                            <li>Student Activity Fee: $99 per semester</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="campus v__2 pt--120 pb--60">
        <div class="container">
            <div class="campus__wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="campus__link">
                            <a href="" class="campus__link--btn">
                                Campus Life
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="campus__right--text">
                            <h2 class="campus__right--text--title">
                                Thriving Beyond Classes Campus Life at unipix
                            </h2>
                            <p class="campus__right--text--description">
                                Step into a World of Possibilities: Unipix Campus Life is a Hub of Energy, Creativity,
                                and Collaboration. Discover a Home Away from Home Where Every Moment Counts."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="campus__paralax--image" style="background-image: url('assets/images/campus/paralax__image.jpg');">
    </div> --}}
    <!-- Include Slick CSS -->

    <!-- Slider Section -->


    <section class="rts__section rts__light pt--120 mb-3">
        <div class="container">
            <div class="row">
                <div class="rts__section--wrapper rt__lowercase">
                    <h2 class="rts__section--title">Blogs</h2>
                    <div class="rts__section--link">
                        <a href="{{ route('blogs') }}" class="rts-nbg-btn btn-arrow">View All<span><i
                                    class="fa-sharp fa-regular fa-arrow-right"></i>
                            </span></a>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                @foreach ($blogs as $blog)
                    <x-blog.blog_card :blog="$blog" />
                @endforeach
            </div>
        </div>
    </section>


    {{-- <div class="rts-brand v_1 rts-section-padding rts__light">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-12 col-md-11">
                    <div class="rts-brand-slider swiper swiper-data"
                        data-swiper='{
                    "slidesPerView":6,
                    "loop": true,
                    "autoplay":{
                        "delay":"3000"
                    },
                    "breakpoints":{
                        "320":{
                            "slidesPerView": 3,
                            "centeredSlides": true
                        },
                        "575":{
                            "slidesPerView": 4,
                            "centeredSlides": true
                        },
                        "768":{
                            "slidesPerView": 5,
                            "centeredSlides": true
                        },
                        "991":{
                            "slidesPerView": 6,
                            "centeredSlides": true
                        },
                        "1201":{
                            "slidesPerView": 6
                        }
                    }
            }'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="single-brand-logo">
                                    <a href="#">
                                        <img src="{{ asset('assets/images/brand/01.svg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand-logo">
                                    <a href="#">
                                        <img src="{{ asset('assets/images/brand/02.svg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand-logo">
                                    <a href="#">
                                        <img src="{{ asset('assets/images/brand/03.svg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand-logo">
                                    <a href="#">
                                        <img src="{{ asset('assets/images/brand/04.svg') }}" alt="">
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-newsletter /> --}}

</x-layouts.master>
@push('script')
    {{-- <script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script> --}}

    <!-- Initialize Slick Slider -->


    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.notice-slider', {
                loop: true,
                autoplay: {
                    disableOnInteraction: false,

                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 15
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 25
                    }
                }
            });
        });
    </script> --}}
@endpush

<x-layouts.master>
    @push('style')
        <style>
            .notice-card {
                border: none;
                border-radius: 8px;
                transition: all 0.3s ease;
                margin-bottom: 1.5rem;
                padding: 1rem;
                background-color: #dc3545;
            }

            .notice-card:hover {
                transform: translateY(-3px);
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            }

            .date-box {
                width: 60px;
                height: 60px;
                background-color: #fff;
                border-radius: 8px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .day {
                font-size: 1.5rem;
                font-weight: bold;
                line-height: 1;
            }

            .month {
                font-size: 0.75rem;
                text-transform: uppercase;
                color: #6c757d;
            }

            .title-link {
                color: #ffffff;
                text-decoration: none;
                font-weight: 500;
                transition: color 0.2s ease;
            }

            .title-link:hover {
                color: #f8f9fa;
            }
        </style>
    @endpush
    <!-- campus life -->
    <div class="rts-campus-life rts-section-padding">
        <div class="container">
            <div class="row">
                <div class="campus-life">
                    <div class="campus-life__content">
                        <h1 class="section-title">Notices</h1>
                        <p class="description w-680">
                            Our thriving residential campus is home to a community of creative and
                            accomplished people from around the world.
                        </p>
                        {{-- <div class="campus-video">
                            <img src="{{ asset('assets/images/club/banner.jpg') }}" alt="">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- campus life end -->

    <!-- funfact -->

    {{-- <div class="rts-funfact v_2 stroke">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 ">
                    <div class="rts-funfact-wrapper">
                        <div class="single-cta-item">
                            <h2 class="single-cta-item__title">1,623</h2>
                            <p>Faculty Members</p>
                        </div>
                        <div class="single-cta-item">
                            <h2 class="single-cta-item__title">6:1</h2>
                            <p>Student-to-faculty Ratio</p>
                        </div>
                        <div class="single-cta-item">
                            <h2 class="single-cta-item__title">Nearly 200</h2>
                            <p>Graduate Fields of study</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container py-5">
        {{-- <h1 class="mb-4">Latest Notices</h1> --}}

        <div class="row">
            @foreach ($notices as $notice)
                <div class="col-md-6 col-lg-4">
                    <div class="notice-card d-flex align-items-center">
                        <!-- Date Box -->
                        <div class="date-box me-3">
                            @if ($notice->published_at)
                                <div class="day">{{ $notice->published_at->format('d') }}</div>
                                <div class="month">{{ $notice->published_at->format('M') }}</div>
                            @else
                                <div class="day">N/A</div>
                                <div class="month">---</div>
                            @endif
                        </div>

                        <!-- Title -->
                        <a href="{{ route('notices.show', $notice) }}" class="title-link">
                            {{ Str::limit($notice->title, 40) }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- single section -->




</x-layouts.master>

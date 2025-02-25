<div class="banner v__2">
    <div class="banner__wrapper">
        <div class="swiper swiper-data"
            data-swiper='{"slidesPerView":1,"effect": "fade","loop": true,"speed": 1000,"autoplay":{"delay":"7000"}}'>
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="banner__wrapper--bg" style="background-image: url({{ Storage::url($slider->image) }});">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="banner__slides--container banner__height">
                                            <div class="banner__slides--content">
                                                <div class="banner__slides--content--sub">
                                                    {{-- <img src="{{ asset('assets/images/icon/e-cap.svg') }}"
                                                        alt="cap"> --}}
                                                    {{ $slider->subtitle }}
                                                </div>
                                                <h1 class="banner__slides--content--title">
                                                    {{ $slider->title }}
                                                </h1>
                                                
                                                @if ($slider->link)
                                                    <a href="{{ $slider->link }}" class="rts-theme-btn btn-arrow">
                                                        Visit
                                                        <span><i class="fa-regular fa-arrow-right"></i></span>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- <div class="banner__slides--navigation">
            <div class="banner__slides--navigation--single">
                <h5 class="nav__title">Undergraduate</h5>
                <a href="academic.html" class="nav__description">Browse the undergraduate degrees</a>
            </div>
            <div class="banner__slides--navigation--single">
                <h5 class="nav__title">Graduate</h5>
                <a href="academic.html" class="nav__description">Browse the graduate degrees</a>
            </div>
        </div> --}}
    </div>
</div>

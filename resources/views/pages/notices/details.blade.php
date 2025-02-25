<x-layouts.master>
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg"
        style="background-image: url('{{ asset('assets/images/banner/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('notices') }}">Notice</a></li>
                        </ul>
                        <h2 class="section-title">{{ $notice->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="rts-notice-details rts-section-padding">
        <div class="container">
            <div class="row justify-content-md-center justify-content-start">
                <div class="col-lg-7 col-md-10 mb-5 mb-lg-0">
                    <div class="rts-notice-full">
                        <div class="notice-content">
                            <h4 class="notice-title mb--40">{{ $notice->title }}</h4>
                            <div class="notice-content__description">
                                {!! $notice->content !!}
                            </div>
                            @if ($notice->files)
                                @php $files = $notice->files; @endphp
                                <div class="notice-content__download mt--30">
                                    @foreach ($files as $file)
                                        <a href="{{ asset('storage/' . $file) }}" class="rts-theme-btn" download>
                                            Download <span><i class="fa-sharp fa-light fa-file-pdf"></i></span>
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-10">
                    <div class="rts-notice-section">
                        <div class="rts-section rt-between pb--25 rts-border-bottom-2">
                            <h4 class="rts-section-title">Notice</h4>
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
                                    aria-labelledby="pills-home-tab" tabindex="0">
                                    <ul class="list-unstyled notice-content-box">
                                        @foreach ($latestNotices as $latest)
                                            <li class="single-notice">
                                                <div class="single-notice-item">
                                                    <div class="notice-date">
                                                        {{ $latest->published_at ? $latest->published_at->format('d') : '' }}
                                                        <span>{{ $latest->published_at ? $latest->published_at->format('M') : '' }}</span>
                                                    </div>
                                                    <div class="notice-content">
                                                        <p>
                                                            <a
                                                                href="{{ route('notices.show', ['notice' => $latest]) }}">
                                                                {{ $latest->title }}
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab" tabindex="0">
                                    <ul class="list-unstyled notice-content-box">
                                        @foreach ($examNotices as $exam)
                                            <li class="single-notice">
                                                <div class="single-notice-item">
                                                    <div class="notice-date">
                                                        {{ $exam->published_at ? $exam->published_at->format('d') : '' }}
                                                        <span>{{ $exam->published_at ? $exam->published_at->format('M') : '' }}</span>
                                                    </div>
                                                    <div class="notice-content">
                                                        <p>
                                                            <a href="{{ route('notices.show', ['notice' => $exam]) }}">
                                                                {{ $exam->title }}
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab" tabindex="0">
                                    <ul class="list-unstyled notice-content-box">
                                        @foreach ($admissionNotices as $admission)
                                            <li class="single-notice">
                                                <div class="single-notice-item">
                                                    <div class="notice-date">
                                                        {{ $admission->published_at ? $admission->published_at->format('d') : '' }}
                                                        <span>{{ $admission->published_at ? $admission->published_at->format('M') : '' }}</span>
                                                    </div>
                                                    <div class="notice-content">
                                                        <p>
                                                            <a
                                                                href="{{ route('notices.show', ['notice' => $admission]) }}">
                                                                {{ $admission->title }}
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
    </div>
</x-layouts.master>

<x-layouts.master>

    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg"
        style="background-image: url({{ asset('assets/images/banner/banner.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Faculty</li>
                        </ul>
                        <h2 class="section-title">{{ $faculty->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->


    <!-- faculty directory -->
    <section class="rts-faculty rts-section-padding">
        <div class="container">
            <div class="row justify-content-md-center">
                <div
                    class="col-lg-12 col-md-11 d-flex flex-wrap gap-5 justify-content-between align-items-start mb--60 border-bottom pb-5">
                    <div class="rts-section">
                        <h3 class="rts-section-title">Departments</h3>
                    </div>
                    {{-- <div class="search-filter">
                        <form action="#" class="cat-search-form">
                            <input type="text" placeholder="What interests you?" name="s" id="cat">
                            <button type="submit" class="cat-search"><i
                                    class="fa-light fa-magnifying-glass"></i></button>
                        </form>
                    </div> --}}
                </div>
            </div>
            <div class="row g-5">
                <!-- single item -->
                <x-cards.department />
                <!-- single item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-cat-item">
                        <div class="cat-thumb">
                            <img src="assets/images/course/02.jpg" alt="course-thumbnail">
                        </div>
                        <div class="cat-meta">
                            <div class="cat-title">
                                <a href="{{ route('department.details') }}">B.Sc In Electrical & Electronics
                                    Engineering (EEE)</a>
                            </div>
                            <div class="cat-link">
                                <a href="{{ route('department.details') }}" class="cat-link-arrow"><i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-cat-item">
                        <div class="cat-thumb">
                            <img src="assets/images/course/03.jpg" alt="course-thumbnail">
                        </div>
                        <div class="cat-meta">
                            <div class="cat-title">
                                <a href="{{ route('department.details') }}">B.Sc In Civil Engineering (CE)</a>
                            </div>
                            <div class="cat-link">
                                <a href="{{ route('department.details') }}" class="cat-link-arrow"><i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-cat-item">
                        <div class="cat-thumb">
                            <img src="assets/images/course/03.jpg" alt="course-thumbnail">
                        </div>
                        <div class="cat-meta">
                            <div class="cat-title">
                                <a href="faculty-sub-details.html">B.Sc In Mechanical Engineering</a>
                            </div>
                            <div class="cat-link">
                                <a href="faculty-sub-details.html" class="cat-link-arrow"><i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-cat-item">
                        <div class="cat-thumb">
                            <img src="assets/images/course/04.jpg" alt="course-thumbnail">
                        </div>
                        <div class="cat-meta">
                            <div class="cat-title">
                                <a href="faculty-sub-details.html">Bachelor of Business Administration(BBA)</a>
                            </div>
                            <div class="cat-link">
                                <a href="faculty-sub-details.html" class="cat-link-arrow"><i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-cat-item">
                        <div class="cat-thumb">
                            <img src="assets/images/course/05.jpg" alt="course-thumbnail">
                        </div>
                        <div class="cat-meta">
                            <div class="cat-title">
                                <a href="faculty-sub-details.html">Masters of Business Administration(MBA)</a>
                            </div>
                            <div class="cat-link">
                                <a href="faculty-sub-details.html" class="cat-link-arrow"><i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-cat-item">
                        <div class="cat-thumb">
                            <img src="assets/images/course/06.jpg" alt="course-thumbnail">
                        </div>
                        <div class="cat-meta">
                            <div class="cat-title">
                                <a href="faculty-sub-details.html">Executive Masters of Business Administration
                                    (EMBA)</a>
                            </div>
                            <div class="cat-link">
                                <a href="faculty-sub-details.html" class="cat-link-arrow"><i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-cat-item">
                        <div class="cat-thumb">
                            <img src="assets/images/course/07.jpg" alt="course-thumbnail">
                        </div>
                        <div class="cat-meta">
                            <div class="cat-title">
                                <a href="faculty-sub-details.html">Faculty of Biological Sciences</a>
                            </div>
                            <div class="cat-link">
                                <a href="faculty-sub-details.html" class="cat-link-arrow"><i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-cat-item">
                        <div class="cat-thumb">
                            <img src="assets/images/course/08.jpg" alt="course-thumbnail">
                        </div>
                        <div class="cat-meta">
                            <div class="cat-title">
                                <a href="faculty-sub-details.html">Faculty of Medicine</a>
                            </div>
                            <div class="cat-link">
                                <a href="faculty-sub-details.html" class="cat-link-arrow"><i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-cat-item">
                        <div class="cat-thumb">
                            <img src="assets/images/course/09.jpg" alt="course-thumbnail">
                        </div>
                        <div class="cat-meta">
                            <div class="cat-title">
                                <a href="faculty-sub-details.html">M.A. in Education</a>
                            </div>
                            <div class="cat-link">
                                <a href="faculty-sub-details.html" class="cat-link-arrow"><i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-cat-item">
                        <div class="cat-thumb">
                            <img src="assets/images/course/10.jpg" alt="course-thumbnail">
                        </div>
                        <div class="cat-meta">
                            <div class="cat-title">
                                <a href="faculty-sub-details.html">Faculty of Earth and Environmental Sciences</a>
                            </div>
                            <div class="cat-link">
                                <a href="faculty-sub-details.html" class="cat-link-arrow"><i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rts-load-more-btn rt-center mt--60">
                <a href="faculty-details.html" class="rts-theme-btn primary lh-100">Load More</a>
            </div>
        </div>
    </section>
    <!-- faculty directory end -->

</x-layouts.master>

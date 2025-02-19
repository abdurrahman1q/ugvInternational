<x-layouts.master>

    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg"
        style="background-image: url({{ asset('assets/images/banner/banner.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">blogs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->


    <!-- university blog list -->
    <div class="rts-blog v_4 rts-section-padding">
        <div class="container">
            <div class="row justify-content-center g-5">
                <!-- single blog item -->
                @foreach ($blogs as $blog)
                    <div class="col-lg-10 col-md-11 col-xl-6">
                        <div class="single-blog">
                            <div class="blog single-blog__content">
                                <div class="blog__thumb">
                                    <a href="{{route('blog.details', $blog)}}">
                                        <img src="{{ $blog->getImage() }}" alt="{{$blog->title}}" width="250" height="250">
                                    </a>
                                </div>
                                <div class="blog__meta">
                                    <div class="blog__meta--da">
                                        <div class="blog-date">
                                            <span><i class="fal fa-calendar"></i></span>
                                            <span>{{$blog->published_at->format('d M Y')}}</span>
                                        </div>
                                        {{-- <div class="blog-author">
                                            <span><i class="far fa-user"></i>
                                            </span>
                                            <span><a href="#">Maria coli</a></span>
                                        </div> --}}
                                    </div>
                                    <h5 class="blog__title"> <a href="{{route('blog.details', $blog)}}">{{$blog->title}} </a></h5>
                                    <a href="{{route('blog.details', $blog)}}" class="about-btn rts-nbg-btn btn-arrow">Read More
                                        <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- single blog item end -->

            </div>
            <div class="rts-load-more-btn rt-center mt--60">
                <a href="#" class="rts-theme-btn primary primary lh-100">Load More</a>
            </div>
        </div>
    </div>
    <!-- university blog list end -->

</x-layouts.master>

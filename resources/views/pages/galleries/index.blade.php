<x-layouts.master>

    @push('style')
        <style>
            .album {
                display: grid;
                grid-template-areas:
                    "a b"
                    "a c";
                background-color: hsla(0, 0%, 0%, 0.427);
                border-radius: 10px;
                overflow: hidden;

                box-shadow: 1px 1px 10px #00000019
            }


            .album img {
                transition: transform 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                object-fit: cover;
            }



            .album img:hover {
                transform: scale(1.1) rotate(1deg);
            }

            .album img:nth-child(1) {
                z-index: 100;
                aspect-ratio: 1/1;
                grid-area: a
            }

            .album img:nth-child(2) {
                z-index: 50;
                aspect-ratio: 2/1;
                grid-area: b
            }

            .album img:nth-child(3) {
                z-index: 30;
                aspect-ratio: 2/1;
                grid-area: c
            }

            .album-card {
                position: relative;
            }

            .album-card:hover h5 {
                display: block;
                opacity: 1;
                bottom: 0px;

            }

            .album-card h5 {

                transition: all 0.3s;
                padding: 5px;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 200;
                bottom: -5px;
                left: 10px;
                position: absolute;
                display: block;
                opacity: 0;
            }
        </style>
    @endpush
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg"
        style="background-image: url({{ asset('assets/images/banner/breadcrumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Galleries</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- 
    <div class="container my-5">
        <div class="row">
            @foreach ($galleries as $gallery)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('gallery.details', $gallery) }}" class="text-decoration-none text-dark">
                        <div class="card shadow animate__animated animate__fadeInUp"
                            style="animation-delay: {{ $loop->index * 0.1 }}s;">
                            <div class="gallery-card-title">
                                {{ $gallery->title }}
                            </div>
                            @if (is_array($gallery->images) && count($gallery->images) > 0)
                                <div class="image-grid ">
                                    @foreach (array_slice($gallery->images, 0, 3) as $image)
                                        <img class="grid-{{ $loop->iteration }}" src="{{ asset('storage/' . $image) }}"
                                            alt="{{ $gallery->title }}">
                                    @endforeach
                                </div>
                            @else
                                <img src="{{ asset('assets/images/placeholder.png') }}" class="card-img-top"
                                    alt="{{ $gallery->title }}">
                            @endif
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="rts-load-more-btn rt-center mt-4">
            {{ $galleries->links() }}
        </div>
    </div> --}}

    <div class="container">
        <div class="row row-cols-3 my-5">
            @foreach ($galleries as $gallery)
                <div class="col">
                    <div class="album-card">
                        <div class="album">
                            @foreach (array_slice($gallery->images, 0, 3) as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $gallery->title }}"
                                    class="img-fluid">
                            @endforeach
                        </div>
                        <h5>
                            <a href="{{ route('gallery.details', $gallery) }}" class="text-decoration-none text-white">
                                {{ $gallery->title }}
                            </a>
                        </h5>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</x-layouts.master>

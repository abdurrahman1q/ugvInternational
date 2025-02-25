<x-layouts.master>
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg"
        style="background-image: url('{{ asset('assets/images/banner/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('galleries') }}">Gallery</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $gallery->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="alumni-banner rts-section-padding pb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="rts__section--wrapper v__9">
                        <h2 class="rts__section--title">{{ $gallery->title }}</h2>
                        @if ($gallery->description)
                            <p class="rts__section--description" style="max-width: 100%">{{ $gallery->description }}</p>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="rts-gallery rts__light rts-section-padding ">
        <div class="container">
            <div class="row">
                <div class="rts__section--wrapper v__5">
                    <h2 class="rts__section--title">Gallery Images</h2>
                </div>

            </div>
            <div class="gallery-area">
                <div class="row g-4">
                    @if (is_array($gallery->images) && count($gallery->images))
                        @foreach ($gallery->images as $image)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-gallery">
                                    <a href="{{ asset('storage/' . $image) }}" class="single-gallery__item"
                                        data-lightbox="gallery">
                                        <div class="ratio ratio-1x1">
                                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $gallery->title }}"
                                                class="img-fluid object-fit-cover rounded shadow">
                                        </div>
                                        <div class="single-gallery__icon">
                                            <i class="fa-light fa-circle-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <p>No images available for this gallery.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.master>

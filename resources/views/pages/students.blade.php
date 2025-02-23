<x-layouts.master>
    @push('style')
        <style>
            .card:hover {
                transform: scale(1.02);
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
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Students</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">
        <div class="row">
            @foreach ($students as $student)
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100" style="transition: transform 0.2s;">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="me-3">
                                    <img src="{{ $student->image ? asset('storage/' . $student->image) : 'https://via.placeholder.com/100' }}"
                                        class="rounded" alt="{{ $student->name }}" width="80" height="80">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h5 class="mb-1">{{ $student->name }}</h5>
                                    <p class="text-muted small mb-0">
                                        <a href="mailto:{{ $student->email }}"
                                            class="text-decoration-none text-primary">
                                            {{ $student->email }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-1"><strong>Dept:</strong> {{ $student->department }}</p>
                                    <p class="mb-1"><strong>Session:</strong> {{ $student->session }}</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-1"><strong>Country:</strong> {{ $student->country }}</p>
                                    <p class="mb-1"><strong>Phone:</strong>
                                        <a href="tel:{{ $student->phone }}" class="text-decoration-none text-primary">
                                            {{ $student->phone }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            @if ($student->social_links)
                                <div class="mt-3">
                                    <ul class="list-inline">
                                        @foreach (is_array($student->social_links) ? $student->social_links : json_decode($student->social_links, true) as $link)
                                            <li class="list-inline-item">
                                                <a target="_blank" href="{{ $link['url'] }}"
                                                    class="btn btn-outline-primary btn-sm">
                                                    {{ ucfirst($link['platform']) }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $students->links() }}
        </div>
    </div>
</x-layouts.master>

<x-layouts.master>
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg"
        style="background-image: url({{ asset('assets/images/banner/breadcrumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pages</li>
                        </ul>
                        <h2 class="section-title">{{ $page->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-5">


        @foreach ($page->blocks as $block)
            @if ($block['type'] === 'heading')
                <{{ $block['data']['level'] }} class="fw-bold {{ $block['data']['alignment'] }}">
                    {{ $block['data']['text'] }}
                    </{{ $block['data']['level'] }}>
                @elseif ($block['type'] === 'text')
                    <p>{{ $block['data']['content'] }}</p>
                @elseif ($block['type'] === 'markdown')
                    <div class="markdown">
                        {!! Str::markdown($block['data']['content']) !!}
                    </div>
                @elseif ($block['type'] === 'table')
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                @foreach ($block['rows'][0]['columns'] as $column)
                                    <th>{{ $column['content'] }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($block['rows'] as $row)
                                <tr>
                                    @foreach ($row['columns'] as $column)
                                        <td>{{ $column['content'] }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @elseif ($block['type'] === 'image')
                    <div class="text-center my-4">
                        <img src="{{ asset('storage/' . $block['data']['image']) }}" class="img-fluid rounded"
                            alt="Image">
                        @if (!empty($block['data']['caption']))
                            <p class="text-muted mt-2">{{ $block['data']['caption'] }}</p>
                        @endif
                    </div>
                @elseif ($block['type'] === 'video')
                    <div class="ratio ratio-16x9 my-4">
                        <iframe src="{{ $block['data']['video_url'] }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                @elseif ($block['type'] === 'blog')
                    <div class="border p-3 mb-3 shadow-sm">
                        <h4>{{ $block['data']['title'] }}</h4>
                        <p class="text-muted">Category: {{ $block['data']['category'] }}</p>
                    </div>
                @elseif ($block['type'] === 'faqs')
                    <div class="accordion my-4" id="faqAccordion">
                        @foreach ($block['data']['items'] as $index => $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqHeading{{ $index }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faqCollapse{{ $index }}">
                                        {{ $faq['question'] }}
                                    </button>
                                </h2>
                                <div id="faqCollapse{{ $index }}" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        {{ $faq['answer'] }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @elseif ($block['type'] === 'fun_fact')
                    <div class="text-center my-4">
                        <h1 class="display-4">{{ $block['data']['count'] }}</h1>
                        <p class="fw-bold">{{ $block['data']['label'] }}</p>
                    </div>
                @elseif ($block['type'] === 'gallery')
                    <div class="row g-3 my-4">
                        @foreach ($block['data']['images'] as $img)
                            <div class="col-md-3">
                                <img src="{{ asset('storage/' . $img['image']) }}" class="img-fluid rounded">
                                @if (!empty($img['caption']))
                                    <p class="text-muted text-center mt-2">{{ $img['caption'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @elseif ($block['type'] === 'slider')
                    <div id="imageSlider" class="carousel slide my-4" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($block['data']['slides'] as $index => $slide)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $slide['image']) }}" class="d-block w-100 rounded">
                                    @if (!empty($slide['caption']))
                                        <div class="carousel-caption d-none d-md-block">
                                            <p class="bg-dark text-white p-1 rounded">{{ $slide['caption'] }}</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#imageSlider"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                @elseif ($block['type'] === 'map')
                    <div class="my-4">
                        <h5>{{ $block['data']['address'] }}</h5>
                        <iframe
                            src="https://maps.google.com/maps?q={{ $block['data']['latitude'] }},{{ $block['data']['longitude'] }}&z=15&output=embed"
                            width="100%" height="300" style="border:0;"></iframe>
                    </div>
                @elseif ($block['type'] === 'layout')
                    <div class="row my-4">
                        <div class="col-md-6">
                            @foreach ($block['data']['left_column'] ?? [] as $leftBlock)
                                @include('pages.pages.partials.block', ['block' => $leftBlock])
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            @foreach ($block['data']['right_column'] ?? [] as $rightBlock)
                                @include('pages.pages.partials.block', ['block' => $rightBlock])
                            @endforeach
                        </div>
                    </div>
            @endif
        @endforeach
    </div>
</x-layouts.master>

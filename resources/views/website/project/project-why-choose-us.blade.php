@php
    $section_title = App\Models\SectionTitle::where('type', 'why_choose_us')->first();
    $colors = ['#ffa415', '#fc5528', '#8139e7', '#44c895', '#399be7', '#d340c3'];
@endphp

<section class="service-one" style="padding-top: 100px;">
    <div class="service-one__shape-one" style="background-image: url(assets/images/shapes/service-bg-shape-1.png);"></div>
    <div class="service-one__shape-two" style="background-image: url(assets/images/shapes/service-bg-shape-2.png);"></div>
    <div class="container">
        <div class="sec-title text-center">
            @if (!empty($section_title?->title))
                <h6 class="sec-title__tagline bw-split-in-right">
                    <span class="sec-title__tagline__border"></span>{{ $section_title->title }}
                </h6>
            @endif

            @if (!empty($section_title?->subtitle))
                <h3 class="sec-title__title bw-split-in-left">
                    {{ $section_title->subtitle }}
                </h3>
            @endif
        </div>

        <div class="row gutter-y-30">
            @foreach ($page->whyChooseUs ?? [] as $index => $why)
                @php
                    $hasContent = !empty($why?->icon) || !empty($why?->title) || !empty($why?->subtitle);
                @endphp

                @if ($hasContent)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ $index * 100 }}ms">
                        <div class="service-one__item text-center" style="--accent-color: {{ $colors[$index % count($colors)] }};">
                            @if (!empty($why?->icon))
                                <div class="service-one__item__icon">
                                    <span class="{{ $why->icon }}"></span>
                                </div>
                            @endif

                            @if (!empty($why?->title))
                                <h3 class="service-one__item__title">{{ $why->title }}</h3>
                            @endif

                            @if (!empty($why?->subtitle))
                                <p class="service-one__item__text m-0">
                                    {{ $why->subtitle }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

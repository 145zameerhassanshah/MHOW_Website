@php
    $section_title = App\Models\SectionTitle::where('type', 'why_us_image')->first();
@endphp

<section class="service-one" style="padding-top: 100px;">
    <div class="service-one__shape-one" style="background-image: url(assets/images/shapes/service-bg-shape-1.png);"></div>
    <div class="service-one__shape-two" style="background-image: url(assets/images/shapes/service-bg-shape-2.png);"></div>
    <div class="container">
        <div class="sec-title text-center">
            {{-- @if (!empty($section_title?->title))
                <h6 class="sec-title__tagline bw-split-in-right">
                    <span class="sec-title__tagline__border"></span>{{ $section_title->title }}
                </h6>
            @endif --}}

            @if (!empty($section_title?->title))
                <h3 class="sec-title__title bw-split-in-left">
                    {{ $section_title->title }}
                </h3>
            @endif

            @if (!empty($section_title?->description))
                <h5 class="mt-2">
                    <span class=""></span>{{ $section_title->description }}
                </h5>
            @endif
        </div>

        <div class="row gutter-y-30">
            @foreach ($page->whyUsImages ?? [] as $index => $why)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ $index * 100 }}ms">
                    <div class="service-one__item text-center">
                        @if (!empty($why?->image))
                            <div class="mb-2">
                                <img src="{{ asset($why->image) }}" width="120px">
                            </div>
                        @endif

                        @if (!empty($why?->title))
                            <h3 class="service-one__item__title">{{ $why->title }}</h3>
                        @endif

                        @if (!empty($why?->description))
                            <p class="service-one__item__text m-0">
                                {{ $why->description }}
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

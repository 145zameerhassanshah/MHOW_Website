@php
    $section_title = App\Models\SectionTitle::where('type', 'feature_image')->first();
@endphp

@if (!empty($section_title?->title) || !empty($section_title?->description) || (!empty($page?->featureImages) && count($page->featureImages)))
    <section class="country-one">
        <div class="container">
            <div class="sec-title text-left">
                @if (!empty($section_title?->title))
                    <h6 class="sec-title__tagline bw-split-in-right">
                        <span class="sec-title__tagline__border"></span>{{ $section_title->title }}
                    </h6>
                @endif

                @if (!empty($section_title?->description))
                    <h3 class="sec-title__title bw-split-in-left">
                        {!! $section_title->description !!}
                    </h3>
                @endif
            </div>

            @if (!empty($page?->featureImages) && count($page->featureImages))
                <div class="country-one__carousel careox-owl__carousel owl-carousel"
                    data-owl-options='{
                        "items": 1,
                        "margin": 30,
                        "loop": false,
                        "smartSpeed": 700,
                        "nav": true,
                        "navText": ["<span class=\"icon-up-arrow-two\"></span>","<span class=\"icon-down-arrow-two\"></span>"],
                        "dots": false,
                        "autoplay": false,
                        "responsive": {
                            "0": { "items": 1 },
                            "500": { "items": 2 },
                            "992": { "items": 3 },
                            "1200": { "items": 4 }
                        }
                    }'>
                    @foreach ($page->featureImages as $index => $image)
                        @php
                            $hasImage = !empty($image?->image);
                            $hasTitle = !empty($image?->title);
                            $hasSubtitle = !empty($image?->subtitle);
                        @endphp
                        @if ($hasImage || $hasTitle || $hasSubtitle)
                            <div class="item">
                                <div class="country-one__item text-center wow fadeInUp" data-wow-delay="{{ $index * 50 }}ms">
                                    @if ($hasImage)
                                        <div class="country-one__item__flag">
                                            <img src="{{ asset($image->image) }}" alt="MHOW-WHY">
                                        </div>
                                    @endif

                                    @if ($hasTitle)
                                        <h3 class="country-one__item__title">{{ $image->title }}</h3>
                                    @endif

                                    @if ($hasSubtitle)
                                        <p class="country-one__item__text">{{ $image->subtitle }}</p>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endif

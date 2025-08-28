@php
    $section_title = App\Models\SectionTitle::where('type', 'element')->first();
    $colors = ['#ffa415', '#fc5528', '#8139e7', '#44c895', '#399be7', '#d340c3'];
@endphp

@foreach ($page->elements ?? [] as $element)
    <section class="tab-one">
        <div class="container">
            <div class="sec-title text-center">
                @if (!empty($section_title?->title))
                    <h6 class="sec-title__tagline bw-split-in-right">
                        <span class="sec-title__tagline__border"></span>{{ $section_title->title }}
                    </h6>
                @endif

                @if (!empty($section_title?->subtitle))
                    <h3 class="sec-title__title bw-split-in-left">{{ $section_title->subtitle }}</h3>
                @endif
            </div>

            <div class="tab-one__wrapper tabs-box">
                <div class="tabs-content">
                    <div class="tab fadeInUp animated active-tab" id="medical">
                        <div class="tab-one__content">
                            <div class="tab-one__content__bg"
                                style="background-image: url({{ asset('assets/core/tab-bg.jpg') }});"></div>
                            <div class="row">
                                <div class="col-lg-6" style="padding: 30px 0px 69px 30px !important;">
                                    <div class="tab-one__content__image">
                                        <div class="row">
                                            <div class="col">
                                                <div class="sec-title text-left">
                                                    @if (!empty($element?->title))
                                                        <h3 class="sec-title__title bw-split-in-left sec-title__tagline bw-split-in-right mb-3">
                                                            {{ $element->title }}
                                                        </h3>
                                                    @endif

                                                    @if (!empty($element?->description))
                                                        <p>{!! $element->description !!}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        @if (!empty($element?->image))
                                            <img src="{{ asset($element->image) }}" alt="careox">
                                        @endif

                                        <div class="tab-one__content__image__shape" style="background-image: url();"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 d-flex">
                                    <div class="tab-one__content__right">
                                        @if (!empty($element?->subtitle))
                                            <h3 class="tab-one__content__title">{{ $element->subtitle }}</h3>
                                        @endif

                                        @foreach ($element->features ?? [] as $index => $feature)
                                            @if (!empty($feature?->title) || !empty($feature?->description))
                                                <div class="tab-one__content__box" style="--accent-color: {{ $colors[$index % count($colors)] }}">
                                                    <div class="tab-one__content__box__icon">
                                                        <i class="icofont-check-circled"></i>
                                                    </div>

                                                    @if (!empty($feature?->title))
                                                        <h3 class="tab-one__content__box__title">{{ $feature->title }}</h3>
                                                    @endif

                                                    @if (!empty($feature?->description))
                                                        <p class="tab-one__content__box__text">
                                                            {{ $feature->description }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach

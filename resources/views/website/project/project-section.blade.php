@foreach ($page->sections as $section)
    <section class="about-one about-one--about {{ $loop->iteration != 1 ? 'pt-0' : '' }}">
        <div class="container">
            <div class="row">
                @if ($section->type == 'R-2-L')
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="200ms">
                        <div class="about-one__content">
                            <div class="sec-title text-left">
                                @if (!empty($section->title))
                                    <h6 class="sec-title__tagline bw-split-in-right">
                                        <span class="sec-title__tagline__border"></span>{{ $section->title }}
                                    </h6>
                                @endif

                                @if (!empty($section->subtitle))
                                    <h3 class="sec-title__title bw-split-in-left">{{ $section->subtitle }}</h3>
                                @endif
                            </div>

                            @if (!empty($section->description))
                                <p class="about-one__content__text">
                                    {!! $section->description !!}
                                </p>
                            @endif

                            <div class="about-one__content__border"></div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="about-one__image wow fadeInLeft" data-wow-delay="100ms">
                            <div class="about-one__image__one">
                                @if (!empty($section->image))
                                    <img src="{{ asset($section->image) }}" alt="careox">
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-xl-6">
                        <div class="about-one__image wow fadeInLeft" data-wow-delay="100ms">
                            <div class="about-one__image__one">
                                @if (!empty($section->image))
                                    <img src="{{ asset($section->image) }}" alt="careox">
                                @endif
                            </div>
                            <div class="about-one__image__shape-two">
                                <img src="{{ asset('assets/core') }}/about-1-shape-5.png" alt="careox">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="200ms">
                        <div class="about-one__content">
                            <div class="sec-title text-left">
                                @if (!empty($section->title))
                                    <h6 class="sec-title__tagline bw-split-in-right">
                                        <span class="sec-title__tagline__border"></span>{{ $section->title }}
                                    </h6>
                                @endif

                                @if (!empty($section->subtitle))
                                    <h3 class="sec-title__title bw-split-in-left">{{ $section->subtitle }}</h3>
                                @endif
                            </div>

                            @if (!empty($section->description))
                                <p class="about-one__content__text">
                                    {!! $section->description !!}
                                </p>
                            @endif

                            <div class="about-one__content__border"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endforeach

@foreach ($page->blocks ?? [] as $index => $block)
    @php
        $hasContent = !empty($block?->title) || !empty($block?->subtitle) || !empty($block?->description) || !empty($block?->image) || ($block?->features && count($block->features));
    @endphp

    @if ($hasContent)
        <section class="about-three" style="padding-top: {{ $index == 0 ? '170' : '20' }}px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                        <div class="about-three__content">
                            <div class="sec-title text-left">
                                @if (!empty($block?->title))
                                    <h6 class="sec-title__tagline bw-split-in-right">
                                        <span class="sec-title__tagline__border"></span>{{ $block->title }}
                                    </h6>
                                @endif

                                @if (!empty($block?->subtitle))
                                    <h3 class="sec-title__title bw-split-in-left">
                                        {{ $block->subtitle }}
                                    </h3>
                                @endif
                            </div>

                            @if (!empty($block?->description))
                                <p class="about-three__content__text">
                                    {!! $block->description !!}
                                </p>
                            @endif

                            @if (!empty($block?->features) && count($block->features))
                                <ul class="about-three__content__list">
                                    @foreach ($block->features as $feature)
                                        @if (!empty($feature?->title))
                                            <li>
                                                <span class="about-three__content__list__icon">
                                                    <i class="icofont-check-circled"></i>
                                                </span>
                                                {{ $feature->title }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                    @if (!empty($block?->image))
                        <div class="col-lg-6">
                            <div class="about-three__image wow fadeInRight pt-0" data-wow-delay="200ms">
                                <img src="{{ asset($block->image) }}" alt="careox" style="border-radius: 0px !important;">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif
@endforeach

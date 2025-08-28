@php
    $colors = ['#ffa415', '#ff5528', '#8742e8', '#44c895', '#348ceb', '#e24b6e'];
@endphp

<section class="service-two">
    {{-- <div class="service-two__shape" style="background-image: url(assets/images/shapes/service-shape-3.png);"></div> --}}
    <div class="container">
        <div class="sec-title text-center">
            <h6 class="sec-title__tagline bw-split-in-right">
                <span class="sec-title__tagline__border"></span>UPCOMING EVENTS
            </h6>
            <h3 class="sec-title__title bw-split-in-left">
                Explore & Join
            </h3>
        </div>

        <section class="donations-one pt-0">
            <div class="container">

                <div class="donations-one__carousel careox-owl__carousel careox-owl__carousel--basic-nav owl-carousel"
    data-owl-options='{
        "items": 1,
        "margin": 30,
        "loop": true,
        "smartSpeed": 700,
        "nav": false,
        "navText": ["<span class=\"icon-up-arrow-two\"></span>","<span class=\"icon-down-arrow-two\"></span>"],
        "dots": true,
        "autoplay": true,
        "autoplayTimeout": 3000,
        "autoplayHoverPause": true,
        "responsive": {
            "0": {"items": 1},
            "500": {"items": 2},
            "992": {"items": 3}
        }
    }'>

                    @foreach ($events as $index => $event)
                        @php
                            $color = $colors[$index % count($colors)];
                        @endphp
                        <div class="item">
                            <div class="donations-one__item" style="--accent-color: {{ $color }};">
                                <div class="donations-one__item__image">
                                    <a href="{{ route('front.event.detail', $event->slug) }}">
                                        <img src="{{ asset($event->image) }}" alt="{{ $event->title }}">
                                    </a>
                                </div>
                                <div class="donations-one__item__content">
                                    <h3 class="donations-one__item__title text-center">
                                        <a href="{{ route('front.event.detail', $event->slug) }}">
                                            {{ $event->title }}
                                        </a>
                                    </h3>
                                    {{-- Uncomment if subtitle is needed --}}
                                    {{-- <p class="donations-one__item__text">{{ $event->sub_title }}</p> --}}
                                    {{-- <a class="donations-one__item__rm" href="{{ route('front.event.detail', $event->slug) }}">
                                <i class="icon-right-arrow"></i>
                            </a> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</section>

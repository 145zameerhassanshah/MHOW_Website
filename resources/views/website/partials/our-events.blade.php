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

        <div class="row">
            @foreach ($events as $index => $event)
                @php
                    $color = $colors[$index % count($colors)];
                @endphp
                <div class="col-lg-4 col-md-6 mb-4">
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
                            {{-- <p class="donations-one__item__text">{{ $event->sub_title }}</p> --}}
                            <a class="donations-one__item__rm" href="{{ route('front.event.detail', $event->slug) }}">
                                <i class="icon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

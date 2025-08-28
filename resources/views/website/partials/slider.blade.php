<section class="main-slider-two">
    <div class="main-slider-two__carousel careox-owl__carousel owl-carousel rdy"
        data-owl-options='{
            "loop": true,
            "animateOut": "fadeOut",
            "animateIn": "fadeIn",
            "items": 1,
            "autoplay": true,
            "autoplayTimeout": 7000,
            "smartSpeed": 1000,
            "nav": false,
            "dots": true,
            "margin": 0
        }'>
        
        @foreach ($sliders as $slider)
        <div class="item">
            <div class="main-slider-two__item">
                <div class="main-slider-two__bg" style="background-image: url('{{ asset('assets/admin/img/slider/' . $slider->image) }}');"></div>
                <div class="main-slider-two__shape-one">
                    <img src="{{ asset('assets/images/shapes/slider-2-shape-1.png') }}" alt="careox">
                </div>
                <div class="main-slider-two__shape-two">
                    <img src="{{ asset('assets/images/shapes/slider-2-shape-2.png') }}" alt="careox">
                </div>
                <div class="main-slider-two__shape-three">
                    <img src="{{ asset('assets/images/shapes/slider-2-shape-3.png') }}" alt="careox">
                </div>
                <div class="main-slider-two__overlay"></div>
                <div class="container">
                    <div class="main-slider-two__content">
                        <h2 class="main-slider-two__title">
                            {!! $slider->title !!}
                        </h2>
                        <p class="main-slider-two__text">
                            {!! $slider->sub_title !!}
                        </p>
                        <div class="main-slider-two__btn">
                            <a href="{{ route('front.donate.now.form') }}" class="careox-btn"><span>Donate Now!</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>

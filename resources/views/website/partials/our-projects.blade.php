<section class="service-two">
    <div class="service-two__shape" style="background-image: url(assets/images/shapes/service-shape-3.png);"></div>
    <div class="container">
        <div class="sec-title text-center">
            <h6 class="sec-title__tagline bw-split-in-right">
                <span class="sec-title__tagline__border"></span>OUR PROJECTS
            </h6>
            <h3 class="sec-title__title bw-split-in-left">
                Building a World of Mercy, Through MHOW
            </h3>
        </div>
        <div class="row gutter-y-30">

            @php
                $colors = ['#ffa415', '#fc5528', '#8139e7', '#44c895', '#399be7', '#d340c3'];
            @endphp

            @foreach ($projects as $index => $package)
                <div class="col-lg-4 col-md-6wow fadeInUp" data-wow-delay="{{ $index * 100 }}ms">
                    <div class="service-two__item text-center"
                        style="--accent-color: {{ $colors[$index % count($colors)] }};">
                        <div class="service-two__item__shape"
                            style="background-image: url(assets/images/shapes/service-two-shape.png);"></div>
                        <div class="service-two__item__image">
                            <img src="{{ asset($package->image) }}" alt="{{ $package->title }}">
                        </div>
                        <div class="service-two__item__icon">
                            <span class="{{ $package->icon }}"></span>
                        </div><!-- /.service-icon -->
                        <h3 class="service-two__item__title">{{ $package->name }}</h3><!-- /.service-title -->
                        <!-- /.service-title -->
                        <div class="service-two__item__rm">
                            <a href="{{ route('front.project.detail', $package->slug) }}">Read More</a>
                            <i class="icon-right-arrow"></i>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

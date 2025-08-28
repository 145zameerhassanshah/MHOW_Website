<section class="country-one">
    <div class="container">
        <div class="sec-title text-center">
            <h6 class="sec-title__tagline bw-split-in-right">
                <span class="sec-title__tagline__border"></span>OUR CONTRIBUTION COUNTRY
            </h6>
            <h3 class="sec-title__title bw-split-in-left">
                MHOW Around the World
            </h3>
        </div>
        <div class="country-one__carousel careox-owl__carousel owl-carousel owl-loaded owl-drag"
            data-owl-options="{
			&quot;items&quot;: 1,
			&quot;margin&quot;: 30,
			&quot;loop&quot;: false,
			&quot;smartSpeed&quot;: 700,
			&quot;nav&quot;: true,
			&quot;navText&quot;: [&quot;&lt;span class=\&quot;icon-up-arrow-two\&quot;&gt;&lt;/span&gt;&quot;,&quot;&lt;span class=\&quot;icon-down-arrow-two\&quot;&gt;&lt;/span&gt;&quot;],
			&quot;dots&quot;: false,
			&quot;autoplay&quot;: false,
			&quot;responsive&quot;: {
				&quot;0&quot;: {
					&quot;items&quot;: 1
				},
				&quot;500&quot;: {
					&quot;items&quot;: 2
				},
				&quot;992&quot;: {
					&quot;items&quot;: 3
				},
				&quot;1200&quot;: {
					&quot;items&quot;: 4
				}
			}
			}">
            <!-- /.item -->
            <!-- /.item -->
            <!-- /.item -->
            <!-- /.item -->
            <!-- /.item -->
            <!-- /.item -->
            <!-- /.item -->
            <!-- /.item -->
            <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all; width: 2400px;">
                    @php
                        $colors = ['#ffa415', '#ff5528', '#8139e7', '#44c895', '#399be7', '#d340c3'];
                    @endphp
                    @foreach ($countries as $index => $country)
                        <div class="owl-item active" style="width: 270px; margin-right: 30px;">
                            <div class="item">
                                <div class="country-one__item text-center wow fadeInUp animated"
                                    style="--accent-color: {{ $colors[$index % count($colors)] }}; visibility: visible; animation-delay: 50ms; animation-name: fadeInUp;"
                                    data-wow-delay="50ms">
                                    <div class="country-one__item__flag">
                                        <img src="{{ asset($country->icon) }}" alt="{{ $country->name }}">
                                        {{-- <div class="country-one__item__count">22k</div> --}}
                                    </div>
                                    <h3 class="country-one__item__title">{{ $country->name }}</h3>
                                    <p class="country-one__item__text">{!! $country->description !!}</p>
                                </div><!-- /.pricing-one__card -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

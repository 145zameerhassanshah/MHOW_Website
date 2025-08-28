{{-- <section class="service-two">
    <div class="container">
        <div class="sec-title text-center">
            <h6 class="sec-title__tagline bw-split-in-right">
                <span class="sec-title__tagline__border"></span>Voices of Wisdom, Journeys of Change
            </h6>
        </div>


        <div class="donations-carousel owl-carousel owl-theme">
            @foreach ($galleries as $index => $gallery)
                <div class="item">
                    <div class="donations-one__item">
                        <div class="donations-one__item__image">
                            <a href="{{ $gallery->video_link }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ asset('assets/front/img/gallery/' . $gallery->image) }}"
                                    alt="{{ $gallery->title }}" class="img-fluid">
                            </a>
                        </div>
                        <div class="donations-one__item__content">
                            <h3 class="donations-one__item__title text-center">
                                <a href="{{ $gallery->video_link }}" target="_blank" rel="noopener noreferrer">
                                    {{ $gallery->title }}
                                </a>
                            </h3>
                            <a class="donations-one__item__rm" href="{{ $gallery->video_link }}" target="_blank"
                                rel="noopener noreferrer">
                                <i class="icon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section> --}}
@php
    $colors = ['#ffa415', '#ff5528', '#8139e7', '#44c895', '#399be7', '#d340c3'];
@endphp
<section class="donations-two">
    <div class="container">
        <div class="sec-title text-center">



            <h3 class="sec-title__title bw-split-in-left">Voices of Wisdom, Journeys of Change</h3>
            <!-- /.sec-title__title -->
        </div><!-- /.sec-title -->
        <div class="donations-one__carousel careox-owl__carousel careox-owl__carousel--basic-nav owl-carousel"
            data-owl-options='{
			"items": 1,
			"margin": 30,
			"loop": false,
			"smartSpeed": 700,
			"nav": false,
			"navText": ["<span class=\"icon-up-arrow-two\"></span>","<span class=\"icon-down-arrow-two\"></span>"],
			"dots": true,
			"autoplay": false,
			"responsive": {
				"0": {
					"items": 1
				},
				"500": {
					"items": 2
				},
				"992": {
					"items": 3
				}
			}
			}'>
            @foreach ($galleries as $index => $gallery)
                @php
                    $color = $colors[$index % count($colors)];
                @endphp
                <div class="item">
                    <div class="donations-two__item wow fadeInUp" data-wow-delay="00ms">
                        <div class="donations-two__item__image">
                            <a href="{{ $gallery->video_link }}" class="video-popup"><img src="{{ asset('assets/front/img/gallery/' . $gallery->image) }}" alt="{{ $gallery->title }}"></a>
                            <div class="donations-two__item__btn">
                                <a href="{{ $gallery->video_link }}" class="video-popup"><i
                                        class="icofont-video-cam"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- /.row -->
    </div>
</section>

@php
    $colors = ['#ffa415', '#ff5528', '#8139e7', '#44c895', '#399be7', '#d340c3'];
@endphp

<section class="team-two team-two--page">
    <div class="container">
        <div class="sec-title text-center">
            {{-- <h6 class="sec-title__tagline bw-split-in-right">
                <span class="sec-title__tagline__border"></span>Our Expert Team
            </h6> --}}
            <h3 class="sec-title__title bw-split-in-left">Our Valued Partners</h3>
        </div>

        <div class="row gutter-y-30">
            @foreach ($partners as $index => $partner)
                @php
                    $color = $colors[$index % count($colors)];
                @endphp
                <div class="col-lg-3 col-md-3">
                    <div class="team-card-two wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="{{ $index * 100 }}ms"
                         style="--accent-color: {{ $color }};">
                        {{-- <div class="team-card-two__content">
                            <h3 class="team-card-two__title">
                                <a href="#">{{ $partner->title }}</a>
                            </h3>
                        </div> --}}
                        <div class="team-card-two__image">
                            <img src="{{ asset('assets/admin/uploads/partner/' . $partner->image) }}" alt="{{ $partner->title }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

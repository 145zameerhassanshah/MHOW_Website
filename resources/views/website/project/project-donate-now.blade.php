<section class="donate-two" style="padding-top: 100px;">
    <div class="container">
        <div class="sec-title text-center">

            <h6 class="sec-title__tagline bw-split-in-right"><span class="sec-title__tagline__border"></span>Make Donate
            </h6><!-- /.sec-title__tagline -->

            <h3 class="sec-title__title bw-split-in-left">Become a Donate Now</h3><!-- /.sec-title__title -->
        </div><!-- /.sec-title -->
        <div class="donate-two__inner">
            @if ($project->donationForm)
                <div class="row">
                    <div class="col-lg-6">
                        <div class="donate-two__content">
                            <h4 class="donate-two__title">{{ $project->donationForm->title }}</h4>
                            <div class="donate-two__text">
                                {{ $project->donationForm->sub_title }}
                            </div>
                            <h5 class="donate-two__donate-title">Your Donation:</h5>
                            <form action="#" class="donate-two__form">
                                <div class="donate-two__form__amount">
                                    <span class="donate-two__form__amount__sign">£</span>
                                    <input type="text" value="{{ $project->donationForm->amounts->first()->amount }}"
                                        name="donate_amount" id="donate_amount" placeholder="Amount"
                                        class="donate-two__form__amount__input">
                                </div><!-- /.donate-two__form__amount__box -->
                                <div class="donate-two__form__buttons">
                                    @foreach ($project->donationForm->amounts as $amount)
                                        <button type="button"
                                            class="donate-two__form__buttons__item {{ $loop->iteration == 1 ? 'active' : '' }}">£<span
                                                class="donate-two__form__buttons__amount">{{ $amount->amount }}</span></button>
                                    @endforeach
                                </div><!-- /.donate-two__form__amount__buttons -->
                                <div class="donate-two__form__submit">
                                    <button type="submit" class="careox-btn"><span>Donate Now</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="donate-two__image">
                            <img src="{{ asset($project->donationForm->image) }}" alt="careox">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<section class="video-three">
    <div class="video-three__bg jarallax" data-jarallax data-speed="0.3" data-imgPosition="50% -100%"
        style="background-image: url({{ asset('assets/core') }}/video-bg-3-1.jpg);"></div> <!-- /.video-three__bg -->
    <div class="video-three__shape" style="background-image: url(assets/images/shapes/video-shape-3.png);"></div>
    <!-- /.video-three__shape -->
    <div class="video-three__overlay"></div><!-- /.video-three__overlay -->
    <div class="container">
        <h5 class="video-three__sub-title">Make a Difference Today</h5>
        <h2 class="video-three__title">Support the Mission of MHOW</h2>
        <p class="video-three__text">
            Your generosity fuels our efforts to uplift vulnerable communities through education, relief, and
            empowerment.<br>
            Every donation brings us one step closer to a more compassionate and just world. Join us in creating lasting
            impact.
        </p>
        <a href="{{ route('front.about') }}" class="careox-btn"><span>Discover More</span></a>
    </div><!-- /.container -->
</section><!-- /.video-three -->

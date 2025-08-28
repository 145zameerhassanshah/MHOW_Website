  <footer class="main-footer background-black">
      <div class="main-footer__bg background-black"
          style="background-image: url({{ asset('assets/core') }}/footer-bg-1-1.jpg);"></div>
      <!-- /.main-footer__bg -->
      {{-- <div class="container">
                <div class="main-footer__top">
                    <div class="row">
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="00ms">
                            <div class="main-footer__top__left">
                                <div class="main-footer__top__left__icon"><i class="icon-messages"></i></div>
                                <h5 class="main-footer__top__left__title">Our Newslatter</h5>
                                <p class="main-footer__top__left__text">We are dolor sit amet csectetur</p>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <form action="#" data-url="MAILCHIMP_FORM_URL" class="main-footer__newsletter mc-form">
                                <input type="text" name="EMAIL" placeholder="Enter email address">
                                <button type="submit" class="fas fa-paper-plane">
                                    <span class="sr-only">submit</span><!-- /.sr-only -->
                                </button>
                            </form><!-- /.footer-widget__newsletter mc-form -->
                            <div class="mc-form__response"></div><!-- /.mc-form__response -->
                        </div>
                    </div>
                </div>
            </div><!-- /.main-footer__top --> --}}
      <div class="container pt-5">
          <div class="row">
              <div class="col-md-6 col-xl-4 wow fadeInUp" data-wow-delay="100ms">
                  <div class="footer-widget footer-widget--about">
                      <a href="index.html" class="footer-widget__logo">
                          <img src="{{ asset($setting->logo) }}" width="223" alt="Careox HTML Template">
                      </a>
                      <p class="footer-widget__text">
                          MHOW. Building stronger communities through care, wisdom, and collective action.
                      </p>
                      <div class="footer-widget__box">
                          <div class="footer-widget__box__icon"><i class="icon-phone-call"></i></div>
                          <p class="footer-widget__box__text"><a
                                  href="tel:{{ $setting->phone_no }}">{{ $setting->phone_no }}</a></p>
                      </div>
                  </div><!-- /.footer-widget -->
              </div><!-- /.col-md-6 -->
              <div class="col-md-6 col-xl-2 wow fadeInUp" data-wow-delay="150ms">
                  <div class="footer-widget footer-widget--links">
                      <h2 class="footer-widget__title">Other Links</h2><!-- /.footer-widget__title -->
                      <ul class="list-unstyled footer-widget__links">
                          <li><a href="{{ route('front.events') }}">Events</a></li>
                          <li><a href="{{ route('front.projects') }}">Projects</a></li>
                          <li><a href="{{ route('front.charity.pages') }}">Charity Pages</a></li>
                          <li><a href="{{ route('front.landing.pages') }}">Landing Pages</a></li>
                          <li><a target="_blank" href="https://charitydinner.mhow.org/">Charity Funraiser</a></li>
                          <li><a target="_blank" href="https://productions.mhow.org/login">Productions</a></li>
                      </ul><!-- /.list-unstyled footer-widget__links -->
                  </div><!-- /.footer-widget -->
              </div><!-- /.col-md-6 -->
              <div class="col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="200ms">
                  <div class="footer-widget footer-widget--links-two">
                      <h2 class="footer-widget__title">Quick Link</h2><!-- /.footer-widget__title -->
                      <ul class="list-unstyled footer-widget__links">
                          <li><a href="{{ route('front.about') }}">About Us</a></li>
                          {{-- {{-- <li><a href="{{ route('front.our.team') }}">Our Team</a></li> --}}
                          {{-- <li><a href="{{ route('front.way.to.donate') }}">Ways to Donate</a></li> --}}
                          <li><a href="{{ route('front.contactus') }}">Contact Us</a></li>
                          <li><a href="{{ route('front.donate.now') }}">Donate Now</a></li>
                          <li><a href="{{ route('front.volunteer') }}">Volunteer</a></li>
                          <li><a href="{{ route('front.gallery') }}">Gallery</a></li>
                      </ul><!-- /.list-unstyled footer-widget__links -->
                  </div><!-- /.footer-widget -->
              </div><!-- /.col-md-6 -->
              <div class="col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="250ms">
                  <div class="footer-widget footer-widget--contact">
                      <h2 class="footer-widget__title">Contact Info</h2><!-- /.footer-widget__title -->
                      <ul class="list-unstyled footer-widget__info">
                          <li style="--accent-color: #ff5528;">
                              <span class="footer-widget__info__icon"><i class="icofont-location-pin"></i></span>
                              {{ $setting->address }}
                          </li>
                          <li style="--accent-color: #8139e7;">
                              <span class="footer-widget__info__icon"><i class="icofont-email"></i></span>
                              <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                          </li>
                      </ul><!-- /.list-unstyled -->
                      <div class="footer-widget__social">
                          @if ($setting->fb_link)
                              <a href="{{ $setting->fb_link }}" style="--accent-color: #3b5998;">
                                  <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                  <span class="sr-only">Facebook</span>
                              </a>
                          @endif

                          @if ($setting->yt_link)
                              <a href="{{ $setting->yt_link }}" style="--accent-color: #FF0000;">
                                  <i class="fab fa-youtube" aria-hidden="true"></i>
                                  <span class="sr-only">YouTube</span>
                              </a>
                          @endif

                          @if ($setting->pinterest_link)
                              <a href="{{ $setting->pinterest_link }}" style="--accent-color: #E60023;">
                                  <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                                  <span class="sr-only">Pinterest</span>
                              </a>
                          @endif

                          @if ($setting->insta_link)
                              <a href="{{ $setting->insta_link }}" style="--accent-color: #fc5528;">
                                  <i class="fab fa-instagram" aria-hidden="true"></i>
                                  <span class="sr-only">Instagram</span>
                              </a>
                          @endif

                          @if ($setting->whatsapp_link)
                              <a href="{{ $setting->whatsapp_link }}" style="--accent-color: #075E54;">
                                  <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                  <span class="sr-only">WhatsApp</span>
                              </a>
                          @endif

                          @if ($setting->tiktok_link)
                              <a href="{{ $setting->tiktok_link }}" style="--accent-color: #25F4EE;">
                                  <i class="fab fa-tiktok" aria-hidden="true"></i>
                                  <span class="sr-only">TikTok</span>
                              </a>
                          @endif

                      </div><!-- /.footer-widget__social -->
                  </div><!-- /.footer-widget -->
              </div><!-- /.col-md-6 -->
          </div><!-- /.row -->
      </div><!-- /.container -->
      {{-- <div class="main-footer__bottom wow fadeInUp" data-wow-delay="300ms">
                <div class="container">
                    <div class="main-footer__bottom__inner">
                        <p class="main-footer__copyright">
                            &copy; Copyright <span class="dynamic-year"></span> by Careox HTML Template.
                        </p>
                    </div><!-- /.main-footer__inner -->
                </div><!-- /.container -->
            </div><!-- /.main-footer__bottom --> --}}
  </footer><!-- /.main-footer -->

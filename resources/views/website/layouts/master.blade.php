<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | MHOW</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset($setting->fav_icon) }}" />
    <link rel="manifest" href="assets/images/favicons/site.webmanifest" />
    <meta name="description"
        content="Muhammadiyah House of Wisdom (MHOW) is a global charity fostering peace, unity, and empowerment through Islamic teachings. We offer healing retreats, educational programs, and community support to promote mental, spiritual, and societal well-being." />

    @include('website.layouts.style')
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="page-wrapper">
        @if (request()->routeIs('front.index'))
            @include('website.layouts.header')
        @else
            @include('website.layouts.header-2')
        @endif
        <!-- main-slider-start -->

        @yield('content')

        @include('website.layouts.footer')

    </div><!-- /.page-wrapper -->



    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="{{ asset($setting->logo) }}" width="155"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:{{ $setting->phone_no }}">{{ $setting->phone_no }}</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__social">
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

            </div><!-- /.mobile-nav__social -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="#">
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="careox-btn">
                    <span><i class="icon-magnifying-glass"></i></span>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->
    <!-- Sidebar One Start -->
    <aside class="sidebar-one">
        <div class="sidebar-one__overlay"></div>
        <div class="sidebar-one__content">
            <div class="sidebar-one__close"><i class="icofont-close-line"></i></div>

            <div class="sidebar-one__logo">
                <a href="{{ route('front.index') }}" aria-label="logo image">
                    <img src="{{ asset($setting->logo) }}" alt="MHOW Logo" width="223">
                </a>
            </div>

            <p class="sidebar-one__text">
                MHOW. Building stronger communities through care, wisdom, and collective action.
            </p>

            <h4 class="sidebar-one__title">Contact Info:</h4>
            <ul class="sidebar-one__info">
                <li>
                    <span class="fas fa-map-marker-alt"></span>
                    {{ $setting->address }}
                </li>
                <li>
                    <span class="fas fa-envelope"></span>
                    <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                </li>
                <li>
                    <span class="fas fa-phone-alt"></span>
                    <a href="tel:{{ $setting->phone_no }}">{{ $setting->phone_no }}</a>
                </li>
            </ul>

            <div class="sidebar-one__social">
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

            </div>

            {{-- <h4 class="sidebar-one__title">Newsletter:</h4>
        <form action="#" data-url="MAILCHIMP_FORM_URL" class="sidebar-one__newsletter mc-form">
            <input type="text" name="EMAIL" placeholder="Email address">
            <button type="submit" class="fas fa-paper-plane">
                <span class="sr-only">submit</span>
            </button>
        </form> --}}
        </div>
    </aside>

    <!-- Sidebar One Start -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">back top</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    </a>


    @include('website.layouts.scripts')
    <script>
        $(document).ready(function() {
            $('.rdy').owlCarousel({
                loop: true,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                items: 1,
                autoplay: true,
                autoplayTimeout: 7000,
                smartSpeed: 1000,
                nav: false,
                dots: true,
                margin: 0
            });
        });
    </script>
</body>

</html>

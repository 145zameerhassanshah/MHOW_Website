<header class="main-header main-header--four sticky-header sticky-header--normal">
    <div class="container-fluid">
        <div class="main-header__inner">
            <div class="main-header__logo">
                <a href="{{ route('front.index') }}">
                    <img src="{{ asset($setting->logo) }}" alt="MHOW Logo" width="130px">
                </a>
            </div><!-- /.main-header__logo -->

            <nav class="main-header__nav main-menu">
                <ul class="main-menu__list">

                    <li class="py-0">
                        <a href="{{ route('front.index') }}">Home</a>
                    </li>

                    <li class="py-0">
                        <a href="{{ route('front.about') }}">About Us</a>
                    </li>

                    {{-- <li class="dropdown">
                        <a href="{{ route('front.about') }}">About Us</a>
                        <ul>
                            <li class="">
                                <a href="{{ route('front.out.partners') }}">Our Partners</a>
                            </li>
                            <li><a href="{{ route('front.way.to.donate') }}">Ways to Donate</a></li>
                        </ul>
                    </li> --}}

                    <li class="py-0">
                        <a href="{{ route('front.projects') }}">Projects</a>
                    </li>

                    <li class="py-0">
                        <a href="{{ route('front.events') }}">Events</a>
                    </li>

                    <li class="py-0">
                        <a href="{{ route('front.volunteer') }}">Volunteer</a>
                    </li>

                    <li class="py-0">
                        <a href="{{ route('front.gallery') }}">Gallery</a>
                    </li>

                    <li class="py-0">
                        <a href="{{ route('front.contactus') }}">Contact Us</a>
                    </li>

                    <li class="py-0">
                        @auth
                            <button class="mt-2 mt-mb-0"
                                style="background-color: #FF5528; color: white; height: 60px; width: 150px; border: solid #FF5528; border-radius: 500px;"
                                onclick="window.location.href='{{ route('admin.dashboard') }}';">
                                Dashboard
                            </button>
                        @endauth
                        @guest
                            <button class="mt-2 mt-mb-0"
                                style="background-color: #FF5528; color: white; height: 60px; width: 150px; border: solid #FF5528; border-radius: 500px;"
                                onclick="window.location.href='{{ route('front.donate.now') }}';">
                                Donate Now
                            </button>
                        @endguest
                    </li>

                </ul>
            </nav><!-- /.main-header__nav -->

            <div class="main-header__right ms-0">
                <div class="mobile-nav__btn mobile-nav__toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div><!-- /.mobile-nav__toggler -->
                <a href="#" class="main-header--four__toggler">
                    <div class="main-header--four__toggler__wrapper">
                        <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                    </div>
                </a>
            </div><!-- /.main-header__right -->

        </div><!-- /.main-header__inner -->
    </div><!-- /.container-fluid -->
</header><!-- /.main-header -->

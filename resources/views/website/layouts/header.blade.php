 <header class="main-header main-header--two sticky-header sticky-header--normal">
     <div class="container-fluid">
         <div class="main-header__inner">
             <div class="main-header__logo">
                 <a href="{{ route('front.index') }}">
                     <img src="{{ $setting->logo }}" alt="MHOW Logo" width="170px">
                 </a>
             </div><!-- /.main-header__logo -->

             <nav class="main-header__nav main-menu">
                 <ul class="main-menu__list">

                     <li class="">
                         <a href="{{ route('front.index') }}">Home</a>
                     </li>

                     <li class="">
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
                     <li class="">
                         <a href="{{ route('front.projects') }}">Projects</a>

                     </li>
                     <li class="">
                         <a href="{{ route('front.events') }}">Events</a>

                     </li>
                     <li>
                         <a href="{{ route('front.volunteer') }}">Volunteer</a>
                     </li>
                     <li>
                         <a href="{{ route('front.gallery') }}">Gallery</a>
                     </li>
                     <li>
                         <a href="{{ route('front.contactus') }}">Contact Us</a>
                     </li>
                 </ul>
             </nav><!-- /.main-header__nav -->
             <div class="main-header__right">
                 <div class="mobile-nav__btn mobile-nav__toggler">
                     <span></span>
                     <span></span>
                     <span></span>
                 </div><!-- /.mobile-nav__toggler -->

                 @guest
                     <a href="{{ route('front.donate.now') }}" class="careox-btn"><span><i class="icofont-heart"></i>Donate Now</span></a>
                 @endguest
                 @auth
                     <a target="_blank" href="{{ route('admin.dashboard') }}" class="careox-btn"><span>Dashboard</span></a>
                 @endauth
             </div><!-- /.main-header__right -->
         </div><!-- /.main-header__inner -->
     </div><!-- /.container-fluid -->
 </header><!-- /.main-header -->

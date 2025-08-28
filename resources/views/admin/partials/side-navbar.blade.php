<aside class="main-sidebar elevation-4 main-sidebar elevation-4 sidebar-primary-primary">
    <!-- Sidebar -->
    @php
        use Illuminate\Support\Facades\Route;
    @endphp

    <div class="sidebar pt-0 mt-0">

        <div class="user-panel">
            <a href="{{ route('admin.dashboard') }}" class="name text-dark">
                <img src="{{ asset('assets/admin/img/MhowLogo.png') }}" alt="" width="200px">
            </a>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }} @if (request()->path() == 'admin/dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteName() == 'admin.profile.edit' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.profile.edit') }}"
                        class="nav-link {{ Route::currentRouteName() == 'admin.profile.edit' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            {{ __('Profile') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'admin.booking.index' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.booking.index') }}"
                        class="nav-link {{ Route::currentRouteName() == 'admin.booking.index' ? 'active' : '' }} @if (request()->path() == 'admin/dashboard') active @endif">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            {{ __('Bookings') }}
                        </p>
                    </a>
                </li>

                {{-- Slider --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'old.tours.index' ? 'menu-open' : '' }}">
                    <a href="{{ route('old.tours.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            {{ __('Old System') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('old.tours.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'old.tours.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('All Tours') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- end Slider --}}

                {{-- Slider --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.slider' || Route::currentRouteName() == 'admin.slider.add' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.slider') }}" class="nav-link">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            {{ __('Slider') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.slider') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.slider' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Slider list') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.slider.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.slider.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add New Slide') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- end Slider --}}

                {{-- Pages --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.page.index' || Route::currentRouteName() == 'admin.page.create' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.page.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            {{ __('Pages') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        {{-- All Pages --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.page.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.page.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('All Pages') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Events --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.event.index' || Route::currentRouteName() == 'admin.event.create' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.event.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-plus"></i>
                        <p>
                            {{ __('Events') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        {{-- All Events --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.event.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.event.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('All Events') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- users --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.user.index' || Route::currentRouteName() == 'admin.user.pendingUsers' || Route::currentRouteName() == 'admin.user.approvedUsers' || Route::currentRouteName() == 'admin.user.blockedUsers' ? 'menu-open' : '' }}">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('Users') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.user.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('All Users') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.pendingUsers') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.user.pendingUsers' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Pending Users') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.approvedUsers') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.user.approvedUsers' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Approved Users') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.blockedUsers') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.user.blockedUsers' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Blocked Users') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Partner --}}
                {{-- Start of Payment Method --}}
                <li class="nav-item {{ request()->routeIs('admin.payment.method.*') ? 'menu-open' : '' }}">
                    <a href=""
                        class="nav-link {{ request()->routeIs('admin.payment.method.*') ? 'active' : '' }}">
                        <i class="bi bi-credit-card-fill mx-1"></i>
                        <p>
                            {{ __('Payment Methods') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('payment.method.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.payment.method.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('List') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('payment.method.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.payment.method.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End of Payment Method --}}
                <li class="nav-item">
                    <a href="{{ route('admin.country.index') }}"
                        class="nav-link {{ Route::currentRouteName() == 'admin.country.index' ? 'active' : '' }}">
                        <i class="nav-icon bi bi-globe-europe-africa"></i>
                        <p>
                            {{ __('Countries') }}
                        </p>
                    </a>
                </li>
                {{-- country end --}}
                {{-- start of donation source  --}}

                <li class="nav-item {{ request()->routeIs('admin.donation-source.*') ? 'menu-open' : '' }}">
                    <a href=""
                        class="nav-link {{ request()->routeIs('admin.donation-source.*') ? 'active' : '' }}">
                        <i class="fas fa-hand-holding-heart mx-1"></i>
                        <p>
                            {{ __('Donation Sources') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.donation-source.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.donation-source.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('List') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.donation-source.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.donation-source.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add') }}</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('donation-forms.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'donation-forms.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Donation Forms') }}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- end of donation source  --}}

                <li class="nav-item {{ request()->routeIs('admin.department.*') ? 'menu-open' : '' }}">
                    <a href=""
                        class="nav-link {{ request()->routeIs('admin.department.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            {{ __('Departments') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.department.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.department.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('List') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.department.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.department.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item {{ request()->routeIs('admin.project-category.*') ? 'menu-open' : '' }}">
                    <a href=""
                        class="nav-link {{ request()->routeIs('admin.project-category.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        <p>
                            {{ __('Project Categories') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.project-category.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.project-category.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('List') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.project-category.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.project-category.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- end of proect category --}}
                <li class="nav-item {{ request()->routeIs('admin.project.*') ? 'menu-open' : '' }}">
                    <a href="" class="nav-link {{ request()->routeIs('admin.project.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            {{ __('Project') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.project.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.project.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('List') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.project.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.project.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- start volunteer --}}
                <li class="nav-item {{ request()->routeIs('admin.volunteer.*') ? 'menu-open' : '' }}">
                    <a href="" class="nav-link {{ request()->routeIs('admin.volunteer.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hands-helping"></i>
                        <p>
                            {{ __('Volunteer') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.volunteer.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.volunteer.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('List') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.volunteer.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.volunteer.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- end volunteer --}}

                {{-- start volunteer type --}}
                <li class="nav-item {{ request()->routeIs('admin.volunteer-type.*') ? 'menu-open' : '' }}">
                    <a href=""
                        class="nav-link {{ request()->routeIs('admin.volunteer-type.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            {{ __('Volunteer Type') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.volunteer-type.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.volunteer-type.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('List') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.volunteer-type.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.volunteer-type.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- end volunteer type --}}

                <li class="nav-item {{ request()->routeIs('admin.campaign.*') ? 'menu-open' : '' }}">
                    <a href="" class="nav-link {{ request()->routeIs('admin.campaign.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            {{ __('Campaign') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.campaign.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.campaign.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('List') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.campaign.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.campaign.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item {{ request()->routeIs('admin.donor.*') ? 'menu-open' : '' }}">
                    <a href="" class="nav-link {{ request()->routeIs('admin.donor.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>
                            {{ __('Donor') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.donor.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.donor.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('List') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.donor.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.donor.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item {{ request()->routeIs('admin.donor.*') ? 'menu-open' : '' }}">
                    <a href="" class="nav-link {{ request()->routeIs('admin.donor.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-donate"></i>
                        <p>
                            {{ __('Donation') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.donation.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.donor.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('List') }}</p>
                            </a>
                        </li>
                        {{-- donation end --}}

                        {{-- donor start --}}
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ Route::currentRouteName() == 'admin.donor.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- donor end --}}
                {{-- start of email-templates --}}

                <li class="nav-item {{ request()->routeIs('admin.email-templates.*') ? 'menu-open' : '' }}">
                    <a href=""
                        class="nav-link {{ request()->routeIs('admin.email-templates.*') ? 'active' : '' }}">
                        <i class="bi bi-envelope-at-fill mx-1"></i>
                        <p>
                            {{ __('Emails') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.email-templates.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.email-templates.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Email Templates') }}</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.email-attachments.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.email-attachments.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Email Attachments') }}</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>

                {{-- end of email-templates --}}
                 {{-- start referralsource --}}
                <li class="nav-item {{ request()->routeIs('admin.referralsource.*') ? 'menu-open' : '' }}">
                    <a href="" class="nav-link {{ request()->routeIs('admin.referralsource.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>
                            {{ __('ReferralSource') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.referralsource.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.referralsource.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('List') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.referralsource.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.referralsource.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                {{-- Gallery --}}

                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.gcategory.index' || Route::currentRouteName() == 'admin.gallery.index' ? 'menu-open' : '' }}">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            {{ __('Gallery') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.gallery.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.gallery.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Galleries') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.gcategory.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.gcategory.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Categories') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Gallery --}}


                {{-- Blog --}}
                {{-- <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.bcategory.index' || Route::currentRouteName() == 'admin.blog.index' ? 'menu-open' : '' }}">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            {{ __('Blog') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.blog.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.blog.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Blogs') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.bcategory.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.bcategory.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Categories') }}</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                {{-- Blog --}}


                {{-- Job --}}
                {{-- <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.job.index' || Route::currentRouteName() == 'admin.jcategory.index' ? 'menu-open' : '' }}">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            {{ __('Job') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.job.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.job.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Jobs') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.jcategory.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.jcategory.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Categories') }}</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                {{-- Job --}}

                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.partner.index' || Route::currentRouteName() == 'admin.partner.add' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.partner.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            {{ __('Partner') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.partner.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.partner.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('All Partners') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.partner.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.partner.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add Partner') }}</p>
                            </a>
                        </li>
                    </ul>
                    {{-- Partner End --}}










                    {{-- Enquiry --}}
                <li
                    class="nav-item {{ Route::currentRouteName() == 'admin.enquiry.index' || Route::currentRouteName() == 'admin.enquiry.add' ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.enquiry.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            {{ __('Enquiry') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.enquiry.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.enquiry.index' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('All Enquiries') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.enquiry.add') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.enquiry.add' ? 'active' : '' }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>{{ __('Add Enquiry') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Enquiry End --}}

                {{-- Settings --}}

                <li class="nav-item">
                    <a href="{{ route('admin.setting.edit') }}"
                        class="nav-link {{ Route::currentRouteName() == 'admin.setting.edit' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            {{ __('Settings') }}
                        </p>
                    </a>
                </li>

                {{-- Settings End --}}

                {{-- Trash --}}

                <li class="nav-item {{ Route::currentRouteName() == 'menu-open' }}">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-trash"></i>

                        <p>
                            {{ __('Trash') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.enquiry.restore.page') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.enquiry.restore.page' ? 'active' : '' }}">
                                <i class="fas fa-question-circle"></i>
                                <p>{{ __('Enquiries') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.country.restore.page') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.country.restore.page' ? 'active' : '' }}">
                                <i class="nav-icon bi bi-globe-europe-africa"></i>
                                <p>{{ __('Countries') }}</p>
                            </a>
                        </li>
                            <li class="nav-item">
                            <a href="{{ route('admin.city.restore.page') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.city.restore.page' ? 'active' : '' }}">
                                <i class="fas fa-city"></i>
                                <p>{{ __('Cities') }}</p>
                            </a>
                        </li>
     <li class="nav-item">
         <a href="{{ route('admin.donation-source.trash') }}"
       class="nav-link {{ Route::currentRouteName() == 'admin.donation-source.trash' ? 'active' : '' }}">
        <i class="fas fa-hand-holding-heart mx-1"></i>
        <p>{{ __('Donation Sources ') }}</p>
    </a>
</li>
                        




                    </ul>
                </li>

                {{-- End of Trash --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

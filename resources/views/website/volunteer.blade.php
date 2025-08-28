@extends('website.layouts.master')
@section('title', 'Become a Volunteer')

@section('content')
    <style>
        .image-field {
            display: block;
            width: 100%;
            height: 58px;
            background-color: transparent;
            color: var(--careox-text-dark, #727472);
            font-size: 16px;
            font-weight: 400;
            border: 1px solid #DDDDDD;
            border-radius: 30px;
            outline: none;
            padding: 10px 30px;
        }
    </style>
    <!-- main-slider-end -->
    <section class="page-header">
        <div class="page-header__bg">
            <img src="{{ asset('assets/core/BreadCrumb.png') }}" alt="">
        </div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title bw-split-in-left">Become a Volunteer</h2>
            <ul class="careox-breadcrumb list-unstyled">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li><span>Become a Volunteer</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <section class="service-two" style="background-color: #FFFFFF !important;">
        <div class="service-two__shape" style="background-image: url(assets/images/shapes/service-shape-3.png);"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="become-volunter__content">
                        <h3 class="become-volunter__title">Volunteer Requirements</h3>
                        <p class="become-volunter__text">
                            At MHOW, we welcome passionate individuals who are ready to make a real difference. Volunteering
                            with us means becoming part of a mission rooted in compassion, service, and lasting impact.
                            Whether it’s on the ground or behind the scenes, every effort counts.
                        </p>
                        <div class="become-volunter__highlight">HELPED MOBILIZE THOUSANDS OF VOLUNTEERS ACROSS 18 COUNTRIES, CREATING LASTING CHANGE FOR MILLIONS.</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="become-volunter__image">
                                    <img src="{{ asset('assets/core') }}/become-volunter-1.jpg" alt="careox">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="become-volunter__image">
                                    <img src="{{ asset('assets/core') }}/become-volunter-2.jpg" alt="careox">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form id="volunteerForm" class="contact-one__form  form-one"
                        action="{{ route('front.store.volunteer') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-one__group">
                            <div class="form-one__control form-one__control--full">
                                <input type="text" name="name" placeholder="Your Name">
                                <small class="error-label" style="color:red;"></small>
                            </div><!-- /.form-one__control -->
                            <div class="form-one__control form-one__control--full">
                                <input type="email" name="email" placeholder="Email Address">
                                <small class="error-label" style="color:red;"></small>
                            </div><!-- /.form-one__control -->
                            <div class="form-one__control form-one__control--full">
                                <input type="tel" name="phone_no" placeholder="Phone No">
                                <small class="error-label" style="color:red;"></small>
                            </div><!-- /.form-one__control -->
                            <div class="form-one__control">
                                <div class="form-one__control__select">
                                    <div class="dropdown bootstrap-select dropup"><select class="selectpicker"
                                            aria-label="Default select example" name="country_id" tabindex="null">
                                            <option disabled selected>Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <small class="error-label" style="color:red;"></small>
                                    </div>
                                </div><!-- /.main-menu__language -->
                            </div><!-- /.form-one__control -->
                            <div class="form-one__control">
                                <div class="form-one__control__select">
                                    <div class="dropdown bootstrap-select dropup"><select class="selectpicker"
                                            aria-label="Default select example " name="volunteer_type_id" tabindex="null">
                                            <option disabled selected>Volunteer Type</option>
                                            @foreach ($volunteer_types as $volunteer_type)
                                                <option value="{{ $volunteer_type->id }}">{{ $volunteer_type->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="error-label" style="color:red;"></small>
                                    </div>
                                </div><!-- /.main-menu__language -->
                            </div><!-- /.form-one__control -->
                            {{-- <div class="form-one__control form-one__control--full">
                                <input type="file" name="image" class="image-field" accept="image/*">
                                <small class="error-label" style="color:red;"></small>
                            </div><!-- /.form-one__control --> --}}
                            <div class="form-one__control
                                    form-one__control--full">
                                <button type="submit" class="careox-btn careox-btn--base"
                                    style="background-color: #FFA415; color: white;"><span>Send Request</span></button>
                            </div><!-- /.form-one__control -->
                        </div><!-- /.form-one__group -->
                    </form>
                </div>
            </div>
        </div>
    </section>



@endsection

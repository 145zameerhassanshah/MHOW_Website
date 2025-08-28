@extends('website.layouts.master')
@section('title','MHOW')

@section('content')

        <!-- main-slider-end -->
        @include('website.partials.breadcrumb')

        {{-- why partners --}}
        <section class="about-one about-one--about">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-one__image wow fadeInLeft" data-wow-delay="100ms">
                            <div class="about-one__image__one">
                                <img src="assets/images/resources/about-1-3.jpg" alt="careox">
                            </div>
                            <div class="about-one__image__two">
                                <img src="assets/images/resources/about-1-4.jpg" alt="careox">
                                
                            </div>
                            <div class="about-one__image__shape-two"><img src="assets/images/shapes/about-1-shape-5.png" alt="careox"></div>
                        </div><!-- /.about__image -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="200ms">
                        <div class="about-one__content">
                            <div class="sec-title text-left">

                                <h6 class="sec-title__tagline bw-split-in-right"><span class="sec-title__tagline__border"></span>Why Partnership Matters</h6><!-- /.sec-title__tagline -->

                                <h3 class="sec-title__title bw-split-in-left">Stronger Together, For a Greater Impact</h3><!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <p class="about-one__content__text">
                                At Mhow, we believe that lasting change is only possible through collaboration. Our partners—ranging from local businesses and NGOs to global organizations—bring expertise, resources, and commitment that help us reach more people and transform more lives. Together, we can tackle challenges, amplify our impact, and build a better future for the communities we serve.
                            </p>
                            
                            <a href="about.html" class="careox-btn"><span>About More</span></a>
                        </div><!-- /.about__content -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <div class="about-one__text wow fadeInUp"><span>#</span> We Give Donations Poor People Impact on Someone’s Life. <a href="donation.html" class="careox-btn"><span>Donate Now</span></a></div>
            </div><!-- /.container -->
        </section><!-- /.about-one -->
        {{-- end why partners --}}

        {{-- partners --}}

        <section class="team-two team-two--page">
            <div class="container">
                <div class="sec-title text-center">

                    <h6 class="sec-title__tagline bw-split-in-right"><span class="sec-title__tagline__border"></span>Our Expert Team</h6><!-- /.sec-title__tagline -->

                    <h3 class="sec-title__title bw-split-in-left">Our Valued Partners</h3><!-- /.sec-title__title -->
                </div><!-- /.sec-title -->
                <div class="row gutter-y-30">
                    <div class="col-lg-4 col-md-6">
                        <div class="team-card-two wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms' style='--accent-color: #ffa415;'>
                            <div class="team-card-two__content">
                                <h3 class="team-card-two__title">
                                    <a href="team-details.html">Ethel Daley</a>
                                </h3><!-- /.team-card-two__title -->
                                <p class="team-card-two__designation">Founder</p><!-- /.team-card-two__designation -->
                                <div class="team-card-two__hover">
                                    <span class="team-card-two__hover__btn"></span>
                                    <div class="team-card-two__hover__social">
                                        <a href="https://facebook.com" style="--accent-color: #ffa415;">
                                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            <span class="sr-only">Facebook</span>
                                        </a>
                                        <a href="https://twitter.com" style="--accent-color: #fc5528;">
                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                            <span class="sr-only">Twitter</span>
                                        </a>
                                        <a href="https://pinterest.com" style="--accent-color: #8139e7;">
                                            <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                                            <span class="sr-only">Pinterest</span>
                                        </a>
                                        <a href="https://instagram.com" style="--accent-color: #44c895;">
                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                            <span class="sr-only">Instagram</span>
                                        </a>
                                    </div><!-- /.team-card-two__social -->
                                </div><!-- /.team-card-two__hover -->
                            </div><!-- /.team-card-two__content -->
                            <div class="team-card-two__image">
                                <img src="assets/images/team/team-2-1.jpg" alt="Ethel Daley">
                            </div><!-- /.team-card-two__image -->
                        </div><!-- /.team-card-two -->
                    </div><!-- /.col-lg-4 col-md-6 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="team-card-two wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='100ms' style='--accent-color: #fc5528;'>
                            <div class="team-card-two__content">
                                <h3 class="team-card-two__title">
                                    <a href="team-details.html">John Hines</a>
                                </h3><!-- /.team-card-two__title -->
                                <p class="team-card-two__designation">Manager</p><!-- /.team-card-two__designation -->
                                <div class="team-card-two__hover">
                                    <span class="team-card-two__hover__btn"></span>
                                    <div class="team-card-two__hover__social">
                                        <a href="https://facebook.com" style="--accent-color: #ffa415;">
                                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            <span class="sr-only">Facebook</span>
                                        </a>
                                        <a href="https://twitter.com" style="--accent-color: #fc5528;">
                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                            <span class="sr-only">Twitter</span>
                                        </a>
                                        <a href="https://pinterest.com" style="--accent-color: #8139e7;">
                                            <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                                            <span class="sr-only">Pinterest</span>
                                        </a>
                                        <a href="https://instagram.com" style="--accent-color: #44c895;">
                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                            <span class="sr-only">Instagram</span>
                                        </a>
                                    </div><!-- /.team-card-two__social -->
                                </div><!-- /.team-card-two__hover -->
                            </div><!-- /.team-card-two__content -->
                            <div class="team-card-two__image">
                                <img src="assets/images/team/team-2-2.jpg" alt="John Hines">
                            </div><!-- /.team-card-two__image -->
                        </div><!-- /.team-card-two -->
                    </div><!-- /.col-lg-4 col-md-6 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="team-card-two wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='200ms' style='--accent-color: #8139e7;'>
                            <div class="team-card-two__content">
                                <h3 class="team-card-two__title">
                                    <a href="team-details.html">Jason Bower</a>
                                </h3><!-- /.team-card-two__title -->
                                <p class="team-card-two__designation">Volunter</p><!-- /.team-card-two__designation -->
                                <div class="team-card-two__hover">
                                    <span class="team-card-two__hover__btn"></span>
                                    <div class="team-card-two__hover__social">
                                        <a href="https://facebook.com" style="--accent-color: #ffa415;">
                                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            <span class="sr-only">Facebook</span>
                                        </a>
                                        <a href="https://twitter.com" style="--accent-color: #fc5528;">
                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                            <span class="sr-only">Twitter</span>
                                        </a>
                                        <a href="https://pinterest.com" style="--accent-color: #8139e7;">
                                            <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                                            <span class="sr-only">Pinterest</span>
                                        </a>
                                        <a href="https://instagram.com" style="--accent-color: #44c895;">
                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                            <span class="sr-only">Instagram</span>
                                        </a>
                                    </div><!-- /.team-card-two__social -->
                                </div><!-- /.team-card-two__hover -->
                            </div><!-- /.team-card-two__content -->
                            <div class="team-card-two__image">
                                <img src="assets/images/team/team-2-3.jpg" alt="Jason Bower">
                            </div><!-- /.team-card-two__image -->
                        </div><!-- /.team-card-two -->
                    </div><!-- /.col-lg-4 col-md-6 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="team-card-two wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='300ms' style='--accent-color: #44c895;'>
                            <div class="team-card-two__content">
                                <h3 class="team-card-two__title">
                                    <a href="team-details.html">John Salazar</a>
                                </h3><!-- /.team-card-two__title -->
                                <p class="team-card-two__designation">Volunter</p><!-- /.team-card-two__designation -->
                                <div class="team-card-two__hover">
                                    <span class="team-card-two__hover__btn"></span>
                                    <div class="team-card-two__hover__social">
                                        <a href="https://facebook.com" style="--accent-color: #ffa415;">
                                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            <span class="sr-only">Facebook</span>
                                        </a>
                                        <a href="https://twitter.com" style="--accent-color: #fc5528;">
                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                            <span class="sr-only">Twitter</span>
                                        </a>
                                        <a href="https://pinterest.com" style="--accent-color: #8139e7;">
                                            <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                                            <span class="sr-only">Pinterest</span>
                                        </a>
                                        <a href="https://instagram.com" style="--accent-color: #44c895;">
                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                            <span class="sr-only">Instagram</span>
                                        </a>
                                    </div><!-- /.team-card-two__social -->
                                </div><!-- /.team-card-two__hover -->
                            </div><!-- /.team-card-two__content -->
                            <div class="team-card-two__image">
                                <img src="assets/images/team/team-2-4.jpg" alt="John Salazar">
                            </div><!-- /.team-card-two__image -->
                        </div><!-- /.team-card-two -->
                    </div><!-- /.col-lg-4 col-md-6 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="team-card-two wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='400ms' style='--accent-color: #399be7;'>
                            <div class="team-card-two__content">
                                <h3 class="team-card-two__title">
                                    <a href="team-details.html">Richard Vivier</a>
                                </h3><!-- /.team-card-two__title -->
                                <p class="team-card-two__designation">Volunter</p><!-- /.team-card-two__designation -->
                                <div class="team-card-two__hover">
                                    <span class="team-card-two__hover__btn"></span>
                                    <div class="team-card-two__hover__social">
                                        <a href="https://facebook.com" style="--accent-color: #ffa415;">
                                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            <span class="sr-only">Facebook</span>
                                        </a>
                                        <a href="https://twitter.com" style="--accent-color: #fc5528;">
                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                            <span class="sr-only">Twitter</span>
                                        </a>
                                        <a href="https://pinterest.com" style="--accent-color: #8139e7;">
                                            <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                                            <span class="sr-only">Pinterest</span>
                                        </a>
                                        <a href="https://instagram.com" style="--accent-color: #44c895;">
                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                            <span class="sr-only">Instagram</span>
                                        </a>
                                    </div><!-- /.team-card-two__social -->
                                </div><!-- /.team-card-two__hover -->
                            </div><!-- /.team-card-two__content -->
                            <div class="team-card-two__image">
                                <img src="assets/images/team/team-2-5.jpg" alt="Richard Vivier">
                            </div><!-- /.team-card-two__image -->
                        </div><!-- /.team-card-two -->
                    </div><!-- /.col-lg-4 col-md-6 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="team-card-two wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='500ms' style='--accent-color: #d340c3;'>
                            <div class="team-card-two__content">
                                <h3 class="team-card-two__title">
                                    <a href="team-details.html">Steve Smith</a>
                                </h3><!-- /.team-card-two__title -->
                                <p class="team-card-two__designation">Volunter</p><!-- /.team-card-two__designation -->
                                <div class="team-card-two__hover">
                                    <span class="team-card-two__hover__btn"></span>
                                    <div class="team-card-two__hover__social">
                                        <a href="https://facebook.com" style="--accent-color: #ffa415;">
                                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            <span class="sr-only">Facebook</span>
                                        </a>
                                        <a href="https://twitter.com" style="--accent-color: #fc5528;">
                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                            <span class="sr-only">Twitter</span>
                                        </a>
                                        <a href="https://pinterest.com" style="--accent-color: #8139e7;">
                                            <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                                            <span class="sr-only">Pinterest</span>
                                        </a>
                                        <a href="https://instagram.com" style="--accent-color: #44c895;">
                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                            <span class="sr-only">Instagram</span>
                                        </a>
                                    </div><!-- /.team-card-two__social -->
                                </div><!-- /.team-card-two__hover -->
                            </div><!-- /.team-card-two__content -->
                            <div class="team-card-two__image">
                                <img src="assets/images/team/team-2-6.jpg" alt="Steve Smith">
                            </div><!-- /.team-card-two__image -->
                        </div><!-- /.team-card-two -->
                    </div><!-- /.col-lg-4 col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.team-two -->

        {{-- end partners --}}

        {{-- Achievements --}}
        <section class="donations-three">
            <div class="donations-three__bg" style="background-image: url(assets/images/backgrounds/donation-bg-3.jpg);"></div>
            <div class="container">
                <div class="sec-title text-left">

                    <h6 class="sec-title__tagline bw-split-in-right"><span class="sec-title__tagline__border"></span>Real Lives. Real Impact.</h6><!-- /.sec-title__tagline -->

                    <h3 class="sec-title__title bw-split-in-left">Together, We’ve Achieved</h3><!-- /.sec-title__title -->
                </div><!-- /.sec-title -->
                <div class="donations-three__carousel careox-owl__carousel owl-carousel" data-owl-options='{
			"items": 1,
			"margin": 30,
			"loop": false,
			"smartSpeed": 700,
			"nav": true,
			"navText": ["<span class=\"icon-up-arrow-two\"></span>","<span class=\"icon-down-arrow-two\"></span>"],
			"dots": false,
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
                    <div class="item">
                        <div class="donations-three__item" style="--accent-color: #ffa415;">
                            <div class="donations-three__item__image">
                                <img src="assets/images/donation/donation-3-1.jpg" alt="careox">
                                <a href="donation-details.html" class="donations-three__item__image__link"></a>
                                <div class="donations-three__item__category">Poor</div>
                                <a class="donations-three__item__rm" href="donation-details.html"><i class="icon-right-arrow"></i></a>
                            </div>
                            <div class="donations-three__item__content">
                                <h3 class="donations-three__item__title"><a href="donation-details.html">There Are Many Variations Qassages Poor</a></h3>
                                <p class="donations-three__item__text">We poor standard chunk ofI nibh velit auctor aliquet sollic tudin.</p>
                            </div>
                            <div class="donations-three__item__border"></div>
                            <div class="donations-three__item__bottom">
                                <div class="donations-three__item__bottom__progress">
                                    <div class="donations-three__item__bottom__progress__inner count-bar" data-percent="85%">
                                        <div class="donations-three__item__bottom__progress__number count-text">85%</div>
                                    </div>
                                </div><!-- /.progress-box -->
                                <div class="donations-three__item__bottom__text">
                                    <span>$23,000 Goals</span>
                                    <span>$9,000 Donate</span>
                                </div>
                            </div><!-- /.donations-three__item__bottom -->
                        </div>
                    </div><!-- /.item -->
                    <div class="item">
                        <div class="donations-three__item" style="--accent-color: #ff5528;">
                            <div class="donations-three__item__image">
                                <img src="assets/images/donation/donation-3-2.jpg" alt="careox">
                                <a href="donation-details.html" class="donations-three__item__image__link"></a>
                                <div class="donations-three__item__category">Raised</div>
                                <a class="donations-three__item__rm" href="donation-details.html"><i class="icon-right-arrow"></i></a>
                            </div>
                            <div class="donations-three__item__content">
                                <h3 class="donations-three__item__title"><a href="donation-details.html">It is a long established fact that a reader</a></h3>
                                <p class="donations-three__item__text">We poor standard chunk ofI nibh velit auctor aliquet sollic tudin.</p>
                            </div>
                            <div class="donations-three__item__border"></div>
                            <div class="donations-three__item__bottom">
                                <div class="donations-three__item__bottom__progress">
                                    <div class="donations-three__item__bottom__progress__inner count-bar" data-percent="80%">
                                        <div class="donations-three__item__bottom__progress__number count-text">80%</div>
                                    </div>
                                </div><!-- /.progress-box -->
                                <div class="donations-three__item__bottom__text">
                                    <span>$13,000 Goals</span>
                                    <span>$5,000 Donate</span>
                                </div>
                            </div><!-- /.donations-three__item__bottom -->
                        </div>
                    </div><!-- /.item -->
                    <div class="item">
                        <div class="donations-three__item" style="--accent-color: #8742e8;">
                            <div class="donations-three__item__image">
                                <img src="assets/images/donation/donation-3-3.jpg" alt="careox">
                                <a href="donation-details.html" class="donations-three__item__image__link"></a>
                                <div class="donations-three__item__category">Medical</div>
                                <a class="donations-three__item__rm" href="donation-details.html"><i class="icon-right-arrow"></i></a>
                            </div>
                            <div class="donations-three__item__content">
                                <h3 class="donations-three__item__title"><a href="donation-details.html">We Can Aenean Poor leo Nec This Enovation.</a></h3>
                                <p class="donations-three__item__text">We poor standard chunk ofI nibh velit auctor aliquet sollic tudin.</p>
                            </div>
                            <div class="donations-three__item__border"></div>
                            <div class="donations-three__item__bottom">
                                <div class="donations-three__item__bottom__progress">
                                    <div class="donations-three__item__bottom__progress__inner count-bar" data-percent="72%">
                                        <div class="donations-three__item__bottom__progress__number count-text">72%</div>
                                    </div>
                                </div><!-- /.progress-box -->
                                <div class="donations-three__item__bottom__text">
                                    <span>$89,000 Goals</span>
                                    <span>$6,000 Donate</span>
                                </div>
                            </div><!-- /.donations-three__item__bottom -->
                        </div>
                    </div><!-- /.item -->
                    <div class="item">
                        <div class="donations-three__item" style="--accent-color: #44c895;">
                            <div class="donations-three__item__image">
                                <img src="assets/images/donation/donation-3-4.jpg" alt="careox">
                                <a href="donation-details.html" class="donations-three__item__image__link"></a>
                                <div class="donations-three__item__category">Education</div>
                                <a class="donations-three__item__rm" href="donation-details.html"><i class="icon-right-arrow"></i></a>
                            </div>
                            <div class="donations-three__item__content">
                                <h3 class="donations-three__item__title"><a href="donation-details.html">Let’s Education for Children Good Future Life.</a></h3>
                                <p class="donations-three__item__text">We poor standard chunk ofI nibh velit auctor aliquet sollic tudin.</p>
                            </div>
                            <div class="donations-three__item__border"></div>
                            <div class="donations-three__item__bottom">
                                <div class="donations-three__item__bottom__progress">
                                    <div class="donations-three__item__bottom__progress__inner count-bar" data-percent="90%">
                                        <div class="donations-three__item__bottom__progress__number count-text">90%</div>
                                    </div>
                                </div><!-- /.progress-box -->
                                <div class="donations-three__item__bottom__text">
                                    <span>$29,000 Goals</span>
                                    <span>$7,000 Donate</span>
                                </div>
                            </div><!-- /.donations-three__item__bottom -->
                        </div>
                    </div><!-- /.item -->
                </div><!-- /.donations-three__slider -->
            </div>
        </section>
        {{-- end achieveement --}}
           <!-- Become Volunter Start -->
        <section class="become-volunter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="become-volunter__content">
                            <h3 class="become-volunter__title">Become a Partner</h3>
                            <p class="become-volunter__text">
Ready to make a meaningful difference? We invite corporations, organizations, and individuals to partner with us in our mission to empower communities and transform lives. Your support can help us expand our reach, create sustainable solutions, and build a brighter, more equitable future. Together, we can achieve so much more than we ever could alone.                            </p>
                            <div class="become-volunter__highlight">Helped fund 589,537 Projects in 24 Countries, Benefiting over<br> 45k+ Million people.</div>
                            <ul class="become-volunter__list">
                                <li>
                                    <span class="become-volunter__list__icon"><i class="icofont-check-circled"></i></span>
                                    We help companies develop powerful corporate social <a href="about.html">Responsibility,</a>
                                </li>
                                <li>
                                    <span class="become-volunter__list__icon"><i class="icofont-check-circled"></i></span>
                                    Helped fund 3,265 Project powerful corporate poor.
                                </li>
                            </ul>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="become-volunter__image">
                                        <img src="assets/images/resources/become-volunter-1.jpg" alt="careox">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="become-volunter__image">
                                        <img src="assets/images/resources/become-volunter-2.jpg" alt="careox">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form class="contact-one__form contact-form-validated form-one wow fadeInUp" data-wow-duration="1500ms" action="inc/sendemail.php">
                            <div class="form-one__group">
                                <div class="form-one__control form-one__control--full">
                                    <input type="text" name="name" placeholder="Your Name">
                                </div><!-- /.form-one__control -->
                                <div class="form-one__control form-one__control--full">
                                    <input type="email" name="email" placeholder="Email Address">
                                </div><!-- /.form-one__control -->
                                <div class="form-one__control form-one__control--full">
                                    <input type="tel" name="phone" placeholder="Phone No">
                                </div><!-- /.form-one__control -->
                                <div class="form-one__control">
                                    <input type="text" name="address" placeholder="Address">
                                </div><!-- /.form-one__control -->
                                <div class="form-one__control">
                                    <div class="form-one__control__select">
                                        <select class="selectpicker" aria-label="Default select example">
                                            <option selected="">Occupation</option>
                                            <option value="1">Business Man</option>
                                            <option value="2">Lawyer</option>
                                            <option value="3">Doctor</option>
                                            <option value="4">Engineer</option>
                                            <option value="5">Social Worker</option>
                                            <option value="6">Agricultural</option>
                                        </select>
                                    </div><!-- /.main-menu__language -->
                                </div><!-- /.form-one__control -->
                                <div class="form-one__control form-one__control--full">
                                    <textarea name="message" placeholder="Write a Message"></textarea><!-- /# -->
                                </div><!-- /.form-one__control -->
                                <div class="form-one__control form-one__control--full">
                                    <button type="submit" class="careox-btn"><span>Send Request</span></button>
                                </div><!-- /.form-one__control -->
                            </div><!-- /.form-one__group -->
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Become Volunter End -->

        @include('website.partials.cta-two')
@endsection

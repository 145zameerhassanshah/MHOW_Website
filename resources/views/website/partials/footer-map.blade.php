<section class="info mt-5 mb-5">
    <div class="container">
        <ul class="info__wrapper">
            @if (!empty($setting->phone_no))
                <li style="--accent-color: #ffa415;">
                    <div class="info__icon"><span class="icofont-phone"></span></div>
                    <div class="info__content">
                        <h5 class="info__title">Call Me</h5>
                        <p class="info__text"><a href="tel:{{ $setting->phone_no }}">{{ $setting->phone_no }}</a></p>
                    </div>
                </li>
            @endif

            @if (!empty($setting->email))
                <li style="--accent-color: #ff5528;">
                    <div class="info__icon"><span class="icofont-envelope"></span></div>
                    <div class="info__content">
                        <h5 class="info__title">Email</h5>
                        <p class="info__text"><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></p>
                    </div>
                </li>
            @endif

            @if (!empty($setting->address))
                <li style="--accent-color: #8139e7;">
                    <div class="info__icon"><span class="icofont-location-pin"></span></div>
                    <div class="info__content">
                        <h5 class="info__title">Address</h5>
                        <p class="info__text">
                            <a href="https://maps.app.goo.gl/ZmjqqtWMZvx4QFWSA">{{ $setting->address }}</a>
                        </p>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</section>

<section class="contact-map">
    <div class="container-fluid">
        <div class="google-map google-map__contact">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21162580.825045206!2d-3.8238462276836356!3d43.986437565005104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487bb5e660a528f3%3A0xd772403b68ccd580!2sMuhammadiyah%20House%20of%20Wisdom!5e0!3m2!1sen!2s!4v1750139460168!5m2!1sen!2s"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="map__contact">
            </iframe>
        </div>
    </div>
</section>

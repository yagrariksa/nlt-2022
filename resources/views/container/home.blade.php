@extends('template.client')

@section('title', 'Selamat Datang - NLT AMSA 2022')
@section('seo-desc')
@section('seo-img')

@section('addclass', 'home')

@section('content')
    <div class="landing">
        <div class="landing__mahavira">
            <h1 class="landing__title">MAHAVIRA</h1>
            <div class="landing__sub">
                <h1 class="landing__year">2022</h1>
                <hr>
                <h3 class="landing__nlt">National <br>Leadership <br>Training</h3>
            </div>
        </div>
        <div class="landing__mahavira--sm">
            <h1 class="landing__title">MAHA</h1>
            <div class="landing__2nd-title">
                <h1 class="landing__title">VIRA</h1>
                <div class="landing__sub">
                    <h1 class="landing__year">2022</h1>
                    <hr>
                    <h3 class="landing__nlt">National <br>Leadership <br>Training</h3>
                </div>
            </div>
        </div>
        <h5 class="landing__by">by AMSA UNAIR</h5>
    </div>

    <div class="about" id="about">
        <div class="about__title">
            <h1 class="xl about__title--highlight">About</h1>
            <h1 class="xl about__title--light">MAHAVIRA <br>2022</h1>
        </div>
        <h4 class="about__desc">
            National Leadership Training (NLT) is a national-level AMSA-Indonesia work program
            that is held annually. This program aims as a means of developing self-ability in
            organizing effectively and efficiently as well as increasing intimacy between
            AMSA-Indonesia members. At the National Leadership Training (NLT) 2022 event, AMSA-UNAIR,
            as the host university, raised the theme, namely MAHAVIRA (Mastering The Art of Heroism
            and Leadership in Virtuous Generation). In Sanskrit, 'Maha' means great and 'Vira' means
            brave. A leader is someone who has the ability to influence others and is responsible for
            the realization of a certain goal. Therefore, MAHAVIRA 2022 was held with the aim of being
            a lesson material to become a quality leader from the struggle of the heroes. The entire
            series of activities will be held online on March 25-27 2022 and will be attended by
            approximately 304 delegates from 38 universities.
        </h4>
    </div>

    <div class="highlighted-agenda" id="agendas">
        <h1 class="highlighted-agenda__title">Our Highlighted Agendas</h1>
        <div class="highlighted-agenda__agendas">
            <div class="highlighted-agenda__agenda">
                <h2>Welcome Party</h2>
                <h4>A welcoming event for participants of MAHAVIRA 2022 to introduce and increase the
                    intimacy between medical students in AMSA-Indonesia. There will be several remarks
                    and performances, such as musical drama in collaboration with the Theatrical UKM of
                    Airlangga University.</h4>
            </div>
            <div class="highlighted-agenda__agenda">
                <h2>Outbound</h2>
                <h4>An activity designed to train and improve teamwork skills, motivation, and
                    problem-solving for AMSA-Indonesia participants. This activity will be conducted
                    in the form of Group Outbound Sessions, which will include a variety of activities
                    and games involving teamwork, problem-solving, survival, as well as discussion and
                    sharing.</h4>
            </div>
            <div class="highlighted-agenda__agenda">
                <h2>City Tour</h2>
                <h4>We would like to take you to go around Surabaya virtually and introduce the city and
                    culture of Surabaya, especially the Faculty of Medicine, Universitas Airlangga.</h4>
            </div>
            <div class="highlighted-agenda__agenda">
                <h2>Guest Star</h2>
                <h4>Farewell is an agenda for offering performances and farewells to participants who
                    have participated in MAHAVIRA 2022, which includes several guest stars.</h4>
            </div>
            <div class="highlighted-agenda__agenda">
                <h2>Social Hour</h2>
                <h4>Farewell is an agenda for offering performances and farewells to participants who
                    have participated in MAHAVIRA 2022, which includes several guest stars.</h4>
            </div>
        </div>
    </div>

    <div class="guideline" id="guideline">
        <div class="guideline__text">
            <h1 class="xl guideline__title">Grab Our Guideline Book!</h1>
            <img src="{{ url('assets/img/guide-book.png') }}" alt="" class="guideline__img--sm">
            <h4 class="guideline__desc">
                For more details and requirements of MAHAVIRA 2022, please refer to this guideline!
                <a href="{{ url('https://drive.google.com/file/d/1LBbvvln-tWASnWQ4gQLhQmxnoVXBGPRr/view?usp=sharing') }}"
                    class="button btn-primary guideline__btn">DOWNLOAD GUIDELINE</a>
            </h4>
        </div>
        <img src="{{ url('assets/img/guide-book.png') }}" alt="" class="guideline__img">
    </div>

    <div class="timeline" id="timeline">
        <h1 class="xl timeline__title">Timeline <img src="{{ url('assets/img/ic-timeline.svg') }}" alt=""></h1>
        <div class="timeline__desc">
            {{-- <img src="{{ url('assets/img/timeline-ornament.svg') }}" alt="" class="timeline__ornament"> --}}
            <div class="timeline__ornament">
                @for ($i = 0; $i < 20; $i++)
                    <hr />
                @endfor
            </div>
            <div class="timeline__block">
                <hr class="timeline__line timeline__line--green">
                <h3 class="timeline__event">Early Registration</h3>
                <h4 class="timeline__date">5 - 8 March 2022</h4>
            </div>
            <div class="timeline__block">
                <hr class="timeline__line timeline__line--middle-green">
                <h3 class="timeline__event">Extra Seat Registration</h3>
                <h4 class="timeline__date">11-14 March 2022</h4>
            </div>
            <div class="timeline__block">
                <hr class="timeline__line timeline__line--flax">
                <h3 class="timeline__event">Delegates Announcement</h3>
                <h4 class="timeline__date">15 March 2022</h4>
            </div>
            <div class="timeline__block">
                <hr class="timeline__line">
                <h3 class="timeline__event">D, Day of Event</h3>
                <h4 class="timeline__date">3 April 2022 <br>9 - 10 April 2022</h4>
            </div>
        </div>
    </div>

    <div class="video">
        <h1 class="xl video__title--sm">Check Our Profile Video!</h1>
        <div class="video__container">
            <h1 class="video__title">Check Our <br>Profile Video!</h1>
            <a href="{{ url('https://youtu.be/Jji5z6HcS5o') }}" class="button video__btn" target="_blank"
                rel="noopener noreferrer">CLICK HERE</a>
            <a href="{{ url('https://youtu.be/Jji5z6HcS5o') }}" class="button video__btn--sm" target="_blank"
                rel="noopener noreferrer"><img src="{{ url('assets/img/play.svg') }}" alt=""></a>
        </div>
    </div>

    <div class="foreword">
        {{-- here --}}
    </div>

    <div class="sponsors" id="our-sponsor">
        <h1 class="sponsors__title">Get To Know About <span>Our Sponsors</span></h1>
        <div class="sponsors__list">
            <div class="sponsors__logo-name" onclick="location.href= '{{ route('sponsor') }}'">
                <img src="{{ url('assets/img/excel.svg') }}" alt="" class="sponsors__logo">
                <h4 class="sponsors__name">Excel</h4>
            </div>
            <div class="sponsors__logo-name">
                <img src="{{ url('assets/img/excel.svg') }}" alt="" class="sponsors__logo">
                <h4 class="sponsors__name">Excel</h4>
            </div>
            <div class="sponsors__logo-name">
                <img src="{{ url('assets/img/excel.svg') }}" alt="" class="sponsors__logo">
                <h4 class="sponsors__name">Excel</h4>
            </div>
            <div class="sponsors__logo-name">
                <img src="{{ url('assets/img/excel.svg') }}" alt="" class="sponsors__logo">
                <h4 class="sponsors__name">Excel</h4>
            </div>
            <div class="sponsors__logo-name">
                <img src="{{ url('assets/img/excel.svg') }}" alt="" class="sponsors__logo">
                <h4 class="sponsors__name">Excel</h4>
            </div>
        </div>
    </div>

    <div class="footer" id="contact-us">
        <div class="footer__content">
            <div class="footer__items">
                <h3 class="footer__title">Visit</h3>
                <div class="footer__desc">
                    <div class="footer__desc--item">
                        @include('components.svg.instagram')
                        <a href="{{ url('https://www.instagram.com/amsaindonesia/') }}" target="_blank"
                            rel="noopener noreferrer">amsaindonesia</a>
                    </div>
                    <div class="footer__desc--item">
                        @include('components.svg.youtube')
                        <a href="{{ url('https://youtube.com/user/AMSAIndonesia') }}" target="_blank"
                            rel="noopener noreferrer">youtube.com/AMSAIndonesia</a>
                    </div>
                    <div class="footer__desc--item">
                        @include('components.svg.web')
                        <a href="{{ url('https://amsaindonesia.org/amsa-indonesia/') }}" target="_blank"
                            rel="noopener noreferrer">amsaindonesia.org/amsa-indonesia/</a>
                    </div>
                </div>
            </div>

            <img src="{{ url('assets/img/footer-img.png') }}" alt="">
        </div>
        <h6 class="footer__copyright">AMSA UNAIR, 2022</h6>
    </div>
@endsection

@section('other')
    {{-- it can be modal, etc. --}}
@endsection

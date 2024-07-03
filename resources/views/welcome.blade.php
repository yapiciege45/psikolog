@extends('layouts.welcome.master')

@section('css')

@endsection

@section('content')
    <header class="header">
        <div class="container">
            <img style="width: 80px;" src="{{ asset($settings->logo) }}" alt="Logo">
            <div class="nav">
                <a href="{{ route('index') }}#home">Anasayfa</a>
                {{-- <a href="{{ route('index') }}#pricing">Fiyat</a> --}}
                <a href="{{ route('index') }}#sss">SSS</a>
                <a href="{{ route('index') }}#contact">İletişim</a>
            </div>
            <div class="hamburger">
                <svg style="transform: scale(2);"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="white"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8l16 0" /><path d="M4 16l16 0" /></svg>
            </div>
        </div>
    </header>

    <div class="mobile-menu">
        <div class="mobile-x">
            <svg style="transform: scale(2);" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
        </div>
        <a href="{{ route('index') }}#home">Anasayfa</a>
        <a href="{{ route('index') }}#pricing">Fiyat</a>
        <a href="{{ route('index') }}#sss">SSS</a>
        <a href="{{ route('index') }}#contact">İletişim</a>
    </div>

    <div id="home" class="top-header">
        <div class="container">
            <div class="home-mid">
                <h1>Psikolog</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley...</p>
                <a href="#pricing">Satın Al</a>
            </div>
        </div>
    </div>

    {{-- <div id="pricing">
        @foreach ($packages as $package)
            <div class="pricing-card">
                <h4>{{ $package->name }}</h4>
                <div class="features">
                    @foreach ($package->packageFeatures as $packageFeature)
                        <p>
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                            {{ $packageFeature->name }}
                        </p>
                    @endforeach
                </div>
                <a target="_blank" href="https://wa.me/+905511494774" class="buy-button">
                    Hemen Al
                </a>
            </div>
        @endforeach
    </div> --}}

    <div id="sss">
        <div class="container">
            @foreach ($questions as $question)
                <div class="question-container">
                    <div class="question-header">
                        <div class="question-header-left">
                            <svg style="transform: scale(1.3);" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-help-octagon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12.802 2.165l5.575 2.389c.48 .206 .863 .589 1.07 1.07l2.388 5.574c.22 .512 .22 1.092 0 1.604l-2.389 5.575c-.206 .48 -.589 .863 -1.07 1.07l-5.574 2.388c-.512 .22 -1.092 .22 -1.604 0l-5.575 -2.389a2.036 2.036 0 0 1 -1.07 -1.07l-2.388 -5.574a2.036 2.036 0 0 1 0 -1.604l2.389 -5.575c.206 -.48 .589 -.863 1.07 -1.07l5.574 -2.388a2.036 2.036 0 0 1 1.604 0z" /><path d="M12 16v.01" /><path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" /></svg>
                            {{ $question->question }}
                        </div>
                        <div class="question-header-right">
                            <svg style="transform: scale(1.3);" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 9l6 6l6 -6" /></svg>
                        </div>
                    </div>
                    <div class="question-answer">
                        <p>{{ $question->answer }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="contact">
        <div class="container">
            <div class="contact-left">
                <p>E-posta: <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></p>
                <p>Telefon: {{ $settings->phone }}</p>
            </div>
            <form action="{{ route('contact') }}" method="POST" class="contact-right">
                @csrf

                <div class="input-container">
                    <label class="input-label" for="subject">Konu</label>
                    <input name="subject" type="text" />
                </div>
                <div class="input-container">
                    <label class="input-label" for="email">E-posta</label>
                    <input name="email" type="email" />
                </div>
                <div class="input-container">
                    <label class="input-label" for="message">Mesaj</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </div>
                <button class="form-submit" type="submit">Gönder</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('.header');

            if (window.scrollY > 0) {
                navbar.classList.add('active');
            } else {
                navbar.classList.remove('active');
            }
        });
    </script>

    <script>
        $('.hamburger').on('click', function() {
            $('.mobile-menu').toggleClass('active')
        })
    </script>

    <script>
        $('.mobile-x').on('click', function() {
            $('.mobile-menu').toggleClass('active')
        })
    </script>

    <script>
        $('.question-header').on('click', function() {
            $(this).parent().toggleClass('active');
        })
    </script>
@endsection
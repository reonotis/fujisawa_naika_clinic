@extends('layouts.app')

@push('scripts')
@endpush

@section('content')

    {{-- ヒーロー画像スライドショー --}}
    <section class="hero-slideshow">
        @include('layouts.partials.hero-slideshow')
    </section>

    {{-- お知らせ --}}
    <section id="news">
        <div class="container">
            @include('layouts.partials.news')
        </div>
    </section>

    {{-- 外来担当医表 --}}
    <section id="doctor_calendar">
        <div class="container">
            @include('layouts.partials.doctor-calendar-list', [
                'doctor_calendar_data' => $doctor_calendar_data,
            ])
        </div>
    </section>

    {{-- 診療案内 --}}
    <section id="medical_services">
        @include('layouts.partials.medical_services')
    </section>

    {{-- 自費診療 --}}
{{--    <section>--}}
{{--        @include('layouts.partials.self_pay')--}}
{{--    </section>--}}


    {{-- 医師紹介 --}}
    {{-- <section id="doctor">
        <div class="container section-inner">
            <div class="section-header">
                <h2>医師紹介</h2>
            </div>
            <div class="doctor-profile">
                <div class="image-card circle">
                    <img src="{{ asset('images/doctor.png') }}" alt="院長写真イメージ（仮）" />
                </div>
                <div>
                    <h3>院長　藤澤 光沙（ふじさわ ありす）</h3>
                    <p>
                        大学病院および地域中核病院にて、内科・救急医療・生活習慣病治療などに従事してまいりました。
                        これまでの経験を生かし、地域の皆さまの健康を総合的に支えていきたいと考えております。
                    </p>
                    <p>
                        「話しやすさ」と「わかりやすい説明」を大切にしながら診療いたしますので、
                        気になる症状やお薬のことなど、どうぞ遠慮なくご相談ください。
                    </p>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- 診療時間 --}}
    <section id="hours">
        @include('layouts.partials.hours')
    </section>

    {{-- アクセス --}}
    <section id="access">
        @include('layouts.partials.access')
    </section>

@endsection

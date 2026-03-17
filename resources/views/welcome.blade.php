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

    <!-- ヒーローセクション（テキスト・情報） -->
    <section class="hero" aria-labelledby="hero-title">
        <div class="hero-content container">
            <h1>地域に寄り添う、かかりつけ内科</h1>
            <p class="hero-lead">
                藤澤内科クリニックは、風邪などの急な体調不良から、
                生活習慣病・慢性疾患まで幅広く診療いたします。
            </p>
            <div class="hero-info">
                <div>
                    <h3>診療時間</h3>
                    <p>
                        午前 / {{ \App\Constants\CommonConst::CLINIC_HOURS_AM }}、午後 / {{ \App\Constants\CommonConst::CLINIC_HOURS_PM }}{{ \App\Constants\CommonConst::CLINIC_HOURS_SAT_NOTE }}<br />
                        休診日：{{ \App\Constants\CommonConst::CLINIC_CLOSED_DAYS }}
                    </p>
                </div>
                <div>
                    <h3>お電話でのご予約・お問い合わせ</h3>
                    <p class="hero-tel"><a href="tel:{{ \App\Constants\CommonConst::CLINIC_TEL }}">TEL：{{ \App\Constants\CommonConst::CLINIC_TEL }}</a></p>
                </div>
            </div>
        </div>
    </section>

    {{-- 診療案内 --}}
    <section id="medical_services">
        @include('layouts.partials.medical_services')
    </section>

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

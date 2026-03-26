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
    <section>
        @include('layouts.partials.self_pay')
    </section>

    {{-- 診療時間 --}}
    <section id="hours">
        @include('layouts.partials.hours')
    </section>

    {{-- 医師紹介 --}}
    <section id="doctor">
        @include('layouts.partials.doctor')
    </section>

    {{-- アクセス --}}
    <section id="access">
        @include('layouts.partials.access')
    </section>

@endsection

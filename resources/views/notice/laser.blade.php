@extends('layouts.app')

@push('scripts')
    @vite('resources/scss/notice-detail.scss')
@endpush

@section('breadcrumb')
    @include('layouts.partials.breadcrumb', ['crumbs' => [
        ['label' => '自費診療', 'url' => route('self_pay')],
        ['label' => '医療用レーザー治療のご案内'],
    ]])
@endsection

@section('content')

    <div class="container">
        <div class="notice-container">
            <h1>当院からのお知らせ</h1>

            <h2>医療用レーザー治療のご案内</h2>

            <div class="notice-img">
                <img src="{{ asset('images/notice/laser-treatment-summer.jpg') }}" alt="医療用レーザー治療のご案内">
            </div>

            <p class="notice-pdf-link">
                <a href="{{ asset('pdf/laser-treatment-summer.pdf') }}" target="_blank" rel="noopener">PDFをダウンロード</a>
            </p>

            <p class="notice-clinic">
                医療法人社団藤光会　藤澤内科クリニック<br>
                院長　藤澤 光沙
            </p>
        </div>
    </div>

@endsection

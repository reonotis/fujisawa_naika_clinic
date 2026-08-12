@extends('layouts.app')

@section('title', '自費診療メニュー（レーザー治療・白玉注射・にんにく注射）｜流山市 藤澤内科クリニック')
@section('description', 'しみ・肝斑のレーザー治療、白玉注射、にんにく注射、プラセンタ注射など、藤澤内科クリニックの自費診療メニューと料金をご紹介。')

@push('scripts')
    @vite('resources/scss/self-pay.scss')
@endpush

@section('breadcrumb')
    @include('layouts.partials.breadcrumb', ['crumbs' => [
        ['label' => '自費診療'],
    ]])
@endsection

@section('content')

    <div class="self-pay-page">
        @include('layouts.partials.self_pay', ['showLink' => false])
    </div>

@endsection

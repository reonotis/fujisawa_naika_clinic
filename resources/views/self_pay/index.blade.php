@extends('layouts.app')

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

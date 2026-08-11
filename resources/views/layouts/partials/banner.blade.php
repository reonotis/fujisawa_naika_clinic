
@push('scripts')
@endpush

@php
    $banners = [
        [
            'image' => 'images/banner/laser-banner.png',
            'alt' => '医療用レーザー治療のご案内',
            'route' => 'laser_notice',
        ],
    ];
@endphp

<div class="container">
    <div class="banner-list">
        @foreach ($banners as $banner)
            <a href="{{ route($banner['route']) }}" class="banner-item">
                <img src="{{ asset($banner['image']) }}" alt="{{ $banner['alt'] }}">
            </a>
        @endforeach
    </div>
</div>

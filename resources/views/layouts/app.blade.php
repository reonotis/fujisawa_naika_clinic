<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>流山市の胃カメラ（胃内視鏡検査）｜経鼻内視鏡・鎮静剤対応｜藤澤内科クリニック</title>
    <meta name="description" content="流山市の内科クリニック。専門医が、高血圧や糖尿病等の生活習慣病から健康診断まで幅広く対応します。胃カメラ（経鼻可）・大腸カメラは麻酔で眠ったまま苦痛を抑えた検査が可能です。女性医師在籍。安心の診療で、地域の健康を支えます。" />
    <meta property="og:title" content="流山市の胃カメラ（胃内視鏡検査）｜経鼻内視鏡・鎮静剤対応｜藤澤内科クリニック" />
    <meta property="og:description" content="流山市の内科クリニック。専門医が、高血圧や糖尿病等の生活習慣病から健康診断まで幅広く対応します。胃カメラ（経鼻可）・大腸カメラは麻酔で眠ったまま苦痛を抑えた検査が可能です。女性医師在籍。安心の診療で、地域の健康を支えます。" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('images/logo_2.png') }}" />
    <meta property="og:site_name" content="流山市の胃カメラ（胃内視鏡検査）｜経鼻内視鏡・鎮静剤対応｜藤澤内科クリニック" />
    <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}" />

    @vite('resources/scss/app.scss')
    @vite(['resources/js/app.js'])

    {{-- Page-specific scripts --}}
    @stack('scripts')
</head>

<body>
    @include('layouts.partials.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')

</body>

</html>

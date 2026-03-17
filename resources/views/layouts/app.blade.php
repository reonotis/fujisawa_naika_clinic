<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>藤澤内科クリニック</title>
    <meta name="description" content="千葉県流山市の藤澤内科クリニック公式サイト。内科・循環器内科を中心に、生活習慣病（高血圧・糖尿病・脂質異常症）や風邪・発熱などの一般内科診療を行っています。診療内容、診療時間、アクセス、休診日やお知らせをわかりやすくご案内します。" />
    <meta property="og:title" content="藤澤内科クリニック｜千葉県流山市の内科・循環器内科" />
    <meta property="og:description" content="千葉県流山市の藤澤内科クリニック公式サイト。内科・循環器内科を中心に、生活習慣病（高血圧・糖尿病・脂質異常症）や風邪・発熱などの一般内科診療を行っています。診療内容、診療時間、アクセス、休診日やお知らせをわかりやすくご案内します。" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('images/logo_2.png') }}" />
    <meta property="og:site_name" content="藤澤内科クリニック" />
    <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}" />

    @vite('resources/scss/app.scss')
    @vite(['resources/js/app.js'])

    <!-- Page-specific scripts -->
    @stack('scripts')
</head>

<body>
    @include('layouts.partials.header')
    @include('layouts.partials.navigation')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')

</body>

</html>

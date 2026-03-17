<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>藤澤内科クリニック</title>
    <meta name="description" content="藤澤内科クリニックの公式サイト。診療内容、診療時間、アクセス、お知らせなどをご案内しています。" />

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

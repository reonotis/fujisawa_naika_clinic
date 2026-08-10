<nav class="breadcrumb" aria-label="パンくずリスト">
    <div class="container">
        <ol class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="{{ route('top') }}">トップ</a>
            </li>
            @foreach ($crumbs as $crumb)
                <li class="breadcrumb-item {{ $loop->last ? 'breadcrumb-item--current' : '' }}">
                    @if (!$loop->last && isset($crumb['url']))
                        <a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a>
                    @else
                        <span>{{ $crumb['label'] }}</span>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</nav>

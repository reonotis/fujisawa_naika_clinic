@push('scripts')
@endpush

<div class="container">
    <h2 data-en="NEWS">お知らせ</h2>
    <div class="news-list">
        @foreach ($news as $item)
            @if(filled($item->route))
                <a href="{{ url($item->route) }}" class="news-item">
                    <div class="news-date">{{ $item->published_at->format('Y.m.d') }}</div>
                    <div class="news-type"><span class="{{ $item->type }}">{{ $item->type_comment }}</span></div>
                    <div class="news-body">@if($item->is_new)<span class="news-new">new</span> @endif{{ $item->title }}</div>
                </a>
            @else
                <div class="news-item">
                    <div class="news-date">{{ $item->published_at->format('Y.m.d') }}</div>
                    <div class="news-type"><span class="{{ $item->type }}">{{ $item->type_comment }}</span></div>
                    <div class="news-body">@if($item->is_new)<span class="news-new">new</span> @endif{{ $item->title }}</div>
                </div>
            @endif
        @endforeach
    </div>
</div>

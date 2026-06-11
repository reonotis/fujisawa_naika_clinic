
@push('scripts')
@endpush

@php
    $news = [
        [
            'date' => Carbon\Carbon::parse('2026-06-11'),
            'type' => 'notice',
            'type_comment' => 'お知らせ',
            'title' => '令和6年度 流山市特定健診・肝炎ウイルス検診のご案内（6/15〜）',
            'route' => 'kensin_notice',
        ],
        [
            'date' => Carbon\Carbon::parse('2026-06-11'),
            'type' => 'notice',
            'type_comment' => 'お知らせ',
            'title' => '7月の外来担当医表を公開しました。',
        ],
        [
            'date' => Carbon\Carbon::parse('2026-06-02'),
            'type' => 'notice',
            'type_comment' => 'お知らせ',
            'title' => '胸部レントゲン撮影にAI機能を搭載しました。',
            'route' => 'ai_xray_notice',
        ],
        [
            'date' => Carbon\Carbon::parse('2026-04-01'),
            'type' => 'notice',
            'type_comment' => 'お知らせ',
            'title' => '当院のマイナ保険証体制につきまして',
            'route' => 'maina_notice',
        ],
//        [
//            'date' => Carbon\Carbon::parse('2026-03-15'),
//            'type' => 'notice',
//            'type_comment' => 'お知らせ',
//            'title' => '4/1 は 代診ドクターになります。',
//        ],
    ];
    $news = array_map(function ($item) {
        $item['new'] = $item['date']->gte(Carbon\Carbon::now()->subWeek()) && $item['date']->lte(Carbon\Carbon::now());
        return $item;
    }, $news);
@endphp

<div class="container">
    <h2 data-en="NEWS">お知らせ</h2>
    <div class="news-list">
        @foreach ($news as $item)
            @if(isset($item['route']))
                <a href="{{ route($item['route']) }}" class="news-item">
                    <div class="news-date">{{ $item['date']->format('Y.m.d') }}</div>
                    <div class="news-type"><span class="{{ $item['type'] }}">{{ $item['type_comment'] }}</span></div>
                    <div class="news-body">@if($item['new'])<span class="news-new">new</span> @endif{{ $item['title'] }}</div>
                </a>
            @else
                <div class="news-item">
                    <div class="news-date">{{ $item['date']->format('Y.m.d') }}</div>
                    <div class="news-type"><span class="{{ $item['type'] }}">{{ $item['type_comment'] }}</span></div>
                    <div class="news-body">@if($item['new'])<span class="news-new">new</span> @endif{{ $item['title'] }}</div>
                </div>
            @endif
        @endforeach
    </div>
</div>


@push('scripts')
@endpush

@php
    $news = [
        [
            'date' => Carbon\Carbon::parse('2026-03-15'),
            'type' => 'notice',
            'type_comment' => 'お知らせ',
            'title' => '4/1 は 代診ドクターになります。',
        ],
        [
            'date' => Carbon\Carbon::parse('2026-03-15'),
            'type' => 'off',
            'type_comment' => '休診',
            'title' => '3/21 は 休診になります。',
        ],
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
        <div class="news-item">
            <div class="news-date">{{ $item['date']->format('Y.m.d') }}</div>
            <div class="news-type"><span class="{{ $item['type'] }}">{{ $item['type_comment'] }}</span></div>
            <div class="news-body">@if($item['new'])<span class="news-new">new</span> @endif{{ $item['title'] }}</div>
        </div>
        @endforeach
    </div>
</div>

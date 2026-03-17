
@push('scripts')
@endpush

@php
    $news = [
        [
            'date' => Carbon\Carbon::parse('2026-03-15'),
            'title' => '4/1 は 代診ドクターになります。',
        ],
        [
            'date' => Carbon\Carbon::parse('2026-03-15'),
            'title' => '3/21 は 休診になります。',
        ],
    ];
    $news = array_map(function ($item) {
        $item['new'] = $item['date']->gte(Carbon\Carbon::now()->subWeek()) && $item['date']->lte(Carbon\Carbon::now());
        return $item;
    }, $news);
@endphp

<div>
    <h2>お知らせ</h2>
    <ul class="news-list">
        @foreach ($news as $item)
        <li>
            <span class="news-date">{{ $item['date']->format('Y.m.d') }}</span>
            <span class="news-body">@if($item['new'])<span class="news-new">new</span> @endif{{ $item['title'] }}</span>
        </li>
        @endforeach
    </ul>
</div>

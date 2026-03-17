@props([
    'data' => [],
])

@php
    // 1週間＝7日ごとに分割（週ごとに目次列を出したいのでチャンク）
    $weeks = array_chunk($data, 7);

@endphp

<div class="doctor-calendar-grid">
    {{-- ヘッダー行 --}}
    <div class="calendar-cell calendar-cell-th-row"></div>
    @foreach (['月', '火', '水', '木', '金', '土', '日'] as $dow)
        <div class="calendar-cell calendar-cell-th-row">{{ $dow }}</div>
    @endforeach

    {{-- 週ごとにチャンクした配列をループし、最初の列に目次（AM/PM）を出す --}}
    @foreach ($weeks as $week)
        {{-- その週の目次列（1列目） --}}
        <div class="calendar-cell calendar-cell-th">
            <div>　</div>
            <div>AM</div>
            <div>PM</div>
        </div>

        {{-- その週の7日分を、1ループの中で「日付 / AM / PM」をまとめて出力 --}}
        @foreach ($week as $day_data)
            <div class="calendar-cell @if(empty($day_data)) out-of-month @endif">
                {{-- 日付 --}}
                <div class="@if(isset($day_data['date'])) calendar-date @endif">
                    {{ isset($day_data['date']) ? \Carbon\Carbon::parse($day_data['date'])->format('j') : '-' }}
                </div>

                @if(isset($day_data['close']))
                    <div class="calendar-close">{{ $day_data['close'] }}</div>
                @elseif(isset($day_data['irregular']))
                    <div class="calendar-irregular">{{ $day_data['irregular'] }}</div>
                @else
                    {{-- AM --}}
                    @php $clsAm = $day_data['am'] ?? ''; @endphp
                    <div class="calendar-am {{ $clsAm }}"></div>

                    {{-- PM --}}
                    @php $clsPm = $day_data['pm'] ?? ''; @endphp
                    <div class="calendar-pm {{ $clsPm }}"></div>
                @endif
            </div>
        @endforeach
    @endforeach
</div>
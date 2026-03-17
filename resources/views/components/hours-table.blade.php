@props([
    'addClass' => '',
])

@push('scripts')
@endpush

<table class="hours-table {{ $addClass }}">
    <thead>
        <tr>
            <th>診療時間</th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th>土</th>
            <th>日・祝</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>午前：{{ \App\Constants\CommonConst::CLINIC_HOURS_AM }}</th>
            <td>●</td>
            <td>●</td>
            <td>●</td>
            <td>－</td>
            <td>●</td>
            <td>●</td>
            <td>－</td>
        </tr>
        <tr>
            <th>午後：{{ \App\Constants\CommonConst::CLINIC_HOURS_PM }}</th>
            <td>●</td>
            <td>●</td>
            <td>●</td>
            <td>－</td>
            <td>●</td>
            <td>－</td>
            <td>－</td>
        </tr>
    </tbody>
</table>
{{ $slot }}

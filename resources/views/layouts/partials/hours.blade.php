@push('scripts')
@endpush

<div class="container">
    <h2 data-en="HOURS">診療時間</h2>
    <div class="hours-layout">
        <div class="hours-table-wrapper">
            <x-hours-table>
                <p class="note">
                    ※{{ \App\Constants\CommonConst::CLINIC_CLOSED_DAYS }}は休診です。<br />
                    ※初診の方は、受付終了時間の30分前までにお越しください。
                </p>
            </x-hours-table>
        </div>
        <div class="hours-contact">
            <h3>ご来院・ご予約について</h3>
            <ul>
                <li>お電話でのご予約・お問い合わせ：
                    <a href="tel:{{ \App\Constants\CommonConst::CLINIC_TEL }}">
                        <strong>{{ \App\Constants\CommonConst::CLINIC_TEL }}</strong>
                    </a>
                </li>
                <li>発熱や咳などの症状がある方は、事前にお電話でご連絡ください。</li>
                <li>健康診断・予防接種は予約制となります。</li>
            </ul>
        </div>
    </div>
</div>


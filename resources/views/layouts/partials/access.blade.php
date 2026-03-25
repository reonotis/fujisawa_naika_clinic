@push('scripts')
@endpush

<div class="container">
    <h2>アクセス</h2>
    <div class="access-layout">
        <div class="access-item">
            <div class="access-item-title">所在地</div>
            <div class="access-item-content">
                    〒{{ \App\Constants\CommonConst::CLINIC_POSTAL_CODE }}<br />
                    {{ \App\Constants\CommonConst::CLINIC_ADDRESS }}  <a href="https://maps.app.goo.gl/TsKCo7KNHeGS78a88" class="anchor-link" target="_blank">(Google Mapで開く)</a>
            </div>
        </div>
        <div class="access-item">
            <div class="access-item-title">電話</div>
            <div class="access-item-content">
                <a href="tel:{{ \App\Constants\CommonConst::CLINIC_TEL }}">{{ \App\Constants\CommonConst::CLINIC_TEL }}</a><br />
            </div>
        </div>
        <div class="access-item">
            <div class="access-item-title">FAX</div>
            <div class="access-item-content">{{ \App\Constants\CommonConst::CLINIC_FAX }}</div>
        </div>
        <div class="access-item">
            <div class="access-item-title">診療時間</div>
            <div class="access-item-content">
                午前：{{ \App\Constants\CommonConst::CLINIC_HOURS_AM }}<br />
                午後：{{ \App\Constants\CommonConst::CLINIC_HOURS_PM }}
            </div>
        </div>
        <div class="access-item">
            <div class="access-item-title">休診日</div>
            <div class="access-item-content">
                木曜日、土曜日、日曜日、祝日<br />
                ※土曜日は午前のみ
            </div>
        </div>
    </div>
</div>
<div class="google-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3233.459955820254!2d139.90753008226153!3d35.86224361857048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60189b16aa56ec79%3A0xd12a34d4b534a907!2z6Jek5r6k5YaF56eR44Kv44Oq44OL44OD44Kv!5e0!3m2!1sja!2sjp!4v1773495576234!5m2!1sja!2sjp" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

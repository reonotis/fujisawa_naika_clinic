<header>
    <div class="container">
        <div class="header-inner">
            <div class="header-hours">
                <x-hours-table addClass="on-header" />
            </div>
            <div class="header-app-logo">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="アイコン" >
                </div>
                <div>
                    <span class="logo-main">藤澤内科クリニック</span>
                    <span class="logo-sub">Fujisawa Naika Clinic</span>
                </div>
            </div>
            <div class="header-contact">
                <a href="tel:{{ \App\Constants\CommonConst::CLINIC_TEL }}">
                    <img src="{{ asset('images/tel.png') }}" alt="電話" >
                </a>
            </div>
        </div>
    </div>
</header>

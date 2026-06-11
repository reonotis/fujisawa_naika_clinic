@extends('layouts.app')

@push('scripts')
    @vite('resources/scss/endoscopy.scss')
@endpush

@section('content')

    {{-- ヒーローエリア --}}
    <div class="endoscopy-hero">
        <img src="{{ asset('images/slideshow/endoscope.jpg') }}" alt="内視鏡検査">
        <div class="endoscopy-hero-text">
            <p>胃カメラ・大腸カメラ</p>
            <h1>当院の内視鏡検査の特徴</h1>
        </div>
    </div>

    <div class="container">

        {{-- イントロ --}}
        <section class="endoscopy-intro">
            <p>日本人の死因の上位を占める胃がん・大腸がんは、<strong>早期発見により90％以上が治癒可能</strong>とされています。<br>
            当院では、精度の高い検査と苦痛の少ない体制を整えています。</p>
        </section>

        {{-- 7つの特徴 --}}
        <section class="endoscopy-features">
            <h2 data-en="FEATURES">7つの特徴</h2>

            {{-- 01 --}}
            <article class="feature-item">
                <div class="feature-body">
                    <div class="feature-header">
                        <span class="feature-num">01</span>
                        <h3>内視鏡専門医による検査</h3>
                    </div>
                    <p>日本消化器内視鏡学会の認定を受けた「内視鏡専門医」が検査を担当します。小さな病変も見逃さないよう、緻密な観察を行います。検査中に病変を確認した場合、組織を採取して病理検査を行い、確定診断を出すことができます。</p>
                </div>
                <div class="feature-img">
                    <img src="{{ asset('images/endoscopy/endoscopy-specialist.png') }}" alt="内視鏡専門医による検査">
                </div>
            </article>

            {{-- 02 --}}
            <article class="feature-item feature-item--reverse">
                <div class="feature-body">
                    <div class="feature-header">
                        <span class="feature-num">02</span>
                        <h3>女性医師による大腸内視鏡検査</h3>
                    </div>
                    <p>女性が発症するがんの中で死亡原因の1位は大腸癌です。ライフスタイルの変化や食生活の乱れが影響していると言われますが、定期的な検査で予防、早期発見が可能です。</p>
                    <p>特に女性は検査を受けることに抵抗がある方も数多くいらっしゃると思いますが、当院では流山市では数少ない、内視鏡専門医を持つ女性医師による大腸内視鏡検査を行っております。（月曜日と火曜日）</p>
                    <p>是非一度ご相談ください。</p>
                </div>
                <div class="feature-img">
                    <img src="{{ asset('images/endoscopy/female-doctor.png') }}" alt="女性医師による大腸内視鏡検査">
                </div>
            </article>

            {{-- 03 --}}
            <article class="feature-item">
                <div class="feature-body">
                    <div class="feature-header">
                        <span class="feature-num">03</span>
                        <h3>苦痛を抑えるための様々な工夫</h3>
                    </div>
                    <p>麻酔の効き、検査を担当する医師の技術で苦痛の感じやすさは大きく左右されるため、当院では最大限の配慮をしています。</p>
                    <ul class="feature-list">
                        <li><strong>経鼻内視鏡・経口内視鏡どちらも対応</strong><br>
                            一般的に嘔吐反射が少ないと言われるのは経鼻ですが、経口の場合も細いカメラを使用しますので、嘔吐反射が少ない方がほとんどです。どちらの場合も何段階にも麻酔をし、しっかり麻酔が効いた状態で検査を行います。麻酔の味を選ぶこともできます。</li>
                        <li><strong>鎮静剤の使用</strong><br>
                            薬の効きやすさに個人差はありますが、意識がぼんやりした状態、または眠っているようなリラックスした状態で検査ができるので、検査時の苦痛を緩和することができます。</li>
                    </ul>
                </div>
                <div class="feature-img">
                    <img src="{{ asset('images/endoscopy/endoscopy-comfort.png') }}" alt="苦痛を抑えた内視鏡検査">
                </div>
            </article>

            {{-- 04 --}}
            <article class="feature-item feature-item--reverse">
                <div class="feature-body">
                    <div class="feature-header">
                        <span class="feature-num">04</span>
                        <h3>オリンパス社製の高性能システム導入</h3>
                    </div>
                    <p>デジタルハイビジョンによる観察やNBIによる特殊光で微細な病変も見逃しなく見つけることが可能です。</p>
                    <ul class="feature-list">
                        <li><strong>NBI（狭帯域光法）</strong><br>
                            特殊な光で血管を強調し、がんなどの微細な病変を浮き彫りにします。</li>
                    </ul>
                </div>
                <div class="feature-img">
                    <img src="{{ asset('images/endoscopy/olympus-endoscopy-system.png') }}" alt="オリンパス社製内視鏡システム">
                </div>
            </article>

            {{-- 05 --}}
            <article class="feature-item">
                <div class="feature-body">
                    <div class="feature-header">
                        <span class="feature-num">05</span>
                        <h3>胃カメラの当日検査に対応</h3>
                    </div>
                    <p>胃カメラは、検査枠に空きがあれば事前診察なしの「当日検査」が可能です。</p>
                    <p>魚の骨が刺さったかもしれない時や、薬のシートを誤飲してしまった、などお困りの際も、朝にご連絡いただき、絶食の状態でお越しいただければ、その日に検査を実施します。</p>
                </div>
                <div class="feature-img feature-img--icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/><line x1="8" y1="14" x2="8" y2="14" stroke-linecap="round" stroke-width="2"/><line x1="12" y1="14" x2="12" y2="14" stroke-linecap="round" stroke-width="2"/></svg>
                    <p>当日検査対応</p>
                </div>
            </article>

            {{-- 06 --}}
            <article class="feature-item feature-item--reverse">
                <div class="feature-body">
                    <div class="feature-header">
                        <span class="feature-num">06</span>
                        <h3>ピロリ菌の検査・除菌治療まで完結</h3>
                    </div>
                    <p>胃カメラ検査と同時に、胃がんリスクを高めるピロリ菌の有無を調べられます。</p>
                    <p>胃潰瘍や慢性胃炎と診断された場合、2回まで保険適用での除菌治療が可能です。ABC検診で陽性が出た方の精密検査も受け付けています。</p>
                </div>
                <div class="feature-img feature-img--icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/><path d="M8 12l3 3 5-5"/></svg>
                    <p>保険適用の除菌治療</p>
                </div>
            </article>

            {{-- 07 --}}
            <article class="feature-item">
                <div class="feature-body">
                    <div class="feature-header">
                        <span class="feature-num">07</span>
                        <h3>日帰り大腸ポリープ切除に対応</h3>
                    </div>
                    <p>検査中にポリープが見つかった場合、その場で切除（日帰り手術）が可能です。</p>
                    <ul class="feature-list">
                        <li>EMR（内視鏡的粘膜切除術）やコールドポリペクトミーなど、ポリープの性質に合わせた適切な手法を選択します。</li>
                    </ul>
                </div>
                <div class="feature-img">
                    <img src="{{ asset('images/endoscopy/polyp-removal.png') }}" alt="日帰り大腸ポリープ切除">
                </div>
            </article>

        </section>

        {{-- CTAエリア --}}
        <section class="endoscopy-cta">
            <p>内視鏡検査に関するご質問・ご予約はお電話にてお気軽にどうぞ</p>
            <a href="tel:{{ \App\Constants\CommonConst::CLINIC_TEL }}" class="endoscopy-cta-tel">
                <img src="{{ asset('images/tel.png') }}" alt="電話">
                {{ \App\Constants\CommonConst::CLINIC_TEL }}
            </a>
            <a href="{{ route('top') }}" class="endoscopy-cta-back">← トップページへ戻る</a>
        </section>

    </div>

@endsection

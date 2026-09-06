@extends('layouts.app')

@section('title', 'マルチスライスCT検査のご案内｜流山市 藤澤内科クリニック')
@section('description', '院内に富士フイルム社製16列マルチスライスCTを導入。低被ばくで受診当日の迅速な撮影・診断に対応。長引く咳、急な腹痛、頭痛の精密検査から肺がん・腹部臓器疾患の早期発見まで。流山市の藤澤内科クリニック。')

@push('scripts')
    @vite('resources/scss/ct.scss')
@endpush

@section('breadcrumb')
    @include('layouts.partials.breadcrumb', ['crumbs' => [
        ['label' => 'CT検査'],
    ]])
@endsection

@section('content')

    {{-- ヒーローエリア --}}
    <div class="ct-hero">
        <img src="{{ asset('images/slideshow/CT_scanner.jpg') }}" alt="CT検査">
        <div class="ct-hero-overlay"></div>
        <div class="ct-hero-text">
            <span class="ct-hero-badge">CT EXAMINATION</span>
            <h1>マルチスライスCT検査のご案内</h1>
        </div>
    </div>

    <div class="container ct-page">

        {{-- 院長からのご案内 --}}
        <section class="ct-intro">
            <div class="ct-intro-card">
                <div class="ct-intro-body">
                    <span class="ct-eyebrow">GREETING</span>
                    <h2>院長からのご案内</h2>
                    <p>当院では、従来のCTに比べて被ばく線量を大幅に低減させつつ、微細な病変も見逃さない高画質診断が可能な富士フイルム社製16列マルチスライスCT「Supria Advance FR」を導入しております。</p>
                    <p>「レントゲンでは異常がないと言われたが症状が続く」「急な激しい腹痛がある」など、迅速な原因究明が必要な場合も院内にて精密な検査が可能です。</p>
                </div>
                <div class="ct-intro-img">
                    <img src="{{ asset('images/ct/fhc_supriaadvancefr.jpg') }}" alt="富士フイルム社製16列マルチスライスCT「Supria Advance FR」">
                </div>
            </div>
        </section>

        {{-- このような症状・ご不安がある方はご相談ください --}}
        <section class="ct-symptoms">
            <div class="ct-section-head">
                <span class="ct-eyebrow">CHECK LIST</span>
                <h3>このような症状・ご不安がある方はご相談ください</h3>
            </div>

            <div class="ct-symptom-grid">
                <div class="ct-symptom-card">
                    <span class="ct-symptom-num">01</span>
                    <h3>長引く咳・息切れ・胸の違和感</h3>
                    <ul>
                        <li>2週間以上続く咳、血痰、息苦しさがある</li>
                        <li>レントゲンでは写りにくい微小な肺がん、初期の肺炎、COPD（慢性閉塞性肺疾患）の精密検査に</li>
                    </ul>
                </div>
                <div class="ct-symptom-card">
                    <span class="ct-symptom-num">02</span>
                    <h3>喫煙歴がある・肺がんが心配な方</h3>
                    <ul>
                        <li>50歳以上、または長年タバコを吸っている（吸っていた）方</li>
                    </ul>
                </div>
                <div class="ct-symptom-card">
                    <span class="ct-symptom-num">03</span>
                    <h3>原因不明の腹痛・背中の痛み・胃腸の不調</h3>
                    <ul>
                        <li>突然の激しい腹痛、右下腹部痛（虫垂炎の疑い）</li>
                        <li>胆石、胆のう炎、尿管結石（背中から腰の激痛）、腸閉塞などの早期鑑別</li>
                    </ul>
                </div>
                <div class="ct-symptom-card">
                    <span class="ct-symptom-num">04</span>
                    <h3>腹部臓器の精密スクリーニング</h3>
                    <ul>
                        <li>健診の腹部エコーで「肝臓・胆のう・膵臓・腎臓」に要精査を指摘された方</li>
                        <li>超音波ではガスで見えにくい膵臓などの詳細なチェックに</li>
                    </ul>
                </div>
                <div class="ct-symptom-card ct-symptom-card--wide">
                    <span class="ct-symptom-num">05</span>
                    <h3>頭痛・めまい・頭部打撲</h3>
                    <ul>
                        <li>突然の強い頭痛、転倒後の頭部打撲による頭蓋内出血の確認</li>
                    </ul>
                </div>
            </div>
        </section>

        {{-- 当院のCT検査の特徴 --}}
        <section class="ct-features">
            <div class="ct-section-head">
                <span class="ct-eyebrow">FEATURES</span>
                <h2>当院のCT検査の特徴</h2>
            </div>

            <div class="ct-feature-grid">
                <article class="ct-feature-card">
                    <span class="ct-feature-num">01</span>
                    <h3>息止めはわずか数秒・スピーディーな撮影</h3>
                    <p>撮影時間は胸部で約7〜8秒、胸腹部でも約12〜13秒と非常に短時間です。着替えなどを含めた全体の検査時間も約15分で完了します。</p>
                </article>

                <article class="ct-feature-card">
                    <span class="ct-feature-num">02</span>
                    <h3>低被ばく設計で体にやさしい</h3>
                    <p>最新のノイズ低減技術により、従来のCTと比較して被ばく線量を大幅に低減。患者さんの身体的負担を最小限に抑えています。</p>
                </article>

                <article class="ct-feature-card">
                    <span class="ct-feature-num">03</span>
                    <h3>予約なし・即日検査に対応</h3>
                    <p>医師が必要と判断した場合、当日の即日検査が可能です（混雑状況や症状により後日予約となる場合もございます）。</p>
                </article>

                <article class="ct-feature-card">
                    <span class="ct-feature-num">04</span>
                    <h3>放射線診断専門医との「ダブルチェック体制」</h3>
                    <p>院内での初期診断に加え、遠隔読影にて放射線診断専門医が二重読影を実施。見逃しのない精度の高い診断レポートを作成します（最終結果説明は通常、翌営業日以降となります）。</p>
                </article>

                <article class="ct-feature-card">
                    <span class="ct-feature-num">05</span>
                    <h3>高次医療機関とのスムーズな連携</h3>
                    <p>急性期疾患や緊急手術が必要と判断された場合は、速やかに近隣の総合病院・大学病院へ紹介・搬送連携を行います。</p>
                </article>
            </div>
        </section>

        {{-- CT検査費用 --}}
        <section class="ct-fee">
            <div class="ct-section-head">
                <span class="ct-eyebrow">PRICE</span>
                <h2>CT検査費用（保険適用目安）</h2>
            </div>

            <div class="ct-fee-panel">
                <div class="ct-fee-cards">
                    <div class="ct-fee-card">
                        <div class="ct-fee-card-label">3割負担の方</div>
                        <div class="ct-fee-card-price"><span class="amount">4,500</span><span class="unit">円</span></div>
                        <div class="ct-fee-card-sub">窓口負担の目安</div>
                    </div>
                    <div class="ct-fee-card">
                        <div class="ct-fee-card-label">1割負担の方</div>
                        <div class="ct-fee-card-price"><span class="amount">1,500</span><span class="unit">円</span></div>
                        <div class="ct-fee-card-sub">窓口負担の目安</div>
                    </div>
                </div>

                <div class="ct-fee-notes">
                    <p>※初再診料、処置料、血液検査代などは別途かかります。</p>
                    <p>※自覚症状のない完全自費によるドック（検診）をご希望の場合は、自費料金となりますので受付へお問い合わせください。</p>
                </div>
            </div>
        </section>

        {{-- CTAエリア --}}
        <section class="ct-cta">
            <p>CT検査に関するご質問・ご予約はお電話にてお気軽にどうぞ</p>
            <a href="tel:{{ \App\Constants\CommonConst::CLINIC_TEL }}" class="ct-cta-tel">
                <img src="{{ asset('images/tel.png') }}" alt="電話">
                {{ \App\Constants\CommonConst::CLINIC_TEL }}
            </a>
            <a href="{{ route('top') }}" class="ct-cta-back">← トップページへ戻る</a>
        </section>

    </div>

@endsection

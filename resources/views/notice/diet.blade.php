@extends('layouts.app')

@section('title', 'メディカルダイエット（自費診療）｜流山市 藤澤内科クリニック')
@section('description', '週1回の注射で食欲をコントロールするメディカルダイエット（自費診療）のご案内。医師が対面で診察し、副作用の対応まで担当します。院内にCT・腹部エコーがあり、もしものときもすぐに検査できます。藤澤内科クリニック。')

@push('scripts')
    @vite('resources/scss/diet.scss')
@endpush

@section('breadcrumb')
    @include('layouts.partials.breadcrumb', ['crumbs' => [
        ['label' => '自費診療', 'url' => route('self_pay')],
        ['label' => 'メディカルダイエット'],
    ]])
@endsection

@section('content')
<div class="diet">

    {{-- ヒーロー --}}
    <section class="diet-hero">
        <div class="diet-inner">
            <div class="diet-hero__text">
                <p class="diet-hero__label">メディカルダイエット（自費診療）</p>
                <h1>週<span class="diet-num">1</span>回の注射で<br>食欲をコントロール！</h1>
                <p class="diet-hero__lead">医師が診察から副作用の対応まで担当。院内にCT・腹部エコーがあるので、もしものときもすぐに検査できます。</p>
            </div>
            <div class="diet-hero__cards">
                <div class="diet-hero__card diet-hero__card--price">
                    <p>初回4本</p>
                    <p class="diet-num">16,500<small>円～</small></p>
                </div>
                <div class="diet-hero__card">
                    <p>注射は</p>
                    <p>週1回</p>
                </div>
                <div class="diet-hero__card">
                    <p>お薬は</p>
                    <p>院内処方</p>
                </div>
            </div>
        </div>
    </section>

    {{-- はじめに --}}
    <section class="diet-intro">
        <div class="diet-inner">
        <div class="diet-head">
            <span class="diet-eyebrow">INTRODUCTION</span>
            <h2>肥満は、見た目だけの問題ではありません</h2>
        </div>
        <div class="diet-intro__box">
            <p>日々の内科外来において、「糖尿病の確定診断には該当しないものの、肥満や体重増加に伴って血圧やコレステロール、中性脂肪が上がり、生活習慣病の悪化を認める方」を数多く拝見してまいりました。</p>
            <p>肥満は見た目だけの問題ではなく、動脈硬化を進行させ、心筋梗塞や脳卒中、血管合併症を引き起こす大きなリスク因子です。健康診断などで軽度の数値を指摘された早い段階で適切な減量（ダイエット）を行うことは、将来的な病気の発症や重症化を防ぐための効果的な予防医療となります。</p>
            <p>しかし、自己流の食事制限や激しい運動は長続きせず、リバウンドを繰り返してしまう方も少なくありません。</p>
            <p>そこで当院では、医学的根拠に基づいた医薬品の力を適切に活用し、無理のない健康的な体重コントロールをサポートする<strong>「メディカルダイエット外来（自費診療）」</strong>を開設いたしました。</p>
        </div>
        </div>
    </section>

    {{-- こんな方に --}}
    <section class="diet-section">
        <div class="diet-inner">
            <div class="diet-head">
                <span class="diet-eyebrow">RECOMMEND</span>
                <h2>こんな方におすすめ</h2>
            </div>
            <ul class="diet-checks">
                <li>食事療法・運動療法を続けても体重が減らない</li>
                <li>健診で体重や血液検査の数値を指摘された</li>
                <li>高血圧・脂質異常症・糖尿病を指摘されている</li>
                <li>副作用が心配で、近くの内科で相談したい</li>
            </ul>
        </div>
    </section>

    {{-- 治療とお薬 --}}
    <section class="diet-band">
        <div class="diet-inner">
            <div class="diet-head">
                <span class="diet-eyebrow">TREATMENT</span>
                <h2>この治療について</h2>
            </div>
            <p class="diet-band__lead">マンジャロと同成分のゼップバウンドなど、GIP/GLP-1受容体作動薬とよばれる週1回の自己注射で、食欲や満腹感に関わる2つのホルモンの働きを助けます。自然に食べる量が減り、無理なく体重を落とすことを目指します。</p>
            <div class="diet-drugs">
                <div class="diet-drug diet-drug--main">
                    <p class="diet-drug__tag">注射薬 ／ 週1回</p>
                    <h3>持続性GIP/GLP-1受容体作動薬</h3>
                    <p>食欲をしっかり抑え代謝を高める。週1回の自己注射で続けやすい。</p>
                </div>
                <div class="diet-drug">
                    <p class="diet-drug__tag">内服薬 ／ 毎日起床時</p>
                    <h3>経口GLP-1作動薬</h3>
                    <p>注射が苦手な方のための飲み薬。</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 特徴 --}}
    <section class="diet-section" style="padding-top: 3.5rem">
        <div class="diet-inner">
            <div class="diet-head">
                <span class="diet-eyebrow">FEATURES</span>
                <h2>当院の4つの特徴</h2>
            </div>
            <div class="diet-features">
                <div class="diet-feature">
                    <p class="diet-feature__num">01</p>
                    <div>
                        <h3>医師が対面で適応を判断</h3>
                        <p>健診結果や持病、内臓脂肪の状態を確認し、治療が適しているかを医師が判断します。</p>
                    </div>
                </div>
                <div class="diet-feature">
                    <p class="diet-feature__num">02</p>
                    <div>
                        <h3>消化器の医師が副作用を診察</h3>
                        <p>この治療では、むかつき・吐き気・便秘・下痢などの胃腸の症状が出やすくなります。症状が出たときは消化器を専門とする医師が診察し、お薬の調整や用量の見直しなど、症状に合わせて適切に対応します。</p>
                    </div>
                </div>
                <div class="diet-feature">
                    <p class="diet-feature__num">03</p>
                    <div>
                        <h3>定期的な血液検査</h3>
                        <p>肝機能・腎機能・膵酵素・電解質を定期的に確認し、安全に続けられるよう管理します。</p>
                    </div>
                </div>
                <div class="diet-feature">
                    <p class="diet-feature__num">04</p>
                    <div>
                        <h3>院内でCT・腹部エコー検査</h3>
                        <p>まれな副作用である胆のう炎や膵炎が疑われる腹痛などの症状があるときは、血液検査や、院内のCTや腹部エコーで検査し、状態を確認できます。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 流れ --}}
    <section class="diet-section">
        <div class="diet-inner">
            <div class="diet-head">
                <span class="diet-eyebrow">FLOW</span>
                <h2>治療の流れ</h2>
            </div>
            <ol class="diet-steps">
                @foreach ([
                    ['電話で予約', '初診の流れをご案内します。'],
                    ['診察・検査', '問診・身体測定・血液検査で適応を判断します。'],
                    ['注射の練習', '看護師が打ち方を説明し、院内でお薬をお渡しします。'],
                    ['4週ごとに再診', '体重と副作用を確認し、用量を調整します。'],
                    ['継続処方', '安定した方は最大3か月分まで処方できます。'],
                ] as [$title, $text])
                    <li>
                        <p class="diet-steps__no">STEP<span>{{ $loop->iteration }}</span></p>
                        <p class="diet-steps__title">{{ $title }}</p>
                        <p class="diet-steps__text">{{ $text }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- 料金 --}}
    <section id="price" class="diet-price">
        <div class="diet-inner">
            <div class="diet-head">
                <span class="diet-eyebrow">PRICE</span>
                <h2>料金（税込）</h2>
                <p class="diet-price__note">すべて自費診療です（公的保険を使った肥満症治療は行っていません）。</p>
            </div>
            <div class="diet-price__grid">
                <div class="diet-price__card">
                    <h3>持続性GIP/GLP-1受容体作動薬</h3>
                    <p class="diet-price__sub">マンジャロと同成分のゼップバウンドなど（週1回注射）4本（4週間分）</p>
                    <div class="diet-price__main">
                        <p>2.5mg（はじめての方）</p>
                        <p class="diet-num">16,500<small>円～</small></p>
                    </div>
                    <p class="diet-price__small">※増量後は用量に応じて料金が変わります。</p>
                </div>
                <div class="diet-price__card">
                    <h3>経口GLP-1作動薬（1日1回の内服薬）</h3>
                    <p class="diet-price__sub">30日分</p>
                    <div class="diet-price__doses">
                        <div><p>3mg</p><p class="diet-num">8,800<small>円</small></p></div>
                        <div><p>7mg</p><p class="diet-num">18,700<small>円</small></p></div>
                        <div><p>14mg</p><p class="diet-num">27,500<small>円</small></p></div>
                    </div>
                </div>
            </div>
            <p class="diet-price__note">初診料・再診料・検査費用などは別途必要となります。</p>
        </div>
    </section>

    {{-- 処方の方針・受けられない方 --}}
    <section class="diet-section">
        <div class="diet-inner">
            <p class="diet-policy">当院では、医師がBMIや健康状態、既往歴、血液検査結果、これまでの食事・運動療法などを確認し、治療が適切と判断した方に処方いたします。</p>
            <div class="diet-policy__def">
                <p><strong>■肥満症とは</strong></p>
                <p>ただし、高血圧、脂質異常症又は耐糖能障害（2型糖尿病、耐糖能異常等）のいずれかを有し、食事療法・運動療法を行っても十分な効果が得られず、以下に該当する場合に限る。</p>
                <ul>
                    <li>BMIが27kg/m2以上であり、2つ以上の肥満に関連する健康障害を有する</li>
                    <li>BMIが35kg/m2以上</li>
                </ul>
            </div>

            <div class="diet-ng">
                <h2>治療を受けられない方</h2>
                <ul>
                    <li>18歳未満の方</li>
                    <li>妊娠中・授乳中、または妊娠を希望している方</li>
                    <li>1型糖尿病の方、薬の成分でアレルギーを起こしたことがある方</li>
                    <li>膵炎や胆のうの病気にかかったことがある方</li>
                    <li>重い胃腸の病気がある方</li>
                    <li>糖尿病の薬を使っている方</li>
                    <li>摂食障害の治療歴がある方</li>
                    <li>甲状腺髄様癌または多発性内分泌腫瘍症候群2型にかかったことがある方、またはご家族にかかった方がいる方</li>
                </ul>
            </div>
        </div>
    </section>

    {{-- よくある質問 --}}
    <section class="diet-section">
        <div class="diet-inner">
            <div class="diet-head">
                <span class="diet-eyebrow">FAQ</span>
                <h2>よくある質問</h2>
            </div>
            <div class="diet-faq">
                @foreach ([
                    ['注射は痛いですか？', '細い針の使い切りペン型で、ボタンを押すだけで注射できます。初回に看護師が使い方を説明します。'],
                    ['どんな副作用がありますか？', '吐き気、便秘、下痢、食欲低下が多く、開始時や増量時に出やすい傾向があります。強い腹痛や続く嘔吐があれば、すぐにご連絡ください。消化器の医師が診察し、必要に応じて院内のCTや腹部エコーで検査します。'],
                    ['保険は使えますか？', '当院のメディカルダイエットはすべて自費診療です。公的保険を使った肥満症治療は行っていません。同じ日に保険診療と一緒に受けることはできません。'],
                    ['治療期間はどのくらいですか？', '4週ごとに通院し、治療期間の目安は6か月〜です。体重や検査結果を見ながら、医師と相談して続けるかどうかを決めます。'],
                    ['他院から切り替えられますか？', '使用中の用量がわかるお薬手帳などをお持ちください。'],
                ] as [$q, $a])
                    <div class="diet-faq__item">
                        <p class="diet-faq__q"><span>Q.</span>{{ $q }}</p>
                        <p class="diet-faq__a">{{ $a }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 法定記載事項 --}}
    <section class="diet-section diet-legal">
        <div class="diet-inner">
            <h2>自由診療に関する記載事項</h2>
            <div class="diet-legal__body">
                <p><strong>承認状況</strong>：持続性GIP/GLP-1受容体作動薬（週1回注射）は、国内で肥満症の治療薬として承認されています。承認された効能・効果（肥満症）の要件を満たさない方への使用は適応外使用となります。経口セマグルチド錠は国内では2型糖尿病の治療薬として承認されており、体重減少を目的とした使用は適応外使用です。なお、同じ成分の注射薬は、国内で肥満症の治療薬として承認されています。</p>
                <p><strong>入手経路</strong>：国内の正規医薬品卸業者を通じて納入しています。</p>
                <p><strong>主な副作用</strong>：吐き気、嘔吐、便秘、下痢、食欲低下、胃部不快感、倦怠感、低血糖など。まれに急性膵炎、胆のう障害、脱水が起こることがあります。</p>
                <p><strong>救済制度</strong>：適応外使用により健康被害が生じた場合、医薬品副作用被害救済制度の対象外となることがあります。</p>
                <p><strong>費用</strong>：保険適用外の自費診療です。標準的な費用は上記料金表のとおりです。</p>
                <p><strong>治療期間・回数</strong>：4週ごとの通院、治療期間の目安は6か月〜です。</p>
            </div>
        </div>
    </section>

    {{-- 予約 --}}
    <section class="diet-section">
        <div class="diet-inner">
            <div class="diet-cta">
                <h2>ご予約・ご相談はお電話で</h2>
                <p>メディカルダイエットをご希望の方は、事前にお電話にてお知らせください。</p>
                <a href="tel:0471501441" class="diet-cta__tel">TEL 04-7150-1441</a>
                <p>藤澤内科クリニック　〒270-0176 千葉県流山市加4-18-2<br>診療日：月・火・水・金（終日）、土（午前）</p>
            </div>
        </div>
    </section>

</div>
@endsection

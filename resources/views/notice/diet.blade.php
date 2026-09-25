@extends('layouts.app')

@section('title', 'メディカルダイエット・肥満外来（自費診療）｜流山市 藤澤内科クリニック')
@section('description', '消化器内科医が対面で診察するメディカルダイエット・肥満外来（自費診療）のご案内。マンジャロ・リベルサスの料金、処方・通院についてご案内します。藤澤内科クリニック。')

@push('scripts')
    @vite('resources/scss/notice-detail.scss')
@endpush

@section('breadcrumb')
    @include('layouts.partials.breadcrumb', ['crumbs' => [
        ['label' => '自費診療', 'url' => route('self_pay')],
        ['label' => 'メディカルダイエット・肥満外来'],
    ]])
@endsection

@section('content')

    <div class="container">
        <div class="notice-container">
            <h1>当院からのお知らせ</h1>

            <h2>メディカルダイエット・肥満外来（自費診療）</h2>
            <p class="notice-lead">「健診で数値を指摘された方」「将来の病気を本気で予防したい方へ」</p>

            <p>日々の内科外来において、「糖尿病の確定診断には該当しないものの、肥満や体重増加に伴って血圧やコレステロール、中性脂肪が上がり、生活習慣病の悪化を認める方」を数多く拝見してまいりました。</p>
            <p>肥満は見た目だけの問題ではなく、動脈硬化を進行させ、心筋梗塞や脳卒中、血管合併症を引き起こす大きなリスク因子です。健康診断などで軽度の数値を指摘された早い段階で適切な減量（ダイエット）を行うことは、将来的な病気の発症や重症化を防ぐための効果的な予防医療となります。</p>
            <p>しかし、自己流の食事制限や激しい運動は長続きせず、リバウンドを繰り返してしまう方も少なくありません。</p>
            <p>そこで当院では、医学的根拠に基づいた医薬品の力を適切に活用し、無理のない健康的な体重コントロールをサポートする「メディカルダイエット外来（自費診療）」を開設いたしました。</p>

            <h3>医師が対面で診察・適応を判断する安心感</h3>
            <p>当院のメディカルダイエットは、医師が対面で診察し、お一人おひとりの健康状態に合わせて適応を判断した上で健康管理を行います。</p>

            <h4>医学的根拠に基づいた適応判断</h4>
            <p>健診結果や生活習慣、持病、内臓脂肪の状態を詳しく確認し、お薬を使用することが本当に適切かつ安全であるかを専門医の視点で慎重に判断します。</p>

            <h4>胃腸症状・副作用への細やかなフォロー</h4>
            <p>GLP-1/GIP受容体作動薬などの治療薬は、使い始めに吐き気や便秘、胃部不快感などの消化器症状が現れることがあります。当院では消化器内科の専門知識を活かし、症状が出た場合のお薬の調整や胃腸薬の併用など、患者様が安心して治療を継続できるようきめ細やかに対応いたします。</p>

            <h4>定期的な血液検査による安全管理</h4>
            <p>単に体重を落とすだけでなく、肝機能・腎機能・膵酵素・電解質などを定期的にチェックし、体内の健康状態を損なうことなく安全に減量が進んでいるかをチェックします。</p>

            <h3>なぜ「自費診療」なのか</h3>
            <p>ダイエットや生活習慣病予防を目的とした医薬品の使用は、現在の日本の公的医療保険制度では適用が認められていません。当院で使用する薬剤（マンジャロ、リベルサス等）は本来「2型糖尿病」の治療薬として厚生労働省に承認されているためです。</p>
            <p>しかし、海外では同等の有効成分が「肥満症治療薬」として正式に承認・活用されており、日本国内でもチルゼパチド製剤は肥満症適応の医薬品として認可されています。当院では安全性を最優先に考慮した上で、自費診療（自由診療）にて処方を行っております。</p>

            <div class="notice-attention">
                <p>※BMIが19未満の方、未成年の方は、安全上の理由から処方をお断りさせていただく場合がございます。</p>
                <p>※当院では、公的保険適用の肥満症外来（ウゴービ等）は取り扱っておりません。</p>
            </div>

            <h3>主な治療薬</h3>
            <p>当院では、GLP-1/GIP受容体作動薬を中心とした治療をご提案しております。患者様の体質や目標、生活スタイルに合わせて最適な治療法を選択いたします。<br>
                <small>（※患者様の状態やご希望に応じ、SGLT2阻害薬やメトホルミンなどのサポート薬の併用についても診察時にご相談いただけます）</small></p>

            <div class="notice-drug-cards">
                <div class="notice-drug-card">
                    <span class="notice-drug-card__tag">注射 / 週1回</span>
                    <h4>マンジャロ</h4>
                    <p>食欲をしっかり抑え代謝を高める。週1回の自己注射で続けやすい。</p>
                </div>
                <div class="notice-drug-card">
                    <span class="notice-drug-card__tag">内服 / 毎日起床時</span>
                    <h4>リベルサス</h4>
                    <p>注射が苦手な方のための飲み薬。手軽に開始可能。</p>
                </div>
            </div>

            <h3>料金一覧（税込表示）</h3>
            <p>当院は保険診療を基盤とする地域密着型クリニックであるため、自由診療におきましても患者様が無理なく続けられる適正価格で設定しております。</p>

            <h4>1. マンジャロ皮下注（週1回・使い切りペン型注射薬）</h4>
            <p>食欲を抑え、満腹感を持続させる世界初の持続性GIP/GLP-1受容体作動薬です。極細の針が一体型となったペン型製剤で、週に1回ご自身で皮下注射を行います。</p>

            <div class="notice-price-block">
                <figure class="notice-price-block__img">
                    <img src="{{ asset('images/notice/diet-mounjaro.jpg') }}" alt="マンジャロ皮下注（ペン型注射薬）">
                </figure>

                <table class="notice-price-table">
                    <tr>
                        <th>マンジャロ 2.5mg<small>初期導入用量</small></th>
                        <td class="notice-price-table__qty">4本（4週間分）</td>
                        <td class="notice-price-table__price"><strong>16,500</strong>円<small>（税込）</small></td>
                    </tr>
                    <tr>
                        <th>マンジャロ 5.0mg<small>標準維持用量</small></th>
                        <td class="notice-price-table__qty">4本（4週間分）</td>
                        <td class="notice-price-table__price"><strong>26,400</strong>円<small>（税込）</small></td>
                    </tr>
                    <tr>
                        <th>マンジャロ 7.5mg<small>増量期用量</small></th>
                        <td class="notice-price-table__qty">4本（4週間分）</td>
                        <td class="notice-price-table__price"><strong>33,000</strong>円<small>（税込）</small></td>
                    </tr>
                    <tr>
                        <th>マンジャロ 10.0mg<small>高用量</small></th>
                        <td class="notice-price-table__qty">4本（4週間分）</td>
                        <td class="notice-price-table__price"><strong>39,600</strong>円<small>（税込）</small></td>
                    </tr>
                </table>
            </div>
            <p><small>※アルコール綿等の消耗品費用を含みます。</small></p>

            <h4>2. リベルサス錠（1日1回・内服薬）</h4>
            <p>起床時空腹時に少量の水（120mL以下）で服用し、その後最低30分飲食を控えることで胃から吸収させる錠剤タイプです。</p>

            <div class="notice-price-block">
                <figure class="notice-price-block__img">
                    <img src="{{ asset('images/notice/diet-rybelsus.jpg') }}" alt="リベルサス錠（内服薬）">
                </figure>

                <table class="notice-price-table">
                    <tr>
                        <th>リベルサス錠 3mg<small>初期導入用量</small></th>
                        <td class="notice-price-table__qty">30錠（30日分）</td>
                        <td class="notice-price-table__price"><strong>8,800</strong>円<small>（税込）</small></td>
                    </tr>
                    <tr>
                        <th>リベルサス錠 7mg<small>標準維持用量</small></th>
                        <td class="notice-price-table__qty">30錠（30日分）</td>
                        <td class="notice-price-table__price"><strong>18,700</strong>円<small>（税込）</small></td>
                    </tr>
                    <tr>
                        <th>リベルサス錠 14mg<small>高用量</small></th>
                        <td class="notice-price-table__qty">30錠（30日分）</td>
                        <td class="notice-price-table__price"><strong>27,500</strong>円<small>（税込）</small></td>
                    </tr>
                </table>
            </div>

            <h3>ご予約・ご相談について</h3>
            <p>メディカルダイエットをご希望の方は、事前にお電話にてお知らせください。<br>
                （初診時のご案内や診察の流れについてスタッフよりご説明いたします）</p>

            <h3>処方・通院について</h3>
            <ul class="notice-list">
                <li><strong>院内処方でスムーズ</strong><br>診察後、院内にて直接お薬をお渡しいたします。</li>
                <li><strong>まとめ処方に対応</strong><br>体調が安定している患者様には、ご希望に応じて最大3か月分までのまとめ処方が可能です。</li>
                <li><strong>縛りのない都度処方</strong><br>定期購入の縛りやサブスクリプション契約は一切ございません。必要なときに必要な分だけ受診していただけます。</li>
                <li><strong>他院からの継続処方</strong><br>他院ですでに処方を受けている方の継続処方も承っております（お薬手帳など用量が確認できるものをご持参ください）。</li>
            </ul>

            <h3>自由診療に関する法定記載事項（医療広告ガイドラインに基づく明示）</h3>
            <ul class="notice-list">
                <li><strong>未承認医薬品等であることの明示</strong><br>マンジャロ皮下注およびリベルサス錠は、日本国内において「2型糖尿病」の治療薬として承認されていますが、肥満予防・メディカルダイエット目的での使用は薬事承認されていない適応外使用（自由診療）となります。</li>
                <li><strong>入手経路</strong><br>当院で使用する医薬品は、国内の正規医薬品卸業者を通じて適正に納入しております。</li>
                <li><strong>同一成分や同効薬の国内承認</strong><br>国内承認されている肥満症治療薬にはウゴービ皮下注などがありますが、高度肥満症や保険適用の施設・患者要件を満たす場合に限定されます。</li>
                <li><strong>安全性・主な副作用</strong><br>悪心、嘔吐、便秘、下痢、食欲減退、胃部不快感、低血糖、倦怠感などが報告されています。ごく稀に急性膵炎、胆嚢障害、脱水症状を認めることがあります。異常を感じた際は速やかに医師までご相談ください。</li>
                <li><strong>副作用被害救済制度について</strong><br>承認適応外での使用によって生じた健康被害については、公的な「医薬品副作用被害救済制度」の給付対象外となる場合があります。</li>
            </ul>

        </div>
    </div>

@endsection

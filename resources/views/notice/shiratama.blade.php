@extends('layouts.app')

@push('scripts')
    @vite('resources/scss/notice-detail.scss')
@endpush

@section('content')

    <div class="container">
        <div class="notice-container">
            <h1>当院からのお知らせ</h1>

            <h2>白玉注射（美白・美肌・抗酸化ケア）</h2>
            <p class="notice-lead">内側から透き通るような美肌と、疲労回復へ</p>

            <p>
                メラニン生成を抑える強力な抗酸化成分「グルタチオン」を配合した美容注射です。
                美白・美肌ケアはもちろん、日々の疲れやデトックスにも効果的です。<br>
                当院では「タチオン3アンプル（600mg）」を贅沢に使用しています。
            </p>

            <h3>こんな方におすすめ</h3>
            <ul class="notice-list">
                <li>肌のくすみ・シミが気になる方 ／ 透明感がほしい方</li>
                <li>紫外線ダメージをケアしたい方</li>
                <li>疲労感や倦怠感が抜けない方</li>
            </ul>

            <h3>オプション：ビタミンC追加（＋1,000円）</h3>
            <p>
                グルタチオンと相性抜群のビタミンCを追加できます。
                抗酸化作用を高め、コラーゲン生成や免疫力アップをサポートします。
            </p>

            <h3>料金（税込）</h3>
            <table class="notice-table">
                <tr>
                    <th>白玉注射（タチオン3A）</th>
                    <td>3,800円</td>
                </tr>
                <tr>
                    <th>ビタミンC追加<br><small>オプション</small></th>
                    <td>＋1,000円<br><small>合計 4,800円</small></td>
                </tr>
            </table>

            <h3>施術概要・ご注意事項</h3>
            <table class="notice-table">
                <tr>
                    <th>所要時間</th>
                    <td>約5〜10分</td>
                </tr>
                <tr>
                    <th>目安ペース</th>
                    <td>1〜2週間に1回</td>
                </tr>
            </table>

            <div class="notice-attention">
                <p>⚠️ <strong>副作用について</strong></p>
                <p>注射部位の痛み・内出血、稀に吐き気・めまい等が生じる場合があります。<br>
                ご不明な点はお気軽にスタッフまでお申し付けください。</p>
            </div>

            <p class="notice-clinic">
                医療法人社団藤光会　藤澤内科クリニック<br>
                院長　藤澤 光沙
            </p>
        </div>
    </div>

@endsection

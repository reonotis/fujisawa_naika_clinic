@extends('layouts.app')

@section('title', '【流山市】インフルエンザ・新型コロナワクチン接種開始のお知らせ｜藤澤内科クリニック')
@section('description', '10月1日より流山市の定期接種を含むインフルエンザワクチン・新型コロナワクチンの接種を開始します。事前予約不要。藤澤内科クリニック。')

@push('scripts')
    @vite('resources/scss/notice-detail.scss')
@endpush

@section('breadcrumb')
    @include('layouts.partials.breadcrumb', ['crumbs' => [
        ['label' => 'お知らせ'],
        ['label' => 'インフルエンザ・新型コロナワクチン接種開始のお知らせ'],
    ]])
@endsection

@section('content')

    <div class="container">
        <div class="notice-container">
            <h1>当院からのお知らせ</h1>

            <h2>【流山市】インフルエンザ・新型コロナワクチン接種開始のお知らせ</h2>
            <p class="notice-lead">10月1日（木）より、流山市の定期接種を含む「インフルエンザワクチン」および「新型コロナワクチン」の接種を開始いたします。</p>

            <p>事前予約は不要ですので、直接受付へお越しください。</p>

            <div class="notice-attention mt-4">
                <p>午前中は混雑する場合がございます。インフルエンザワクチン等の接種のみをご希望の患者様は、午後の時間帯にご来院いただくとよりスムーズにご案内が可能です。</p>
            </div>

            <h3>接種費用（税込）</h3>

            <h4>インフルエンザワクチン</h4>
            <table class="notice-table">
                <tr>
                    <th>流山市在住の65歳以上の方</th>
                    <td>1,500円</td>
                </tr>
                <tr>
                    <th>任意接種（一般の方）</th>
                    <td>4,000円</td>
                </tr>
            </table>

            <h4>新型コロナワクチン</h4>
            <p>使用ワクチン：ファイザー社製「コミナティ」</p>
            <table class="notice-table">
                <tr>
                    <th>流山市在住の65歳以上の方</th>
                    <td>5,000円</td>
                </tr>
                <tr>
                    <th>任意接種（一般の方）</th>
                    <td>16,000円</td>
                </tr>
            </table>

            <h3>持ち物・注意事項</h3>
            <ul class="notice-list">
                <li>持ち物：マイナンバーカード（または健康保険証）、診察券（お持ちの方）、流山市から届いた予診票（65歳以上の方）</li>
                <li>当日の体調や在庫状況により、接種をお待ちいただく場合がございます。</li>
                <li>インフルエンザワクチンと新型コロナワクチンの同時接種をご希望の方は、受付時にお申し出ください。</li>
            </ul>

            <p class="notice-clinic">
                医療法人社団藤光会　藤澤内科クリニック<br>
                院長　藤澤 光沙
            </p>
        </div>
    </div>

@endsection

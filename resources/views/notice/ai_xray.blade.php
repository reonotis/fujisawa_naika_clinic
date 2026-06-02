@extends('layouts.app')

@push('scripts')
    @vite('resources/scss/notice-detail.scss')
@endpush

@section('content')

    <div class="container">
        <div class="notice-container">
            <h1>当院からのお知らせ</h1>

            <h2>胸部レントゲン撮影にAI機能を搭載しました</h2>
            <p class="notice-lead">AI技術で、より精度の高い胸部レントゲン検査へ</p>

            <p>
                当院では、コニカミノルタ社製の最新AI（人工知能）画像診断支援ソフト「CXR Finding-i」を導入いたしました。<br>
                いつものレントゲン検査にAIの「目」が加わることで、病気の早期発見と、より確かな診断が可能になります。
            </p>

            <div class="notice-img">
                <img src="{{ asset('images/notice/ai-xray-spec.jpg') }}" alt="AIの主な仕様">
            </div>

            <h3>AIを活用する3つのメリット</h3>

            <h4>「見逃し」を徹底して防ぐ</h4>
            <p>
                熟練した専門医の知識を学習したAIが、画像を細部までチェックします。医師とAIによる「ダブルチェック」を行うことで、小さながんの芽（結節影）や肺炎の兆候（浸潤影）などの見落としを防ぎます。
            </p>

            <h4>より正確で、信頼できる診断</h4>
            <p>
                最新のアップデートにより、AIの分析精度が大幅に向上しました。「異常がないケース」を正しく見極める力が強まったことで、より信頼性の高い、精度の高い診断結果をお伝えできます。
            </p>

            <h4>スピーディーな対応</h4>
            <p>
                AIが瞬時に画像を解析し、医師の診断をサポートします。これにより、検査から結果説明までの流れがスムーズになります。
            </p>

            <div class="notice-img">
                <img src="{{ asset('images/notice/ai-xray-monitor.jpg') }}" alt="胸部レントゲンAI診断支援システム 期待される効果">
            </div>

            <p class="notice-clinic">
                医療法人社団藤光会　藤澤内科クリニック<br>
                院長　藤澤 光沙
            </p>
        </div>
    </div>

@endsection

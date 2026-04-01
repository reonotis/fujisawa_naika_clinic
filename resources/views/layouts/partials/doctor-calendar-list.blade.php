@push('scripts')
    @vite('resources/scss/doctor-calendar.scss')
@endpush

<div class="container">
    <div class="doctor-calendar-container" data-current-month="4">
        <h2 data-en="SCHEDULE">外来担当医表</h2>

        <div class="doctor-calendar-nav">
            <button type="button" class="doctor-calendar-arrow doctor-calendar-prev" aria-label="前の月">
                ‹
            </button>

            <p class="doctor-calendar-title" data-month-label></p>

            <button type="button" class="doctor-calendar-arrow doctor-calendar-next" aria-label="次の月">
                ›
            </button>
        </div>


        <div class="doctor-calendar-months">
            @foreach ($doctor_calendar_data as $ym => $days)
                @php
                    // "2026-04" のようなキーから「2026年4月」の形式に変換
                    $label = \Carbon\Carbon::parse($ym . '-01')->format('Y年n月');
                @endphp
                <div class="doctor-calendar-month" data-index="{{ $loop->index }}" data-label="{{ $label }}"
                     @unless($loop->first) hidden @endunless>
                    <x-calendar-table :data="$days" />
                </div>
            @endforeach
        </div>

        <div class="doctor-calendar-support">
            <div>
                <p>午後診療 14:00~17:00まで</p>
                <p>土曜日 9:00~12:00まで</p>
            </div>

            <div>
                <p>※土曜の松原先生は、一般内科、特に循環器内科にお詳しい先生です。<br>
                    &emsp;高血圧、動悸など心疾患でお悩みの方は是非ご相談ください。</p>
                <p>※4月の金曜午後担当の副島先生は循環器、また糖尿病にも非常にお詳しい先生です。</p>
            </div>
        </div>

    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.querySelector('.doctor-calendar-container');
            if (!container) return;

            const monthLabel = container.querySelector('[data-month-label]');
            const monthsNodeList = container.querySelectorAll('.doctor-calendar-month');
            const prevBtn = container.querySelector('.doctor-calendar-prev');
            const nextBtn = container.querySelector('.doctor-calendar-next');

            const months = Array.from(monthsNodeList);
            if (months.length === 0) return;

            // DOM上にある月ブロックから「利用可能な月」を自動検出
            const monthInfos = months
                .map((el) => {
                    const index = parseInt(el.getAttribute('data-index') || '0', 10);
                    const label = el.getAttribute('data-label') || '';
                    return { index, label, el };
                })
                .sort((a, b) => a.index - b.index);

            if (monthInfos.length === 0) return;

            const hasMultiple = monthInfos.length > 1;

            // 月を表示するたびに呼ばれる
            function showMonth(index) {
                // 対象月を取得
                const target = monthInfos[index];
                if (!target) return;

                // 表示・非表示の切り替え
                monthInfos.forEach(info => {
                    if (info.index === index) {
                        info.el.removeAttribute('hidden');
                    } else {
                        info.el.setAttribute('hidden', 'hidden');
                    }
                });

                container.setAttribute('data-current-index', String(index));

                // タイトルの更新
                if (monthLabel) {
                    monthLabel.textContent = target.label || '';
                }

                // 月数と位置に応じてボタンの有効/無効を切り替え（位置は固定したまま）
                if (!hasMultiple) {
                    if (prevBtn) {
                        prevBtn.disabled = true;
                        prevBtn.classList.add('is-disabled');
                    }
                    if (nextBtn) {
                        nextBtn.disabled = true;
                        nextBtn.classList.add('is-disabled');
                    }
                } else {
                    const hasPrev = index > 0;
                    const hasNext = index < monthInfos.length - 1;

                    if (prevBtn) {
                        prevBtn.disabled = !hasPrev;
                        prevBtn.classList.toggle('is-disabled', !hasPrev);
                    }
                    if (nextBtn) {
                        nextBtn.disabled = !hasNext;
                        nextBtn.classList.toggle('is-disabled', !hasNext);
                    }
                }
            }

            function move(delta) {
                if (!hasMultiple) return;

                const currentIndex = parseInt(container.getAttribute('data-current-index') || '0', 10);
                const nextIndex = currentIndex + delta;

                // 範囲外には移動しない（ループしない）
                if (nextIndex < 0 || nextIndex >= monthInfos.length) {
                    return;
                }

                showMonth(nextIndex);
            }

            prevBtn?.addEventListener('click', () => move(-1));
            nextBtn?.addEventListener('click', () => move(1));

            // 初期表示：最初の月
            showMonth(0);
        });
    </script>
@endpush

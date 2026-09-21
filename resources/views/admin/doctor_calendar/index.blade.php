@extends('admin.layouts.panel')

@section('title', '外来担当医表')

@php
    $weekLabels = [1 => '月', 2 => '火', 3 => '水', 4 => '木', 5 => '金', 6 => '土', 0 => '日'];
@endphp

@section('content')
    <style>
        .dc-section { margin-top: 0; }
        .dc-section[hidden] { display: none; }
        .dc-tabs { display: flex; gap: 4px; border-bottom: 2px solid #2c5f7c; margin-bottom: 20px; flex-wrap: wrap; }
        .dc-tab { padding: 10px 18px; border: 0; border-radius: 6px 6px 0 0; background: #eef3f6; color: #333; font-size: 15px; cursor: pointer; }
        .dc-tab:hover { background: #dbe6ec; }
        .dc-tab.active { background: #2c5f7c; color: #fff; font-weight: bold; }
        .dc-section h2 { font-size: 18px; border-left: 4px solid #2c5f7c; padding-left: 10px; margin: 0 0 12px; }
        .dc-warning { margin: 0 0 12px; padding: 10px 14px; background: #fff4e0; border-left: 4px solid #e69500; border-radius: 4px; color: #8a5300; font-weight: bold; }
        .dc-help { color: #666; font-size: 14px; margin: 0 0 12px; }
        .dc-row { display: grid; grid-template-columns: 90px 1fr 1fr 90px 1fr auto; gap: 8px; align-items: center; padding: 8px 0; border-bottom: 1px solid #e3e7ea; }
        .dc-row.weekly { grid-template-columns: 50px 90px 1fr 1fr; }
        .dc-row select, .dc-row input[type=text] { width: 100%; padding: 6px; border: 1px solid #bbb; border-radius: 4px; font-size: 14px; background: #fff; }
        .dc-row select:disabled { background: #e9ecef; color: #999; cursor: not-allowed; }
        .dc-row.doctors { grid-template-columns: 28px 1fr 1fr 80px auto; }
        .dc-handle { cursor: grab; font-size: 20px; color: #888; text-align: center; user-select: none; }
        .dc-handle:active { cursor: grabbing; }
        .dc-row.dragging { opacity: .4; background: #eef3f6; }
        .dc-row.drop-before { box-shadow: 0 -3px 0 #2c5f7c; }
        .dc-row.drop-after { box-shadow: 0 3px 0 #2c5f7c; }
        .dc-sort-status { margin-left: 8px; color: #1e6b34; }
        .dc-sort-status.error { color: #c0392b; }
        .dc-row input[type=number] { width: 100%; padding: 6px; border: 1px solid #bbb; border-radius: 4px; font-size: 14px; }
        .dc-row.publications { grid-template-columns: 120px 1fr 140px auto; }
        .dc-badge.publish-on { background: #c8e6c9; color: #1e6b34; }
        .dc-row.overrides { grid-template-columns: 150px 1fr 1fr 90px 1fr auto; }
        .dc-subhead { font-size: 15px; margin: 0 0 8px; }
        .dc-row input[type=date] { width: 100%; padding: 6px; border: 1px solid #bbb; border-radius: 4px; font-size: 14px; }
        .dc-pub-row { cursor: pointer; }
        .dc-pub-row:hover { background: #f5f9fb; }
        .dc-pub-row.selected { background: #e3f0f7; box-shadow: inset 4px 0 0 #2c5f7c; }
        .dc-preview { margin-top: 28px; }
        .dc-preview-panel[hidden] { display: none; }
        .dc-preview-head { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; font-size: 18px; }
        .dc-row.is-override { background: #fff8e1; }
        .dc-row.is-holiday { background: #fdecec; }
        .dc-date.sat { color: #1e6fd9; }
        .dc-date.sun { color: #c0392b; }
        .dc-badge { font-size: 12px; padding: 2px 6px; border-radius: 3px; background: #eef3f6; }
        .dc-badge.override { background: #ffe082; }
        .dc-badge.holiday { background: #f5b7b1; }
        .dc-nav { display: flex; align-items: center; gap: 16px; margin-bottom: 12px; }
        .dc-nav a { color: #2c5f7c; }
        .btn-sm { padding: 6px 12px; font-size: 14px; }
        .btn-gray { background: #888; }
        .dc-holiday-form { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 12px; }
        .dc-holiday-form input { padding: 8px; border: 1px solid #bbb; border-radius: 4px; }
        @media (max-width: 800px) { .dc-row { grid-template-columns: 1fr 1fr; } .dc-row.weekly { grid-template-columns: 40px 1fr 1fr; } .dc-row.doctors { grid-template-columns: 28px 1fr 1fr; } .dc-row.doctors.head { display: none; } .dc-row.publications { grid-template-columns: 1fr 1fr; } .dc-row.overrides { grid-template-columns: 1fr 1fr; } }
    </style>

    @if (session('status'))
        <div class="flash">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="error" style="margin-bottom: 16px;">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    {{-- 曜日ごとの基本設定 --}}
    <div class="dc-tabs" role="tablist">
        <button type="button" class="dc-tab" data-tab="weekly" role="tab">曜日ごとの基本設定</button>
        <button type="button" class="dc-tab" data-tab="daily" role="tab">日別の確認・臨時変更</button>
        <button type="button" class="dc-tab" data-tab="holidays" role="tab">祝日・特別休診日</button>
        <button type="button" class="dc-tab" data-tab="doctors" role="tab">医師マスタ</button>
        <button type="button" class="dc-tab" data-tab="publications" role="tab">公開年月</button>
    </div>

    <div class="dc-section" data-tab-panel="weekly">
        <div class="dc-warning">公開中のスケジュールが変わる可能性があるため、変更にはご注意ください。</div>
        <p class="dc-help">毎週の基本となる担当医です。「休診」は担当医なし、「休診日」にチェックすると終日休診になります。</p>
        <form method="POST" action="{{ route('admin.doctor_calendar.weekly.update') }}">
            @csrf
            @method('PUT')
            @foreach ($weekLabels as $dow => $label)
                @php $w = $weekly->get($dow); @endphp
                <div class="dc-row weekly">
                    <strong>{{ $label }}</strong>
                    <label>
                        <input type="hidden" name="schedules[{{ $dow }}][is_closed]" value="0">
                        <input type="checkbox" name="schedules[{{ $dow }}][is_closed]" value="1" @checked($w?->is_closed ?? true)> 休診日
                    </label>
                    <select name="schedules[{{ $dow }}][am_doctor_id]">
                        <option value="">午前：休診</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}" @selected($w?->am_doctor_id === $doctor->id)>午前：{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                    <select name="schedules[{{ $dow }}][pm_doctor_id]">
                        <option value="">午後：休診</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}" @selected($w?->pm_doctor_id === $doctor->id)>午後：{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
            <div style="margin-top: 12px;">
                <button type="submit" class="btn">基本設定を保存</button>
            </div>
        </form>
    </div>

    {{-- 臨時変更（基本設定から変わる日だけ登録） --}}
    <div class="dc-section" data-tab-panel="daily" hidden>
        <h2>日別の確認・臨時変更</h2>
        <p class="dc-help">
            基本は「曜日ごとの基本設定」が使われます。担当医を変える日・臨時で休診にする日だけ、ここに登録してください。<br>
            登録した日は基本設定・祝日設定より優先されます。同じ日付をもう一度登録すると上書きされます。
        </p>

        @php
            $weeklyMap = $weekly->map(fn ($w) => [
                'closed' => $w->is_closed,
                'am' => $w->am_doctor_id,
                'pm' => $w->pm_doctor_id,
            ]);
        @endphp

        <h3 class="dc-subhead">臨時変更を追加</h3>
        <form method="POST" action="{{ route('admin.doctor_calendar.overrides.save') }}" class="dc-row overrides" id="override-add-form" data-weekly='@json($weeklyMap)'>
            @csrf
            <input type="date" name="date" value="{{ old('date') }}" required>
            <select name="am_doctor_id">
                <option value="">午前：休診</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">午前：{{ $doctor->name }}</option>
                @endforeach
            </select>
            <select name="pm_doctor_id">
                <option value="">午後：休診</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">午後：{{ $doctor->name }}</option>
                @endforeach
            </select>
            <label>
                <input type="hidden" name="is_closed" value="0">
                <input type="checkbox" name="is_closed" value="1"> 休診日
            </label>
            <input type="text" name="note" maxlength="255" placeholder="備考（休診日の表示名 など）">
            <button type="submit" class="btn btn-sm">追加</button>
        </form>
        <p class="dc-help" style="margin-top: 6px;">日付を選ぶと、その曜日の基本設定が入力されます。変えたい部分だけ選び直してください。</p>

        <h3 class="dc-subhead" style="margin-top: 28px;">登録済みの臨時変更</h3>
        @forelse ($overrides as $override)
            @php
                $dowClass = $override->date->isSaturday() ? 'sat' : ($override->date->isSunday() ? 'sun' : '');
            @endphp
            <form method="POST" action="{{ route('admin.doctor_calendar.overrides.save') }}" class="dc-row overrides is-override">
                @csrf
                <input type="hidden" name="date" value="{{ $override->date->toDateString() }}">
                <strong class="dc-date {{ $dowClass }}">{{ $override->date->format('Y/m/d') }}（{{ $weekLabels[$override->date->dayOfWeek] }}）</strong>
                <select name="am_doctor_id">
                    <option value="">午前：休診</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" @selected($override->am_doctor_id === $doctor->id)>午前：{{ $doctor->name }}</option>
                    @endforeach
                </select>
                <select name="pm_doctor_id">
                    <option value="">午後：休診</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" @selected($override->pm_doctor_id === $doctor->id)>午後：{{ $doctor->name }}</option>
                    @endforeach
                </select>
                <label>
                    <input type="hidden" name="is_closed" value="0">
                    <input type="checkbox" name="is_closed" value="1" @checked($override->is_closed)> 休診日
                </label>
                <input type="text" name="note" value="{{ $override->note }}" maxlength="255" placeholder="備考（休診日の表示名 など）">
                <div style="display: flex; gap: 6px;">
                    <button type="submit" class="btn btn-sm">保存</button>
                    <button type="submit" class="btn btn-sm btn-gray" form="reset-{{ $override->id }}" onclick="return confirm('この臨時変更を削除して基本設定に戻しますか？')">削除</button>
                </div>
            </form>
            <form id="reset-{{ $override->id }}" method="POST" action="{{ route('admin.doctor_calendar.overrides.destroy', $override) }}">
                @csrf
                @method('DELETE')
            </form>
        @empty
            <p class="dc-help">臨時変更は登録されていません。</p>
        @endforelse
    </div>

    {{-- 祝日・特別休診日 --}}
    <div class="dc-section" data-tab-panel="holidays" hidden>
        <h2>祝日・特別休診日</h2>
        <form method="POST" action="{{ route('admin.doctor_calendar.holidays.store') }}" class="dc-holiday-form">
            @csrf
            <input type="date" name="date" value="{{ old('date') }}" required>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="表示名（敬老の日 など）" maxlength="255" required>
            <button type="submit" class="btn btn-sm">登録</button>
        </form>
        @forelse ($holidays as $holiday)
            <div class="dc-row" style="grid-template-columns: 140px 1fr auto;">
                <span>{{ $holiday->date->format('Y/m/d') }}（{{ $weekLabels[$holiday->date->dayOfWeek] }}）</span>
                <span>{{ $holiday->name }}</span>
                <form method="POST" action="{{ route('admin.doctor_calendar.holidays.destroy', $holiday) }}" onsubmit="return confirm('削除しますか？')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-gray">削除</button>
                </form>
            </div>
        @empty
            <p class="dc-help">登録はありません。</p>
        @endforelse
    </div>

    {{-- 医師マスタ --}}
    <div class="dc-section" data-tab-panel="doctors" hidden>
        <h2>医師マスタ</h2>
        <p class="dc-help">
            表示クラスは、カレンダーの色と表示名を決める CSS クラス名です（resources/scss/doctor-calendar.scss に同名のクラスが必要です）。<br>
            退職などで使わなくなった医師は削除せず「有効」を外してください。曜日設定や今日以降の臨時変更で使用中の医師は無効にできません。
        </p>

        <p class="dc-help">左の「⠿」をドラッグして並び替えると、自動で保存されます。<span id="doctor-sort-status" class="dc-sort-status"></span></p>

        <div class="dc-row doctors head" style="font-weight: bold; font-size: 13px;">
            <span></span><span>表示名</span><span>表示クラス</span><span>有効</span><span></span>
        </div>
        <div id="doctor-list" data-reorder-url="{{ route('admin.doctor_calendar.doctors.reorder') }}">
        @foreach ($allDoctors as $doctor)
            <form method="POST" action="{{ route('admin.doctor_calendar.doctors.update', $doctor) }}" class="dc-row doctors" data-id="{{ $doctor->id }}">
                @csrf
                @method('PUT')
                <span class="dc-handle" title="ドラッグして並び替え" aria-label="並び替え">⠿</span>
                <input type="text" name="name" value="{{ $doctor->name }}" maxlength="255" required>
                <input type="text" name="css_class" value="{{ $doctor->css_class }}" maxlength="255" required pattern="[A-Za-z][A-Za-z0-9_\-]*">
                <label>
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" @checked($doctor->is_active)> 有効
                </label>
                <button type="submit" class="btn btn-sm">保存</button>
            </form>
        @endforeach
        </div>

        <h2 style="margin-top: 28px;">医師を追加</h2>
        <p class="dc-help">追加した医師は末尾に並びます。</p>
        <form method="POST" action="{{ route('admin.doctor_calendar.doctors.store') }}" class="dc-row doctors">
            @csrf
            <span></span>
            <input type="text" name="name" maxlength="255" placeholder="表示名（例：山田先生）" required>
            <input type="text" name="css_class" maxlength="255" placeholder="表示クラス（例：yamada）" required pattern="[A-Za-z][A-Za-z0-9_\-]*">
            <span></span>
            <button type="submit" class="btn btn-sm">追加</button>
        </form>
    </div>

    {{-- 公開年月 --}}
    <div class="dc-section" data-tab-panel="publications" hidden>
        <h2>公開年月</h2>
        <p class="dc-help">
            公開中の月だけがサイトの外来担当医表に表示されます（当月より前の月は自動的に非表示です）。<br>
            先の月は「非公開」で追加しておき、「日別の確認・臨時変更」に臨時変更を登録して、準備ができたら「公開する」を押してください。
        </p>

        <form method="POST" action="{{ route('admin.doctor_calendar.publications.store') }}" class="dc-holiday-form">
            @csrf
            <input type="month" name="target_month" value="{{ old('target_month') }}" required>
            <button type="submit" class="btn btn-sm">年月を追加</button>
        </form>

        @forelse ($publications as $publication)
            @php $ymLabel = \Carbon\Carbon::createFromFormat('Y-m-d', $publication->target_month . '-01')->format('Y年n月'); @endphp
            <div class="dc-row publications dc-pub-row" data-ym="{{ $publication->target_month }}" tabindex="0" title="クリックすると下にカレンダーを表示します">
                <strong>{{ $ymLabel }}</strong>
                <span>
                    @if ($publication->is_published)
                        <span class="dc-badge publish-on">公開中</span>
                        <small>{{ $publication->published_at?->format('Y/m/d H:i') }}</small>
                    @else
                        <span class="dc-badge">非公開（作成中）</span>
                    @endif
                </span>
                <span></span>
                <div style="display: flex; gap: 6px;">
                    <form method="POST" action="{{ route('admin.doctor_calendar.publications.update', $publication) }}"
                          @if (! $publication->is_published) onsubmit="return confirm('{{ $ymLabel }}をサイトに公開しますか？')" @endif>
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="is_published" value="{{ $publication->is_published ? 0 : 1 }}">
                        <button type="submit" class="btn btn-sm {{ $publication->is_published ? 'btn-gray' : '' }}">{{ $publication->is_published ? '非公開にする' : '公開する' }}</button>
                    </form>
                    <form method="POST" action="{{ route('admin.doctor_calendar.publications.destroy', $publication) }}" onsubmit="return confirm('{{ $ymLabel }}の登録を削除しますか？')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-gray">削除</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="dc-help">登録された年月はありません。</p>
        @endforelse

        {{-- 選択した年月のカレンダー（公開ページと同じ表示でプレビュー） --}}
        @if ($publications->isNotEmpty())
            @vite('resources/scss/doctor-calendar.scss')
            <div class="dc-preview">
                <h3 class="dc-subhead">カレンダーの確認</h3>
                <p class="dc-help">上の行をクリックすると、その月のカレンダーを公開ページと同じ表示で確認できます。</p>
                @foreach ($publications as $publication)
                    @php $ymLabel = \Carbon\Carbon::createFromFormat('Y-m-d', $publication->target_month . '-01')->format('Y年n月'); @endphp
                    <div class="dc-preview-panel" data-preview="{{ $publication->target_month }}" hidden>
                        <div class="dc-preview-head">
                            <strong>{{ $ymLabel }}</strong>
                            @if ($publication->is_published)
                                <span class="dc-badge publish-on">公開中</span>
                            @else
                                <span class="dc-badge">非公開（作成中）</span>
                            @endif
                            <form method="POST" action="{{ route('admin.doctor_calendar.publications.update', $publication) }}" style="margin-left: auto;"
                                  @if (! $publication->is_published) onsubmit="return confirm('{{ $ymLabel }}をサイトに公開しますか？')" @endif>
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="is_published" value="{{ $publication->is_published ? 0 : 1 }}">
                                <button type="submit" class="btn btn-sm {{ $publication->is_published ? 'btn-gray' : '' }}">{{ $publication->is_published ? '非公開にする' : 'この内容で公開する' }}</button>
                            </form>
                        </div>
                        <div class="doctor-calendar-container" style="--main-color: #4D88CD; --sub-color: #eff8ff;">
                            <div class="doctor-calendar-months">
                                <x-calendar-table :data="$previews[$publication->target_month]" />
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        // 医師マスタのドラッグ＆ドロップ並び替え（ハンドルを掴んだときだけ行をドラッグ可能にする）
        document.addEventListener('DOMContentLoaded', function () {
            var list = document.getElementById('doctor-list');
            if (!list) return;

            var status = document.getElementById('doctor-sort-status');
            var dragging = null;

            function clearMarks() {
                list.querySelectorAll('.drop-before, .drop-after').forEach(function (el) {
                    el.classList.remove('drop-before', 'drop-after');
                });
            }

            function say(text, isError) {
                status.textContent = text;
                status.classList.toggle('error', !!isError);
            }

            function save() {
                var ids = Array.prototype.map.call(list.querySelectorAll('.dc-row[data-id]'), function (row) {
                    return row.dataset.id;
                });
                say('保存中…', false);
                fetch(list.dataset.reorderUrl, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ ids: ids })
                }).then(function (res) {
                    if (!res.ok) throw new Error(res.status);
                    say('並び順を保存しました。', false);
                }).catch(function () {
                    say('並び順の保存に失敗しました。ページを再読み込みしてください。', true);
                });
            }

            list.querySelectorAll('.dc-handle').forEach(function (handle) {
                var row = handle.closest('.dc-row');
                handle.addEventListener('mousedown', function () { row.draggable = true; });
                handle.addEventListener('mouseup', function () { row.draggable = false; });
            });

            list.addEventListener('dragstart', function (e) {
                var row = e.target.closest('.dc-row[data-id]');
                if (!row || !row.draggable) return;
                dragging = row;
                row.classList.add('dragging');
                e.dataTransfer.effectAllowed = 'move';
                e.dataTransfer.setData('text/plain', row.dataset.id);
            });

            list.addEventListener('dragover', function (e) {
                if (!dragging) return;
                var row = e.target.closest('.dc-row[data-id]');
                if (!row || row === dragging) return;
                e.preventDefault();
                clearMarks();
                var after = e.clientY > row.getBoundingClientRect().top + row.offsetHeight / 2;
                row.classList.add(after ? 'drop-after' : 'drop-before');
            });

            list.addEventListener('drop', function (e) {
                if (!dragging) return;
                var row = e.target.closest('.dc-row[data-id]');
                if (!row || row === dragging) return;
                e.preventDefault();
                var after = e.clientY > row.getBoundingClientRect().top + row.offsetHeight / 2;
                list.insertBefore(dragging, after ? row.nextSibling : row);
                clearMarks();
                save();
            });

            list.addEventListener('dragend', function () {
                if (dragging) {
                    dragging.classList.remove('dragging');
                    dragging.draggable = false;
                }
                dragging = null;
                clearMarks();
            });
        });

        // タブ切り替え（保存後のリダイレクトでも同じタブを開けるよう sessionStorage に保持）
        document.addEventListener('DOMContentLoaded', function () {
            var tabs = document.querySelectorAll('.dc-tab');
            var panels = document.querySelectorAll('[data-tab-panel]');
            var key = 'doctorCalendarTab';

            function show(name) {
                tabs.forEach(function (t) { t.classList.toggle('active', t.dataset.tab === name); });
                panels.forEach(function (p) { p.hidden = p.dataset.tabPanel !== name; });
                try { sessionStorage.setItem(key, name); } catch (e) {}
            }

            tabs.forEach(function (t) {
                t.addEventListener('click', function () { show(t.dataset.tab); });
            });

            var initial = 'weekly';
            var hash = location.hash.replace('#', '');
            try {
                var saved = sessionStorage.getItem(key);
                if (saved && document.querySelector('[data-tab-panel="' + saved + '"]')) initial = saved;
            } catch (e) {}
            // URL の #タブ名 を優先（公開年月タブからの「内容を確認・編集」リンク用）
            if (hash && document.querySelector('[data-tab-panel="' + hash + '"]')) initial = hash;
            show(initial);
        });

        // 公開年月: 行をクリックすると、その月のカレンダーを下部に表示（選択は sessionStorage に保持）
        document.addEventListener('DOMContentLoaded', function () {
            var rows = document.querySelectorAll('.dc-pub-row');
            var panels = document.querySelectorAll('.dc-preview-panel');
            if (!rows.length) return;
            var key = 'doctorCalendarPreviewMonth';

            function select(ym) {
                rows.forEach(function (r) { r.classList.toggle('selected', r.dataset.ym === ym); });
                panels.forEach(function (p) { p.hidden = p.dataset.preview !== ym; });
                try { sessionStorage.setItem(key, ym); } catch (e) {}
            }

            rows.forEach(function (row) {
                function onActivate(e) {
                    // 行内のボタン・フォームの操作では切り替えない
                    if (e.target.closest('button, form, a, input, select')) return;
                    select(row.dataset.ym);
                }
                row.addEventListener('click', onActivate);
                row.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); onActivate(e); }
                });
            });

            var initial = rows[0].dataset.ym;
            try {
                var saved = sessionStorage.getItem(key);
                if (saved && document.querySelector('.dc-pub-row[data-ym="' + saved + '"]')) initial = saved;
            } catch (e) {}
            select(initial);
        });

        // 臨時変更の追加フォーム:日付を選ぶと、その曜日の基本設定を初期値として入力する
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('override-add-form');
            if (!form) return;

            var weekly = JSON.parse(form.dataset.weekly || '{}');
            var dateInput = form.querySelector('input[name=date]');

            dateInput.addEventListener('change', function () {
                if (!dateInput.value) return;
                var parts = dateInput.value.split('-');
                var dow = new Date(parts[0], parts[1] - 1, parts[2]).getDay();
                var base = weekly[dow];
                if (!base) return;

                form.querySelector('select[name=am_doctor_id]').value = base.am || '';
                form.querySelector('select[name=pm_doctor_id]').value = base.pm || '';
                var closed = form.querySelector('input[type=checkbox][name=is_closed]');
                closed.checked = !!base.closed;
                closed.dispatchEvent(new Event('change'));
            });
        });

        // 「休診日」にチェックが入っている行は担当医の選択をグレーアウト（送信もされない）
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.dc-row input[type=checkbox][name$="is_closed]"], .dc-row input[type=checkbox][name="is_closed"]').forEach(function (checkbox) {
                var row = checkbox.closest('.dc-row');
                var sync = function () {
                    row.querySelectorAll('select').forEach(function (select) {
                        select.disabled = checkbox.checked;
                    });
                };
                checkbox.addEventListener('change', sync);
                sync();
            });
        });
    </script>
@endsection

@extends('admin.layouts.panel')

@section('title', 'お知らせ')

@section('content')
    @if (session('status'))
        <div class="flash">{{ session('status') }}</div>
    @endif

    <p><a href="{{ route('admin.news.create') }}" class="btn" style="display: inline-block; text-decoration: none;">新規作成</a></p>

    <div style="overflow-x: auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>公開日</th>
                    <th>タイトル</th>
                    <th>状態</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($newsList as $item)
                    <tr>
                        <td style="white-space: nowrap;">{{ $item->published_at->format('Y.m.d') }}</td>
                        <td>{{ $item->title }}</td>
                        <td style="white-space: nowrap;">{{ $item->is_published ? '公開' : '非公開' }}</td>
                        <td style="white-space: nowrap;"><a href="{{ route('admin.news.edit', $item) }}">編集</a></td>
                    </tr>
                @empty
                    <tr><td colspan="4">お知らせはまだありません。</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

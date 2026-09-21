@extends('admin.layouts.panel')

@section('title', 'ユーザー')

@section('content')
    @if (session('status'))
        <div class="flash">{{ session('status') }}</div>
    @endif
    @error('delete')<div class="error" style="margin-bottom: 16px;">{{ $message }}</div>@enderror

    <p><a href="{{ route('admin.users.create') }}" class="btn" style="display: inline-block; text-decoration: none;">新規作成</a></p>

    <div style="overflow-x: auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td style="white-space: nowrap;">
                            <a href="{{ route('admin.users.edit', $item) }}">編集</a>
                            @if (! $item->is(auth()->user()))
                                <form method="POST" action="{{ route('admin.users.destroy', $item) }}" style="display: inline; margin-left: 12px;" onsubmit="return confirm('このユーザーを削除しますか？');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: 0; padding: 0; color: #c0392b; cursor: pointer; font-size: inherit; text-decoration: underline;">削除</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

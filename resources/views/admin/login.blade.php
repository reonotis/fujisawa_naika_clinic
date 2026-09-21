@extends('admin.layouts.admin')

@section('title', 'ログイン')

@section('body')
    <main class="admin-main" style="max-width: 420px;">
        <div class="card">
            <h1 style="margin-top: 0; font-size: 22px;">管理画面ログイン</h1>
            <form method="POST" action="{{ route('admin.login.store') }}">
                @csrf
                <div class="field">
                    <label for="email">メールアドレス</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    @error('email')<div class="error">{{ $message }}</div>@enderror
                </div>
                <div class="field">
                    <label for="password">パスワード</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password">
                    @error('password')<div class="error">{{ $message }}</div>@enderror
                </div>
                <div class="field">
                    <label><input type="checkbox" name="remember" value="1"> ログイン状態を保持する</label>
                </div>
                <button type="submit" class="btn">ログイン</button>
            </form>
        </div>
    </main>
@endsection

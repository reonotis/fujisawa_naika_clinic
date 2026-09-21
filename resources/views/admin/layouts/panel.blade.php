@extends('admin.layouts.admin')

@section('body')
    <header class="admin-header">
        <strong>藤澤内科クリニック 管理画面</strong>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <span>{{ auth()->user()->name }}</span>
            <button type="submit" class="btn btn-outline">ログアウト</button>
        </form>
    </header>
    <div class="admin-layout">
        <nav class="admin-sidebar">
            <a href="{{ route('admin.news.index') }}" @class(['active' => request()->routeIs('admin.news.*')])>お知らせ</a>
            <a href="{{ route('admin.doctor_calendar.index') }}" @class(['active' => request()->routeIs('admin.doctor_calendar.*')])>外来担当医表</a>
        </nav>
        <main class="admin-content">
            <div class="card">
                <h1 style="margin-top: 0; font-size: 22px;">@yield('title')</h1>
                @yield('content')
            </div>
        </main>
    </div>
@endsection

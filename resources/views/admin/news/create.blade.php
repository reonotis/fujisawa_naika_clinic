@extends('admin.layouts.panel')

@section('title', 'お知らせ 新規作成')

@section('content')
    <form method="POST" action="{{ route('admin.news.store') }}">
        @include('admin.news._form')
    </form>
@endsection

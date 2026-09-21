@extends('admin.layouts.panel')

@section('title', 'お知らせ 編集')

@section('content')
    <form method="POST" action="{{ route('admin.news.update', $news) }}">
        @method('PUT')
        @include('admin.news._form')
    </form>
@endsection

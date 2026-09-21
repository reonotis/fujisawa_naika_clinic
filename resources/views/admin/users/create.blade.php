@extends('admin.layouts.panel')

@section('title', 'ユーザー 新規作成')

@section('content')
    <form method="POST" action="{{ route('admin.users.store') }}">
        @include('admin.users._form')
    </form>
@endsection

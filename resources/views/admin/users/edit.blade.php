@extends('admin.layouts.panel')

@section('title', 'ユーザー 編集')

@section('content')
    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @method('PUT')
        @include('admin.users._form')
    </form>
@endsection

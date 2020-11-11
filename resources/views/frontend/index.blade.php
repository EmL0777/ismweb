<!-- 指定繼承 layout.master 母模板 -->
@extends('layouts.frontend')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', 'Home')

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
    <h1> Welcome to ISM</h1>
@endsection

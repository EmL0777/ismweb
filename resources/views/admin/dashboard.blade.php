<!-- 指定繼承 layout.master 母模板 -->
@extends('layouts.master')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
    <h1>Dashboard</h1>
@endsection

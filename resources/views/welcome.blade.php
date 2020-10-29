<!-- 指定繼承 layout.master 母模板 -->
@extends('layout.master')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', 'Admin')

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Blank</h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
@endsection

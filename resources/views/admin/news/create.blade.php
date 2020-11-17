<!-- 指定繼承 layout.master 母模板 -->
@extends('layouts.master')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
    <h1>
        {{ $title }}
        <a href="{{ route('news.index') }}" class="btn btn-primary">Back to News</a>
    </h1>

    {{-- 錯誤訊息模板元件 --}}
    @include('admin.components.validationErrorMessage')

    <form action="{{ route('news.store') }}"
          method="post"
          enctype="multipart/form-data"
          role="form"
    >
        {{-- 隱藏方法欄位--}}
        {{ method_field('POST') }}

        <label for="name">
            Item Name：
            <input type="text"
                   id="name"
                   name="name"
                   placeholder="Item name"
                   value="{{ old('name') }}"
            >
        </label>

        <label for="display">
            Display：
            <input type="checkbox"
                   checked
                   id="display"
                   name="display"
                   value="{{ old('display', true) }}"
            >
        </label>

        <label for="pinned">
            Pinned：
            <input type="checkbox"
                   id="pinned"
                   name="pinned"
                   value="{{ old('pinned', true) }}"
            >
        </label>

        <button type="submit" class="btn btn-default">Create Center</button>

        {{-- CSRF 欄位 --}}
        {{ csrf_field() }}
    </form>
@endsection

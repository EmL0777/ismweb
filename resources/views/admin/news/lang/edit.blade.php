@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>
        {{ $title }}：{{ $news_i18n->title }}
        <a type="button" class="btn btn-primary" href="{{ route('Admin.news.edit', $news_i18n->news_id) }}">Back</a>
    </h1>

    {{-- 錯誤訊息模板元件 --}}
    @include('admin.components.validationErrorMessage')

    <form action="{{ route('Admin.languages.update', $news_i18n->id) }}"
          method="post"
          enctype="multipart/form-data"
          role="form"
    >
        {{-- 隱藏方法欄位--}}
        {{ method_field('PUT') }}

        <label for="lang">
            Language：
            <input type="text"
                   id="languages"
                   value="{{ old('languages', $news_i18n->languages) }}"
                   disabled
            >
        </label>

        <label for="title">
            Title：
            <input type="text"
                   id="title"
                   name="title"
                   placeholder="Title"
                   value="{{ old('title', $news_i18n->title) }}"
            >
        </label>

        <label for="content">
            Content：
            <textarea class="form-control"
                      name="content"
                      id="content"
                      cols="30"
                      rows="3"
            >{!! old('content', $news_i18n->content) !!}</textarea>
        </label>
        <button type="submit" class="btn btn-success">Update</button>

        {{-- CSRF 欄位 --}}
        {{ csrf_field() }}
    </form>
@endsection

@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>
        {{ $title }}：{{ $about_i18n->title }}
        <a type="button" class="btn btn-primary" href="{{ route('abouts.edit', $about_i18n->about_id) }}">Back</a>
    </h1>

    {{-- 錯誤訊息模板元件 --}}
    @include('admin.components.validationErrorMessage')

    <form action="{{ route('about.lang.update', $about_i18n->id) }}"
          method="post"
          enctype="multipart/form-data"
          role="form"
    >
        {{-- 隱藏方法欄位--}}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label for="lang">
                Language：
                <input type="text"
                       id="languages"
                       value="{{ $about_i18n->languages }}"
                       disabled
                >
            </label>
        </div>

        <div class="form-group">
            <label for="title">
                Title：
                <input type="text"
                       id="title"
                       name="title"
                       placeholder="Title"
                       value="{{ old('title', $about_i18n->title) }}"
                >
            </label>
        </div>

        <div class="form-group">
            <label for="content">
                Content：
                <textarea class="form-control"
                          name="content"
                          id="content"
                          cols="30"
                          rows="6"
                >{!! old('content', $about_i18n->content) !!}</textarea>
            </label>
        </div>
        <button type="submit" class="btn btn-success">Update</button>

        {{-- CSRF 欄位 --}}
        {{ csrf_field() }}
    </form>
@endsection

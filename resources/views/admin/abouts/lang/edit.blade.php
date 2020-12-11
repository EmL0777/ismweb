@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>
        {{ $title }}
        <a type="button" class="btn btn-primary"
           href="{{ route('abouts.edit', $about_i18n->about_id) }}">
            {{ trans('admin.global.back') }}
        </a>
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
                {{ trans('admin.global.language.name') }}：
                <input type="text"
                       id="languages"
                       value="{{ $about_i18n->languages }}"
                       disabled
                >
            </label>
        </div>

        <div class="form-group">
            <label for="title">
                {{ trans('admin.global.title') }}：
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
                {{ trans('admin.global.content') }}：
                <textarea class="form-control"
                          name="content"
                          id="content"
                          cols="30"
                          rows="6"
                >{!! old('content', $about_i18n->content) !!}</textarea>
            </label>
        </div>
        <button type="submit" class="btn btn-success">
            {{ trans('admin.global.edit') }}
        </button>

        {{-- CSRF 欄位 --}}
        {{ csrf_field() }}
    </form>
@endsection

<!-- 指定繼承 layout.master 母模板 -->
@extends('layouts.master')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
    <h1>
        {{ $title }}
        <a type="button" class="btn btn-primary" href="{{ route('abouts.index') }}">
            {{ trans('admin.global.back') }}
        </a>
    </h1>

    {{-- 錯誤訊息模板元件 --}}
    @include('admin.components.validationErrorMessage')

    <form action="{{ route('abouts.store') }}"
          method="post"
          enctype="multipart/form-data"
          role="form"
    >
        {{-- 隱藏方法欄位--}}
        {{ method_field('POST') }}

        <label for="intro">
            {{ trans('admin.abouts.outline') }}：
            <input type="text"
                   id="intro"
                   name="intro"
                   placeholder="{{ trans('admin.abouts.outline') }}"
                   value="{{ old('intro') }}"
            >
        </label>

        @include('admin.components.datepickerOnlyYearMonth', ['yearMonth' => ''])

        <label for="position">
            {{ trans('admin.abouts.position') }}：
            <input type="number"
                   id="position"
                   name="position"
                   placeholder="{{ trans('admin.abouts.position') }}"
                   value="{{ old('position') }}"
            >
        </label>

        <button type="submit" class="btn btn-primary">
            {{ trans('admin.global.create') }}
        </button>

        {{-- CSRF 欄位 --}}
        {{ csrf_field() }}
    </form>
@endsection

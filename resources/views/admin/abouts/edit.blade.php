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

    <form action="{{ route('abouts.update', $about->id) }}"
          method="post"
          enctype="multipart/form-data"
          role="form"
    >
        {{-- 隱藏方法欄位--}}
        {{ method_field('PUT') }}

        <label for="intro">
            {{ trans('admin.abouts.outline') }}：
            <input type="text"
                   id="intro"
                   name="intro"
                   placeholder="Intro"
                   value="{{ old('intro', $about->intro) }}"
            >
        </label>

        @include('admin.components.datepickerOnlyYearMonth', [
                    'yearMonth' => $about->event_year_month])

        <label for="position">
            {{ trans('admin.abouts.position') }}：
            <input type="number"
                   id="position"
                   name="position"
                   placeholder="Position"
                   value="{{ old('position', $about->position) }}"
            >
        </label>

        <button type="submit" class="btn btn-success">
            {{ trans('admin.global.save') }}
        </button>

        {{-- CSRF 欄位 --}}
        {{ csrf_field() }}
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>{{ trans('admin.global.title') }}</th>
                <th>{{ trans('admin.global.title') }}</th>
                <th>{{ trans('admin.global.content') }}</th>
                <th>{{ trans('admin.global.edit') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($about->Abouts_i18ns as $abouts_i18n)
                <tr>
                    <td>{{ $abouts_i18n->title }}</td>
                    <td>{{ $abouts_i18n->content }}</td>
                    <td>
                        @switch($abouts_i18n->languages)
                            @case('ja')
                            {{ trans('admin.global.language.ja') }}
                            @break
                            @case('zh-CN')
                            {{ trans('admin.global.language.zh-CN') }}
                            @break
                            @case('zh-TW')
                            {{ trans('admin.global.language.zh-TW') }}
                            @break
                            @default
                            {{ trans('admin.global.language.en') }}
                        @endswitch
                    </td>
                    <td>
                        <a type="button" class="btn btn-primary"
                           href="{{ route('about.lang.edit', $abouts_i18n->id)}}">
                            {{ trans('admin.global.edit') }}
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

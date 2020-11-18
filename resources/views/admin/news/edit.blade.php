@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>
        {{ $title }}：{{ $news->name }}
        <a type="button" class="btn btn-primary" href="{{ route('news.index') }}">Back</a>
    </h1>

    {{-- 錯誤訊息模板元件 --}}
    @include('admin.components.validationErrorMessage')

    <form action="{{ route('news.update', $news->id) }}"
          method="post"
          enctype="multipart/form-data"
          role="form"
    >
        {{-- 隱藏方法欄位--}}
        {{ method_field('PUT') }}

        <label for="name">
            Name：
            <input type="text"
                   id="name"
                   name="name"
                   placeholder="Name"
                   value="{{ old('name', $news->name) }}"
            >
        </label>

        <label for="display">
            Display：
            <input type="checkbox"
                   id="display"
                   name="display"
                   value="1"
                   {{ old('display', $news->display) ? 'checked="checked"' : '' }}
            >
        </label>

        <label for="pinned">
            Pinned
            <input type="checkbox"
                   id="pinned"
                   name="pinned"
                   value="1"
                   {{ old('pinned', $news->pinned) ? 'checked="checked"' : '' }}
            >
        </label>
        <button type="submit" class="btn btn-default">Update</button>

        {{-- CSRF 欄位 --}}
        {{ csrf_field() }}
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Language</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($news->News_i18ns as $news_i18n)
                <tr>
                    <td>{{ $news_i18n->title }}</td>
                    <td>{{ $news_i18n->content }}</td>
                    <td>{{ $news_i18n->languages }}</td>
                    <td><a type="button" class="btn btn-primary" href="{{ route('languages.edit', $news_i18n->id)
                    }}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>
        {{ $title }}：{{ $news->name }}
        <a type="button" class="btn btn-primary" href="{{ route('news.index') }}">Back</a>
    </h1>
    <div class="panel panel-info">
        <div class="panel-heading">
            Info Panel
        </div>
        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Item Name</dt>
                <dd>{{ $news->name }}</dd>
                <dt>Display</dt>
                @if($news->display)
                    <dd class="text-success">{{ "顯示中" }}</dd>
                @else
                    <dd class="text-danger">{{ "未顯示" }}</dd>
                @endif
                <dt>Pinned</dt>
                @if($news->pinned)
                    <dd class="text-success">{{ "已置頂" }}</dd>
                @else
                    <dd class="text-danger">{{ "未置頂" }}</dd>
                @endif
                <dt>Created_at</dt>
                <dd>{{ $news->created_at }}</dd>
                <dt>Updated_at</dt>
                <dd>{{ $news->updated_at }}</dd>
            </dl>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Language</th>
                <th>Created_at</th>
                <th>Updated_at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($news->News_i18ns as $news_i18n)
                <tr>
                    <td>{{ $news_i18n->title }}</td>
                    <td>{{ $news_i18n->content }}</td>
                    <td>{{ $news_i18n->languages }}</td>
                    <td>{{ $news_i18n->created_at }}</td>
                    <td>{{ $news_i18n->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

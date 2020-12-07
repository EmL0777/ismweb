@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>
        {{ $title }}：{{ $about->name }}
        <a type="button" class="btn btn-primary" href="{{ route('abouts.index') }}">Back</a>
    </h1>
    <div class="panel panel-info">
        <div class="panel-heading">
            Info Panel
        </div>
        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Intro</dt>
                <dd>{{ $about->intro }}</dd>
                <dt>Event Year</dt>
                <dd>{{ $about->event_year }}</dd>
                <dt>Position</dt>
                <dd>{{ $about->position }}</dd>
                <dt>Created_at</dt>
                <dd>{{ $about->created_at }}</dd>
                <dt>Updated_at</dt>
                <dd>{{ $about->updated_at }}</dd>
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
            @foreach($about->Abouts_i18ns as $about_i18n)
                <tr>
                    <td>{{ $about_i18n->title }}</td>
                    <td>{{ $about_i18n->content }}</td>
                    <td>{{ $about_i18n->languages }}</td>
                    <td>{{ $about_i18n->created_at }}</td>
                    <td>{{ $about_i18n->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

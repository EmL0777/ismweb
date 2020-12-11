@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>
        {{ $title }}：{{ $about->intro }}
        <a type="button" class="btn btn-primary" href="{{ route('abouts.index') }}">
            {{ trans('admin.global.back') }}
        </a>
    </h1>
    <div class="panel panel-info">
        <div class="panel-heading">
            {{ trans('admin.global.info') }}
        </div>
        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>{{ trans('admin.abouts.outline') }}</dt>
                <dd>{{ $about->intro }}</dd>
                <dt>{{ trans('admin.abouts.year') }}</dt>
                <dd>{{ $about->event_year_month }}</dd>
                <dt>{{ trans('admin.abouts.position') }}</dt>
                <dd>{{ $about->position }}</dd>
                <dt>{{ trans('admin.global.created_at') }}</dt>
                <dd>{{ $about->created_at }}</dd>
                <dt>{{ trans('admin.global.updated_at') }}</dt>
                <dd>{{ $about->updated_at }}</dd>
            </dl>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>{{ trans('admin.global.title') }}</th>
                <th>{{ trans('admin.global.content') }}</th>
                <th>{{ trans('admin.global.language.name') }}</th>
                <th>{{ trans('admin.global.created_at') }}</th>
                <th>{{ trans('admin.global.updated_at') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($about->Abouts_i18ns as $about_i18n)
                <tr>
                    <td>{{ $about_i18n->title }}</td>
                    <td>{{ $about_i18n->content }}</td>
                    <td>
                        @switch($about_i18n->languages)
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
                    <td>{{ $about_i18n->created_at }}</td>
                    <td>{{ $about_i18n->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

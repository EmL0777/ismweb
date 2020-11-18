<!-- 指定繼承 layout.master 母模板 -->
@extends('layouts.master')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
    <h1>
        {{ $title }}
        <a type="button" class="btn btn-primary" href="{{ route('news.create') }}">Create</a>
    </h1>

    @if ($message = session()->get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Display</th>
                <th>Pinned</th>
                <th>Updated_at</th>
                <th>Info</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($newsList as $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->name }}</td>
                    <td>
                        @if($news->display)
                            <p class="text-success">{{ "顯示中" }}</p>
                        @else
                            <p class="text-danger">{{ "未顯示" }}</p>
                        @endif
                    </td>
                    <td>
                        @if($news->pinned)
                            <p class="text-success">{{ "已置頂" }}</p>
                        @else
                            <p class="text-danger">{{ "未置頂" }}</p>
                        @endif
                    </td>
                    <td>{{ $news->updated_at }}</td>
                    <td><a type="button" class="btn btn-info" href="{{ route('news.show', $news->id)
                    }}">Info</a></td>
                    <td><a type="button" class="btn btn-primary" href="{{ route('news.edit', $news->id)
                    }}">Edit</a></td>
                    <td>
                        <form action="{{ route('news.destroy', $news->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        {{ $newsList->links() }}
    </div>
@endsection

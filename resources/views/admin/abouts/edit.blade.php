<!-- 指定繼承 layout.master 母模板 -->
@extends('layouts.master')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
    <h1>{{ $title }}</h1>

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
            Intro：
            <input type="text"
                   id="intro"
                   name="intro"
                   placeholder="Intro"
                   value="{{ old('intro', $about->intro) }}"
            >
        </label>

        <label for="year">
            Event Year：
            <input type="text"
                   id="year"
                   name="event_year"
                   placeholder="Event Year"
                   class="date-picker-year"
                   value="{{ old('event_year', $about->event_year) }}"
                   autocomplete="off"
            >
        </label>

        <label for="position">
            Position：
            <input type="number"
                   id="position"
                   name="position"
                   placeholder="Position"
                   value="{{ old('position', $about->position) }}"
            >
        </label>

        <button type="submit" class="btn btn-success">Save</button>

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
            @foreach($about->Abouts_i18ns as $abouts_i18n)
                <tr>
                    <td>{{ $abouts_i18n->title }}</td>
                    <td>{{ $abouts_i18n->content }}</td>
                    <td>{{ $abouts_i18n->languages }}</td>
                    <td><a type="button" class="btn btn-primary" href="{{ route('about.lang.edit', $abouts_i18n->id)
                    }}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('styles')
    @parent
    <style>
        .ui-datepicker-calendar {
            display: none;
        }
    </style>
@endsection

@section('scripts')
    @parent
    <script>
        $(function () {
            $('.date-picker-year').datepicker({
                changeYear: true,
                changeMonth: false,
                yearRange: "c-40:c",
                dateFormat: 'yy',
                onClose: function (dateText, inst) {
                    let year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).datepicker('setDate', new Date(year, 1));
                }
            });
        });
    </script>
@endsection

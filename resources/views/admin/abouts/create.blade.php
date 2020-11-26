<!-- 指定繼承 layout.master 母模板 -->
@extends('layouts.master')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
    <h1>{{ $title }}</h1>

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
            Intro：
            <input type="text"
                   id="intro"
                   name="intro"
                   placeholder="Intro"
                   value="{{ old('intro') }}"
            >
        </label>

        <label for="year">
            Event Year：
            <input type="text"
                   id="year"
                   name="event_year"
                   placeholder="Event Year"
                   class="date-picker-year"
{{--                   value="{{ old('year') }}"--}}
                   autocomplete="off"
            >
        </label>

        <label for="position">
            Position：
            <input type="number"
                   id="position"
                   name="position"
                   placeholder="Position"
                   value="{{ old('position') }}"
            >
        </label>

        <button type="submit" class="btn btn-default">Create About</button>

        {{-- CSRF 欄位 --}}
        {{ csrf_field() }}
    </form>
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

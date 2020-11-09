<!-- 指定繼承 layout.master 母模板 -->
@extends('layout.master')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
    <h1>{{ $title }}</h1>

    {{-- 錯誤訊息模板元件 --}}
    @include('admin.components.validationErrorMessage')

    <form action="/services/centers"
          method="post"
          enctype="multipart/form-data"
          role="form"
    >
        {{-- 隱藏方法欄位--}}
        {{ method_field('POST') }}

        <label for="title">
            Company Name：
            <input type="text"
                   id="title"
                   name="title"
                   placeholder="Company Name"
                   value="{{ old('title') }}"
            >
        </label>

        <label for="address">
            Address：
            <input type="text"
                   id="address"
                   name="address"
                   placeholder="Address"
                   value="{{ old('address') }}"
            >
        </label>

        <label for="phone1">
            Phone1：+
            <input type="text"
                   id="phone1"
                   name="phone1"
                   placeholder="Phone Number 1"
                   value="{{ old('phone1') }}"
            >
        </label>

        <label for="phone2">
            Phone2：+
            <input type="text"
                   id="phone2"
                   name="phone2"
                   placeholder="Phone Number 2"
                   value="{{ old('phone2') }}"
            >
        </label>

        <label for="fax">
            FAX：
            <input type="text"
                   id="fax"
                   name="fax"
                   placeholder="FAX"
                   value="{{ old('fax') }}"
            >
        </label>

        <label for="email">
            Email：
            <input type="email"
                   id="email"
                   name="email"
                   placeholder="Email"
                   value="{{ old('email') }}"
            >
        </label>

        <label for="attn">
            ATTN：
            <input type="text"
                   id="attn"
                   name="attn"
                   placeholder="ATTN"
                   value="{{ old('attn') }}"
            >
        </label>

        <label for="continent">
            Continent：
            <input type="text"
                   id="continent"
                   name="continent"
                   placeholder="Continent"
                   value="{{ old('continent') }}"
            >
        </label>

        <label for="country">
            Country：
            <input type="text"
                   id="country"
                   name="country"
                   placeholder="Country"
                   value="{{ old('country') }}"
            >
        </label>

        <button type="submit" class="btn btn-default">Create Center</button>

        {{-- CSRF 欄位 --}}
        {{ csrf_field() }}
    </form>
@endsection

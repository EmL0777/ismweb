@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>
        {{ $title }}：{{ $serviceCenter->title }}
        <a type="button" class="btn btn-primary" href="{{ route('centers.index') }}">Back</a>
    </h1>

    {{-- 錯誤訊息模板元件 --}}
    @include('admin.components.validationErrorMessage')

    <form action="{{ route('centers.update', $serviceCenter->id) }}"
          method="post"
          enctype="multipart/form-data"
          role="form"
    >
        {{-- 隱藏方法欄位--}}
        {{ method_field('PUT') }}

        <label for="title">
            Company Name：
            <input type="text"
                   id="title"
                   name="title"
                   placeholder="Company Name"
                   value="{{ old('title', $serviceCenter->title) }}"
            >
        </label>

        <label for="address">
            Address：
            <input type="text"
                   id="address"
                   name="address"
                   placeholder="Address"
                   value="{{ old('address', $serviceCenter->address) }}"
            >
        </label>

        <label for="phone1">
            Phone1：+
            <input type="text"
                   id="phone1"
                   name="phone1"
                   placeholder="Phone Number 1"
                   value="{{ old('phone1', $serviceCenter->phone1) }}"
            >
        </label>

        <label for="phone2">
            Phone2：+
            <input type="text"
                   id="phone2"
                   name="phone2"
                   placeholder="Phone Number 2"
                   value="{{ old('phone2', $serviceCenter->phone2) }}"
            >
        </label>

        <label for="fax">
            FAX：
            <input type="text"
                   id="fax"
                   name="fax"
                   placeholder="FAX"
                   value="{{ old('fax', $serviceCenter->fax) }}"
            >
        </label>

        <label for="email">
            Email：
            <input type="email"
                   id="email"
                   name="email"
                   placeholder="Email"
                   value="{{ old('email', $serviceCenter->email) }}"
            >
        </label>

        <label for="attn">
            ATTN：
            <input type="text"
                   id="attn"
                   name="attn"
                   placeholder="ATTN"
                   value="{{ old('attn', $serviceCenter->attn) }}"
            >
        </label>

        <label for="continent">
            Continent：
            <input type="text"
                   id="continent"
                   name="continent"
                   placeholder="Continent"
                   value="{{ old('continent', $serviceCenter->continent) }}"
            >
        </label>

        <label for="country">
            Country：
            <input type="text"
                   id="country"
                   name="country"
                   placeholder="Country"
                   value="{{ old('country', $serviceCenter->country) }}"
            >
        </label>

        <button type="submit" class="btn btn-default">Update</button>

        {{-- CSRF 欄位 --}}
        {{ csrf_field() }}
    </form>

@endsection

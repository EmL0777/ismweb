@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>
        {{ $title }}：{{ $serviceCenter->title }}
        <a type="button" class="btn btn-primary" href="{{ route('centers.index') }}">Back</a>
    </h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            Service Center Detail
        </div>
        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Title</dt>
                <dd>{{ $serviceCenter->title }}</dd>
                <dt>Address</dt>
                <dd>{{ $serviceCenter->address }}</dd>
                <dt>Phone1</dt>
                <dd>{{ $serviceCenter->phone1 }}</dd>
                <dt>Phone2</dt>
                <dd>{{ $serviceCenter->phone2 }}</dd>
                <dt>Fax</dt>
                <dd>{{ $serviceCenter->fax }}</dd>
                <dt>Email</dt>
                <dd>{{ $serviceCenter->email }}</dd>
                <dt>ATTN</dt>
                <dd>{{ $serviceCenter->attn }}</dd>
                <dt>Continent</dt>
                <dd>{{ $serviceCenter->continent }}</dd>
                <dt>Country</dt>
                <dd>{{ $serviceCenter->country }}</dd>
            </dl>
        </div>
    </div>
@endsection

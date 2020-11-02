@extends('layout.master')

@section('title', 'Service Centers')

@section('content')
    <h1>
        {{ $title }}
        <td><a type="button" class="btn btn-primary" href="#">Create</a></td>
    </h1>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Company Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>ATTN</th>
                <th>country</th>
                <th>Info</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($centers as $center)
            <tr>
                <td>{{ $center->title }}</td>
                <td>{{ $center->address }}</td>
                <td>{{ $center->phone1 }}</td>
                <td>{{ $center->attn }}</td>
                <td>{{ $center->country }}</td>
                <td><a type="button" class="btn btn-info" href="#">Info</a></td>
                <td><a type="button" class="btn btn-primary" href="#">Edit</a></td>
                <td><a type="button" class="btn btn-danger" href="#">Delete</a></td>
            </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection

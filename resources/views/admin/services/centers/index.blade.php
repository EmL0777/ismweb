@extends('layouts.master')

@section('title', $title)

@section('content')
    <h1>
        {{ $title }}
        <td><a type="button" class="btn btn-primary" href="centers/create">Create</a></td>
    </h1>

    @if ($message = session()->get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

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
                <td>
                    <form action="{{ route('centers.destroy', $center->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection

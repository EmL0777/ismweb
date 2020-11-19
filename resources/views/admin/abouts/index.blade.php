<!-- 指定繼承 layout.master 母模板 -->
@extends('layouts.master')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">
@endsection

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
    <h1>
        {{ $title }}
        <a type="button" class="btn btn-primary" href="{{ route('abouts.create') }}">Create</a>
    </h1>

    <div class="table-responsive">
        <table id="table" class="table table-bordered">
            <thead>
            <tr>
                <th width="10"></th>
                <th>Intro</th>
                <th>Year</th>
                <th>Order</th>
                <th>Created_at</th>
                <th>Info</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody id="tablecontents">
            @foreach($abouts as $about)
                <tr class="row1" data-id="{{ $about->id }}">
                    <td><i class="fa fa-sort"></i></td>
                    <td>{{ $about->intro }}</td>
                    <td>{{ $about->event_year }}</td>
                    <td>{{ $about->order }}</td>
                    <td>{{ $about->created_at }}</td>
                    <td><a type="button" class="btn btn-info" href="{{ route('abouts.show', $about->id)
                    }}">Info</a></td>
                    <td><a type="button" class="btn btn-primary" href="{{ route('abouts.edit', $about->id)
                    }}">Edit</a></td>
                    <td>
                        <form action="{{ route('abouts.destroy', $about->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
        <h5>Drag and Drop the table rows and <button class="btn btn-success btn-sm" onclick="window.location.reload()">REFRESH</button> the page to check the Demo.</h5>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('/assets/js/datatables.min.js') }}"></script>
    <script>
        $(function () {
            $("#table").DataTable();

            $( "#tablecontents" ).sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {
                let order = [];
                let token = $('meta[name="csrf-token"]').attr('content');
                $('tr.row1').each(function(index,element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index+1
                    });
                });

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('abouts.sortable') }}",
                    data: {
                        order: order,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });
            }
        });
    </script>
@endsection

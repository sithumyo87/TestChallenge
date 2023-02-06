@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Movies</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('admin.movie.create') }}" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create
                    </a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="bg-white p-30">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th width="50">No</th>
                    <th>Title</th>
                    <th>Summary</th>
                    <th>Cover Page</th>
                    <th>Genres</th>
                    <th>Author</th>
                    <th>IMDb Ratings</th>
                    <th>File</th>
                    <th width="120">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $key => $row)
                    <tr>
                        <td class="text-right">{{ ++$i }}</td>
                        <td>{{$row->title }}</td>
                        <td>{{ $row->summary }}</td>
                        <td> 
                        @if($row->cover_image)
                            <img src="{{asset($row->cover_image)}}" alt="" style="width:100px;height:100px">
                            @endif
                        </td>
                        <td>{{ $row->genre_id }}</td>
                        <td>{{ $row->author }}</td>
                        <td>{{ $row->ratings }}</td>
                        <td><a href="{{ $row->file }}">{{ $row->file }}</a> </td>

                        <td class="text-center">
                                <a class="btn btn-primary" href="{{ route('admin.movie.edit',$row->id) }}"><i class="fa fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.movie.destroy',$row->id], 'style' => 'display:inline']) !!}
                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type'=>'submit','class' => 'btn btn-danger', 'id' => 'delete']) !!}
                                {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $movies->render() !!}
    </div>
</div>
@endsection

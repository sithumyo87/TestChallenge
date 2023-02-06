@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Genres</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('admin.genre.create') }}" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create
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
                    <th>Genre Name</th>
                    <th width="120">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $key => $row)
                    <tr>
                        <td class="text-right">{{ ++$i }}</td>  
                        <td>{{$row->name}} </td>
                        <td class="text-center">
                                <a class="btn btn-primary" href="{{ route('admin.genre.edit',$row->id) }}"><i class="fa fa-edit"></i></a>

                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.genre.destroy',$row->id], 'style' => 'display:inline']) !!}
                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type'=>'submit','class' => 'btn btn-danger', 'id' => 'delete']) !!}
                                {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $genres->render() !!}
    </div>
</div>
@endsection

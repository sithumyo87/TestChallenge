@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">movie Create</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    @can('user-index')
                    <li class="breadcrumb-item"><a href="{{ route('admin.movie.index') }}">movie</a></li>
                    @endcan
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="bg-white p-30">
        <!-- <h3 class="text-center m-b-20"></h3> -->
        {!! Form::open(['route' => 'admin.movie.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-8 mt-3">
                <div class="form-group">
                    <label for="">Title</label>
                    {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="">Summary</label>
                    {!! Form::textarea('summary', null, ['placeholder' => 'summary', 'class' => ['form-control','ckeditor'],'id'=>'editor1','cols'=>5,'rows'=>5]) !!}
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    {!! Form::textarea('body', null, ['placeholder' => 'Description', 'class' => ['form-control','ckeditor'],'id'=>'editor1','cols'=>5,'rows'=>5]) !!}
                </div>
                
                <div class="form-group">
                <label for="">Image File</label>
                    <input type="file" name="file" class="form-control" accept="image/jpeg,image/png" required>
              <div class="text-right mt-3">
                </div>
                <div class="form-group">
                <label for="">Gender</label>
                <select name="genre_id" id="" class="form-control dropdown-toggle">
                <option value="">Choose Gender</option>
                @foreach($genre as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                </select>
               
                </div>
                <div class="form-group">
                    <label for="">Author</label>
                    {!! Form::text('author', null, ['placeholder' => 'Author', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="">IMDB Rating</label>
                    {!! Form::number('ratings', null, ['placeholder' => 'Rating', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                <label for="">PDF File</label>
                    <input type="file" name="pdffile" class="form-control" accept="application/pdf">
              <div class="text-right mt-3">
                </div>
                <div class="text-center">
                    <a href="{{ route('admin.movie.index') }}" class="btn btn-warning">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">movie Edit</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    @can('user-index')
                        <li class="breadcrumb-item"><a href="{{ route('admin.movie.index') }}">movie</a></li>
                    @endcan
                    <li class="breadcrumb-item active">Edit</li>
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
    <div class="bg-white p-30 ">
        {!! Form::model($movie, ['method' => 'PATCH', 'route' => ['admin.movie.update', $movie->id], 'files' => true]) !!}
        <div class="row justify-content-center mt-3">
            <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                    <label for="">Title</label>
                    {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="">Summary</label>
                    {!! Form::textarea('summary', null, ['placeholder' => 'summary', 'class' => ['form-control','ckeditor'],'id'=>'editor1','cols'=>5,'rows'=>5]) !!}
                </div>
                
                <div class="form-group">
                    <label for="">Upload</label>
                    <input type="file" name="file" class="form-control" accept="image/png, image/jpg, image/jpeg">
                </div>
                <?php if($movie->cover_image != ''){?>
                    <div class="form-group">
                        <label> Old File </label> <br>
                        <a href="{{ asset($movie->cover_image) }}" target="_blank" class="text-primary"><img src="{{ asset($movie->cover_image) }}" alt="" sizes="" srcset="" width="200"></a>
                    </div>
                <?php }?>
                <div class="form-group">
                    <label for="">genre</label>
                    {!! Form::text('genre_id', null, ['placeholder' => 'genre', 'class' => 'form-control']) !!}
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
                <?php if($movie->file != ''){?>
                    <div class="form-group">
                        <label> Old Pdf File </label> <br>
                        <a href="{{ asset($movie->file) }}" target="_blank" class="text-primary">{{$movie->file}}<p></p></a>
                    </div>
                <?php }?>
                
                <div class="text-center">
                    <a href="{{ route('admin.movie.index') }}" class="btn btn-warning">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

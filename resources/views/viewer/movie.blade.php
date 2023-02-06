@extends('layouts.viewer')
@section('content')
<div class="container p-5 text-white">
    <div class="row">
        <div class="col-md-10">
            <h3>MovieApp</h3><br>
        </div>
        <div class="col-md-2">
        @if(!Auth::user())
            <a href="{{ route('login') }}" class="btn btn-primary mr-2 float-right">Login</a>
            <a href="{{ route('register') }}" class="btn btn-success">Register</a>
        @else
        <a href="{{ url('admin/movie') }}" class="btn btn-primary mr-2 float-right">Go To Admin</a>
        @endif
        </div>
    </div>

    <div class="row">
        @foreach($movies as $movie)
        <div class="col-md-4 mt-4 mb-4">
            <div class="card bg-primary rounded-0" style="width: 18rem;">
                <img src="{{asset($movie->cover_image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $movie->title}}</h5>
                    <p class="card-text">{{substr_replace($movie->summary, '...', 200) }}</p>
                    <p class="card-text">Rating - <span class="text-danger"><b>{{ $movie->ratings}}</b></span></p>
                    <a href="{{ route('movieDetail',$movie->id)}}" class="btn btn-info ">See Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {!! $movies->render() !!}
</div>

@endsection
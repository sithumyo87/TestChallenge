@extends('layouts.viewer')
@section('content')
<!-- Page content-->
<div class="container p-5">
    <a href="{{route('movie')}}" class="btn btn-primary">Back</a>
    <h3>MovieApp Detail</h3><br>
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="{{asset($movie->cover_image)}}" alt="..." /></a>
                <div class="card-body p-3">
                    <div class="small text-muted pt-2">title - <b>{{ $movie->title}}</b></div>
                    <div class="small text-muted pt-2">author - <b>{{ $movie->author}}</b></div>
                    <div class="small text-muted pt-2">Genre - <b>{{ $movie->genre_id}}</b></div>
                    <div class="small text-muted pt-2">Genre - <b>{{ $movie->ratings}}</b></div>
                    <div class="small text-muted pt-2">Movie Link - <b><a href="{{ $movie->file }}">{{ $movie->file }}</a></b></div>
                    <p class="text-muted pt-4 pb-4">{{ $movie->summary}}</p>
                </div>
            </div>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header text-muted">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..."
                            aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header text-muted">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                            @foreach($genres as $row)
                                <li><a href="#!">{{$row->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
        </div>
        <h5>Comment</h5>
        <div class="card">
            <div class="card-body">
                @foreach($comments as $row)
                <div class="d-flex flex-start align-items-center">
                    <img class="rounded-circle shadow-1-strong me-3"
                        src="https://www.samconveyancing.co.uk/userfiles/images/M3-QIR6GH.png" alt="avatar" width="60"
                        height="60" />
                    <div>
                        <h6 class="fw-bold text-primary mb-1">{{ $row->user->name}}</h6>
                    </div>
                </div>

                <p class="mt-3 mb-4 pb-2 text-muted">
                   {{$row->comment}}
                </p>
                @endforeach
                
                <form action="{{url('/movieDetail/comment/'.$movie->id)}}" method="POST">
                    @csrf
                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                    <div class="d-flex flex-start w-100">
                        <img class="rounded-circle shadow-1-strong me-3"
                            src="https://www.samconveyancing.co.uk/userfiles/images/M3-QIR6GH.png" alt="avatar"
                            width="40" height="40" />
                        <div class="form-outline w-100">
                            <textarea class="form-control" id="textAreaExample" rows="4"
                                style="background: #fff;" name="comment"></textarea>
                            <label class="form-label" for="textAreaExample">Message</label>
                        </div>
                    </div>
                    @if(Auth::user())
                    <div class="float-end mt-2 pt-1">
                        <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                        <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                    </div>
                    @else
                    <a href="{{url('/login')}}" class="btn btn-primary"> Pls login in first To comment the movie</a>
                    @endif
                </div>
                </form>
                
            </div>
        </div>

        @endsection
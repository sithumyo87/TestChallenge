<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Comment;
use App\Models\Genre;


class MovieDetailController extends Controller
{
    public function index($id){
        $movie = Movie::where('id',$id)->first();
        $genres = Genre::get();
        $comments = Comment::where('movie_id',$id)->get();
        return view('viewer.movieDetail',compact('movie','comments','genres'));
        
    }
}

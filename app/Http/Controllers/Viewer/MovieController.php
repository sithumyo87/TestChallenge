<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;


class MovieController extends Controller
{
    public function index(Request $request){
        $movies = Movie::orderBy('id','DESC')->paginate(5);
        return view('viewer.movie',compact('movies'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }
}

<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request,$movieId){
       Comment::create([
        'movie_id' => $movieId,
        'user_id' => Auth::user()->id,
        'comment' => $request->comment,
       ]);
       return back();
    }
}

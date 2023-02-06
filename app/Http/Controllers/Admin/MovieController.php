<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::orderBy('id','DESC')->paginate(5);
        return view('admin.movie.index',compact('movies'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = Genre::get();
        return view('admin.movie.create',compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $request->validate([
                'file' => 'required|mimes:png,jpg,jpeg|max:10240',
                
              ]);
            $fileNameToStore = $request->file->getClientOriginalName();
            $request->file->move(public_path('uploads/movie'), $fileNameToStore);
            $storedFileName= 'uploads/movie/'.$fileNameToStore;
        }else{
            $storedFileName = null;
        }

        if($request->hasFile('pdffile')){
            $request->validate([
                'pdffile' => 'required|mimes:pdf|max:10240',
              ]);
            $pdffileNameToStore = $request->pdffile->getClientOriginalName();
            $request->pdffile->move(public_path('uploads/movie'), $pdffileNameToStore);
            $pdfstoredFileName= 'uploads/movie/'.$pdffileNameToStore;
        }else{
            $pdfstoredFileName = null;
        }
        $input = movie::create([
            'title'                 => $request->input('title'),
            'summary'               => $request->input('summary'),
            'cover_image'           => $storedFileName,
            'genre_id'               => $request->input('genre_id'),
            'author'               => $request->input('author'),
            'ratings'               => $request->input('ratings'),
            'file'                 => $pdfstoredFileName,
        ]);
        return redirect()->route('admin.movie.index')->with('success','movie Created successfully'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = movie::findOrFail($id);
        return view('admin.movie.edit',compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = movie::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
        ]);

        if($request->hasFile('file')){
            $request->validate([
                'file' => 'required|mimes:png,jpg,jpeg|max:10240',
                
              ]);
              $fileNameToStore = time().'.'.$request->file->extension();  
            $request->file->move(public_path('uploads/movie'), $fileNameToStore);
            $storedFileName= 'uploads/movie/'.$fileNameToStore;
        }else{
            $storedFileName = $movie->cover_image;
        }

        if($request->hasFile('pdffile')){
            $request->validate([
                'pdffile' => 'required|mimes:pdf|max:10240',
              ]);
              $pdffileNameToStore = $request->pdffile->getClientOriginalName();
            $request->pdffile->move(public_path('uploads/movie'), $pdffileNameToStore);
            $pdfstoredFileName= 'uploads/movie/'.$pdffileNameToStore;
        }else{
            $pdfstoredFileName = $movie->file;
        }

        $movie->title              = $request->input('title');
        $movie->summary            = $request->input('summary');
        $movie->cover_image        = $storedFileName;
        $movie->genre_id               = $request->input('genre_id');
        $movie->author               = $request->input('author');
        $movie->ratings               = $request->input('ratings');
        $movie->file               = $pdfstoredFileName;
        $movie->save();

        return redirect()->route('admin.movie.index')
        ->with('success','movie is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = movie::findOrFail($id);
        $movie->delete($id);
        return redirect()->route('admin.movie.index')
        ->with('success','movie is deleted successfully');
    }
}
